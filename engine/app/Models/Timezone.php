<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;

    protected $fillable = [
        'timezone_name',
        'offset',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
