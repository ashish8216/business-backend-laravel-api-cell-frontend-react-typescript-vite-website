<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
  use HasFactory, Sluggable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'slug', 'category', 'content'];
  protected $casts = [
    'content' => 'array',
  ];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function projectCategory(): BelongsTo
  {
    return $this->belongsTo(related: ProjectCategory::class, foreignKey: 'category');
  }
}
