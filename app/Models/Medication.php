<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $primaryKey = 'medication_id';

    protected $fillable = [
        'name',
        'brand',
        'type',
        'price'
    ];
}
