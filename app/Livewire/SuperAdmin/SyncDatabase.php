<?php

namespace App\Livewire\SuperAdmin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class SyncDatabase extends Component
{
    public $canSync;
    public $message;

    /**
     * Initialize the component.
     */
    public function mount(Application $app)
    {
        $this->canSync = $app->environment('local') ?? false;
    }

    /**
     * Syncs the remote database tables excluding the specified tables if canSync is true.
     */
    public function syncRemoteDatabase()
    {
        if ($this->canSync) {
            $this->message = "Starting database synchronization...";

            // Get all table names from the remote database
            $remoteTables = DB::connection('mysql_remote')->select('SHOW FULL TABLES WHERE Table_type = "BASE TABLE"');
            $excludedTables = [
                // 'gmao_users',
                'gmao_failed_jobs',
                // 'gmao_migrations',
                // 'gmao_sessions',
                'gmao_team_invitations',
                'gmao_team_user',
                'gmao_teams'
            ];

            // Create an ordered list of tables to sync based on foreign key dependencies
            $orderedTables = $this->getOrderedTablesForSync($remoteTables, $excludedTables);

            // Disable foreign key checks
            DB::statement('PRAGMA foreign_keys = OFF');

            foreach ($orderedTables as $tableName) {
                $this->message .= "\n\t * Syncing table: $tableName";
                $this->syncTable($tableName);
            }

            // Re-enable foreign key checks
            DB::statement('PRAGMA foreign_keys = ON');

            $this->message .= "\nDatabase synchronization completed.";
        } else {
            $this->message = 'This command can only be run in a local environment.';
        }
    }

    /**
     * Order the tables for synchronization based on foreign key dependencies.
     */
    private function getOrderedTablesForSync($remoteTables, $excludedTables)
    {
        $tables = [];
        foreach ($remoteTables as $table) {
            $tableName = array_values((array) $table)[0];
            if (!in_array($tableName, $excludedTables)) {
                $tables[] = $tableName;
            }
        }

        // Custom ordering logic can be added here if necessary
        // For simplicity, we'll assume the tables are already in the correct order
        return $tables;
    }

    private function syncTable(string $table): void
    {
        $remoteRows = DB::connection('mysql_remote')->table($table)->get();
        $localTable = str_replace('gmao_', '', $table);

        if (Schema::hasTable($localTable)) {
            DB::table($localTable)->truncate();

            foreach ($remoteRows as $row) {
                DB::table($localTable)->insert((array) $row);
            }
        } else {
            $this->message .= "\nTable $localTable does not exist in the local database.";
        }
    }

    public function render()
    {
        return view('livewire.super-admin.sync-database');
    }
}
