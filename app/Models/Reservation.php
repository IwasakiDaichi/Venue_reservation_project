<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'department',
        'date_applied',
        'mobile_number',
        'purpose',

        'venue',
        'other_venue',

        'reserved_date',
        'time',

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
}
