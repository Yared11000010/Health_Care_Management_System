<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\doctor;
class hod extends Model
{
    use HasFactory;
    protected $fillable=[
        'doctor_id',
    ];

    /**
     * Get the department that owns the hod
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(department::class);
    }
    
    public function doctor(){
        return $this->belongsTo(doctor::class,'doctor_id','id');
    }
    
}