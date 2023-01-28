<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    protected $fillable=[
        'patients_id',
        'amount',
        'payed',
    ];
    public function patient(){
        return $this->belongsTo(patient::class,'patients_id','id');
    }
    
}