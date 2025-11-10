<?php

namespace Webkul\GSN\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\GSN\Contracts\ProjectKnowledge as ProjectKnowledgeContract;

class ProjectKnowledge extends Model implements ProjectKnowledgeContract
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
