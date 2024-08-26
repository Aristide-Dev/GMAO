<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipement extends Model
{
    use HasFactory;

    // Définir la portée globale
    protected static function booted()
    {
        static::addGlobalScope('actif', function (Builder $builder) {
            $builder->where('actif', true);
        });
    }
    
    // Méthode pour désactiver le scope globalement si besoin
    public function scopeWithInactive(Builder $builder)
    {
        return $builder->withoutGlobalScope('actif');
    }

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
        'marque',
        'type',
        'produit',
        'annee_fabrication',
        'puissance',
        'observations',
        'actif',
        'date_mise_en_service',
        'position',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'actif' => 'boolean',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function bon_travails()
    {
        return $this->hasMany(BonTravail::class);
    }

    public function getQrCodeAttribute()
    {

        // $logo_path = storage_path('app/public/assets/img/logo.png'); // Utilisez storage_path pour le chemin complet

        // // Vérifiez si le fichier logo existe
        // if (!file_exists($logo_path)) {
        //     throw new \Exception("Le fichier logo n'existe pas à l'emplacement spécifié : " . $logo_path);
        // }

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
                    // ->merge('/storage/app/public/assets/img/logo.png',.3)
                    ->generate($data);
    }

    public function getBarCodeAttribute()
    {

        // $logo_path = storage_path('app/public/assets/img/logo.png'); // Utilisez storage_path pour le chemin complet

        // // Vérifiez si le fichier logo existe
        // if (!file_exists($logo_path)) {
        //     throw new \Exception("Le fichier logo n'existe pas à l'emplacement spécifié : " . $logo_path);
        // }

        $data = [
            'equipement' => $this->name,
            'numero_serie' => $this->numero_serie,
            'forfait_contrat' => $this->forfait_contrat,
            'site' => strtoupper($this->site->name),
        ];

        // $data = json_encode($data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);

        $barcode = new DNS1D();
        $barcode->setStorPath(__DIR__.'/cache/'); // Définir le chemin de stockage pour les fichiers temporaires
        // $barcodeHtml = $barcode->getBarcodeHTML($data, 'C128');
    
        // dd($barcodeHtml); // Vérifie ce que contient $barcodeHtml
        // return '<img src="data:image/png;base64,' . $barcode->getBarcodeJPG($this->numero_serie, 'C39+',3,33,array(1,1,1), true) . '" class="w-full" alt="barcode" />';
        return $barcode->getBarcodeHTML($this->numero_serie, 'C39',1,53,'black', true);      
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

        // $logo_path = storage_path('app/public/assets/img/logo.png'); // Utilisez storage_path pour le chemin complet

        // // Vérifiez si le fichier logo existe
        // if (!file_exists($logo_path)) {
        //     throw new \Exception("Le fichier logo n'existe pas à l'emplacement spécifié : " . $logo_path);
        // }

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

    // Accessor pour vérifier si l'équipement est récent
    public function getIsRecentAttribute()
    {
        // Définir la période "récente" (ex. : 7 jours)
        $recentPeriod = Carbon::now()->subDays(7);

        // Vérifier si l'équipement a été créé dans cette période
        return $this->created_at >= $recentPeriod;
    }



}
