<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    
    protected $fillable = [
        'site_name',
        'email',
        'address',
        'phone',
        'slogan',
        'fav_icon',
        'logo_header',
        'logo_footer',
        'facebook',
        'whatsapp',
        'linked_in',
        'youtube',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'created_by',
        'updated_by',

    ];
    function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
