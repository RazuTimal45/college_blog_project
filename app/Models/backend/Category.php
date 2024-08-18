<?php

namespace App\Models\backend;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='categories';

    protected $fillable = [
        'name',
        'image',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_categories');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
