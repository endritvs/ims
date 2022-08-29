<?php

namespace App\Http\Controllers;

use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MeetingController
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 0;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function index()
    {
        $id = 6944987743;
        $meeting = $this->get($id);

        dd($meeting['data']);
        $data = [

           'topic'              => 'Interview Type',                        // Interview Type
           'start_time'         => new Carbon('2022-08-26 22:00:00'),       // Interview Date
           'duration'           => 60,
           'host_video'         => 0,
           'participant_video'  => 0
        ];

        $info = $this -> create($data);

        dd($info['data']);                             // Meeting Data
        // dd($info['data']['start_url']);             // Interviewer Link (Multiple hosts)
        // dd($info['data']['join_url']);              // Interviewee Link 


    }

 }