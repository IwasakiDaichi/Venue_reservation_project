<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'mobileNumber' => 'required',
            'purpose' => 'required',
            'venue' => 'required',
            'reservedDate' => 'required',
            'time' => 'required',
        ]);

        Reservation::create([
            'name' => $request->name,
            'department' => $request->department,
            'date_applied' => $request->dateApplied,
            'mobile_number' => $request->mobileNumber,
            'purpose' => $request->purpose,

            'venue' => $request->venue,
            'other_venue' => $request->otherVenue,

            'reserved_date' => $request->reservedDate,
            'time' => $request->time,

            'sound_system' => $request->soundSystem,
            'microphone' => $request->microphone,
            'video_wall' => $request->videoWall,

            'flags' => $request->flags,
            'podium' => $request->podium,
            'platform' => $request->platform,
            'tables' => $request->tables,
            'chairs' => $request->chairs,
            'removal_of_rings' => $request->removalOfRings,

            'other_requirements_1' => $request->otherRequrements1,
            'other_requirements_2' => $request->otherRequrements2,

            'agreed' => $request->agreed,

            'applicant_signature' => $request->applicantsSigniture,
            'security_signature' => $request->securitySigniture,
        ]);

        return redirect('/reservation/create')
            ->with('success', 'Reservation Submitted successfully!');
    }
}
