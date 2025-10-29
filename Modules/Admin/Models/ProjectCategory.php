<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectCategory extends Model
{
  use HasFactory, Sluggable;

  protected $fillable = [
    'name',
    'slug'
  ];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function Project()
  {
    return $this->hasMany(Project::class, 'category');
  }
}
