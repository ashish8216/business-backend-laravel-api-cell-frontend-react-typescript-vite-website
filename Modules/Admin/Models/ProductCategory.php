<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Admin\Models\Product;

class ProductCategory extends Model
{
    use HasFactory, sluggable;

    protected $fillable = [
        'name',
        'parentId',
        'image',
        'slug',

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(related: Product::class, foreignKey: 'category', localKey: "slug");
    }
}
