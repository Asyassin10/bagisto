<?php

namespace Webkul\GSN\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\User\Models\Admin;
use Webkul\GSN\Contracts\Societe as SocieteContract;

class Societe extends Model implements SocieteContract
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'site_web',
        'siren',
        'contact_nom',
        'contact_prenom',
        'contact_fonction',
        'contact_telephone',
        'contact_email',
        'logo',
        'description',
        'admin_id',
        'ville',
        'code_postal',
        "is_congrate_partner"
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
