<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'user_id',
        'staff_id'
    ];

    public function detail()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
