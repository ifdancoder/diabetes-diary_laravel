<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id", "datetime", "basal_insulin", "long_chs", "middle_chs", "fast_chs", "bolus_insulin", "physical_activity_time", "physical_activity_intensity", "stress_level", "sleep_time", "time_since_cannula_change", "comment"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
