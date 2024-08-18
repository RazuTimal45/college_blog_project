<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'testimonials';
    protected $fillable = [
        'rank',
        'image',
        'name',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];
    function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
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
