<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class birthreport extends Model
{
    use HasFactory;
    protected $fillable=[
        'patient',
        'description',
        'doctor',
    ];
}