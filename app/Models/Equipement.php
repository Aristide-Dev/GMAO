<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Equipement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'categorie',
        'numero_serie',
        'forfait_contrat',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function getQrCodeAttribute()
    {

        $logo_path = storage_path('app/public/assets/img/logo.png'); // Utilisez storage_path pour le chemin complet

        // Vérifiez si le fichier logo existe
        if (!file_exists($logo_path)) {
            throw new \Exception("Le fichier logo n'existe pas à l'emplacement spécifié : " . $logo_path);
        }

        $data = [
            'equipement' => $this->name,
            'numero_serie' => $this->numero_serie,
            'forfait_contrat' => $this->forfait_contrat,
            'site' => strtoupper($this->site->name),
        ];

        $data = json_encode($data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        $from = [255, 0, 0];
        $to = [0, 0, 255];

        return QrCode::format('svg')
                    ->size(108)
                    ->color(255, 0, 0)
                    ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                    ->margin(1)
                    ->merge('/storage/app/public/assets/img/logo.png',.3)
                    ->generate($data);
    }

    public function getDownloadAttribute()
    {
        return response()->streamDownload(
            function () {
                echo QrCode::size(105)
                            ->format('svg')
                            ->merge('/storage/app/public/assets/img/logo.png')
                            ->errorCorrection('M')
                            ->generate($data);
            },
            'qr-code.png',
            [
                'Content-Type' => 'image/png',
            ]
        );
    }

    public function qrcode(int $size=50)
    {

        $logo_path = storage_path('app/public/assets/img/logo.png'); // Utilisez storage_path pour le chemin complet

        // Vérifiez si le fichier logo existe
        if (!file_exists($logo_path)) {
            throw new \Exception("Le fichier logo n'existe pas à l'emplacement spécifié : " . $logo_path);
        }

        $data = [
            'equipement' => $this->name,
            'numero_serie' => $this->numero_serie,
            'forfait_contrat' => $this->forfait_contrat,
            'site' => strtoupper($this->site->name),
        ];

        $data = json_encode($data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        $from = [255, 0, 0];
        $to = [0, 0, 255];

        return QrCode::format('svg')
                    ->size($size)
                    ->margin(1)
                    ->merge('/storage/app/public/assets/img/logo.png',.3)
                    ->generate($data);
    }



}
