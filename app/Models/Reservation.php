<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'department',
        'date_applied',
        'mobile_number',
        'purpose',

        'venue',
        'other_venue',

        'reserved_date',
        'time',

        'status',

        'sound_system',
        'microphone',
        'video_wall',
        'flags',
        'podium',
        'platform',
        'tables',
        'chairs',
        'removal_of_rings',
        'other_requirements_1',
        'other_requirements_2',

        'agreed',

        'applicant_signature',
        'security_signature',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
