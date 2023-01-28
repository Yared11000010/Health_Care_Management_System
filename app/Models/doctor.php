<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctor extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'password',
        'address',
        'phone',
        'department',
        'specialization',
        'photo_path',
    ];

    public function departments(){
        return $this->belongsTo(department::class);
    }
}