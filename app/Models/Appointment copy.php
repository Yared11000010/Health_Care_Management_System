<?php

namespace App;

use App\Models\doctor;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];

    public function Doctor()
    {
        return $this->belongsTo(doctor::class, 'user_id', 'id');
    }
}