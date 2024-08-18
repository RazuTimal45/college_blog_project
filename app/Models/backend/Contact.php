<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'contact';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'created_at',
        'updated_at'
    ];
    public function createdBy(){
        
    }
}