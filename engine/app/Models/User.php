<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTime;
use DateTimeZone;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'timezone_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function basalInsulin() {
        return $this->hasMany(BasalInsulin::class);
    }
    public function records() {
        return $this->hasMany(Record::class);
    }
    public function lastRecord() {
        return $this->records()->orderBy('datetime', 'desc')->first();
    }
    public function timezone() {
        return $this->belongsTo(Timezone::class);
    }
    public function timezoneOffset() {
        return $this->timezone->offset;
    }
    public function localTime() {
        return new DateTime('now', new DateTimeZone($this->timezone->timezone_name));
    }
    public function isAllBasalEntered() {
        return $this->basalInsulin
            ->groupBy('period')
            ->map(function ($group) {
                return $group->last();
            })->count() == 24;
    }
    public function formattedLocalTime() {
        return $this->localTime()->format('Y-m-d H:i:s');
    }
}
