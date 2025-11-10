<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\User\Models\Admin;

class Societe extends Model
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
