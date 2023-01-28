<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table="general_settings";
     protected $fillable=[
        'title',
        'description',
        'logo_path',
        'favicon_path',
        'icon_logo_path',
        'business_phone',
        'business_email',
        'working_horse',
        'address'
    ];
}