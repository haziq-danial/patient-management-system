<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $primaryKey = 'prescription_id';

    protected $fillable = [
        'user_id',
        'patient_id',
        'comment',
        'medications'
    ];

    protected $casts = [
        'medications' => 'array'
    ];



    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
