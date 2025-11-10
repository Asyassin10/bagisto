<?php

namespace Webkul\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Attribute\Contracts\AttributeGroup as AttributeGroupContract;

class AttributeGroup extends Model implements AttributeGroupContract
{
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'column',
        'position',
        'is_user_defined',
    ];

    /**
     * Get the attributes that owns the attribute group.
     */
    public function custom_attributes()
    {
        return $this->belongsToMany(AttributeProxy::modelClass(), 'attribute_group_mappings')
            ->withPivot('position')
            ->orderBy('pivot_position', 'asc');
    }
    public function attributesComparable()
    {
        // where("is_comparable", 1)
        return $this->belongsToMany(Attribute::class, "attribute_group_mappings", "attribute_id");
    }
}
