<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Admin\Models\ProductCategory;
use Modules\Admin\Models\ProductTag;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'tag',
        'image',
        'video',
        'description',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(related: ProductCategory::class, foreignKey: 'category');
    }

    public function productTag(): BelongsTo
    {
        return $this->belongsTo(related: ProductTag::class, foreignKey: 'tag');
    }
}
