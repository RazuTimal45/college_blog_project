<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='tags';

    protected $fillable = [
        'name',
        'status',
        'created_by',
        'updated_by'
    ];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
    public function scopeActive($query){
        return $query->where('status',1);
    }
}
