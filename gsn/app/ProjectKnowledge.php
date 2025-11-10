<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectKnowledge extends Model
{
    use HasFactory;

    protected $table = 'project_knowledge';

    protected $fillable = [
        'type',      // context, logiciel, societe, category
        'name',
        'content',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];


    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }


    public function scopeOfName($query, $name)
    {
        return $query->where('name', $name);
    }
}
