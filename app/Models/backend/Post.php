<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='posts';

    protected $fillable = [
        'user_id',
        'rank',
        'title',
        'sub_title',
        'slug',
        'image',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->rank = self::getNextDisplayOrder();
        });

        static::deleting(function ($model) {
            self::decrementDisplayOrder($model->rank);
        });
    }

    private static function getNextDisplayOrder()
    {
        $maxOrder = self::max('rank');
        return $maxOrder !== null ? $maxOrder + 1 : 1;
    }

    private static function decrementDisplayOrder($deletedOrder)
    {
        self::where('rank', '>', $deletedOrder)->decrement('rank');
    }
}
  
