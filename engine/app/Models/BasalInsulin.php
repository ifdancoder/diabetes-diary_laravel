<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasalInsulin extends Model
{
    use HasFactory;

    protected $table = 'basal_insulin';
    
    protected $fillable = [
        'period',
        'user_id',
        'value'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
