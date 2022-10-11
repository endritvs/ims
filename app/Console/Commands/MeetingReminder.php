<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Models\interview;

class MeetingReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meeting:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a reminder 30 minutes before a meeting';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        date_default_timezone_set("Europe/Belgrade");
        $today = date("Y-m-d H:i:s");
        $index = 0;
        $intervieweeID = 0;

        $interviewAll = interview::with('user', 'interviewees')->where('interview_date', '>=', $today)->orderBy('interview_date', 'asc')->get();
        $pastInterviewAll = interview::with('user', 'interviewees', 'review')->where('interview_date', '<', $today)->orderBy('interview_date', 'asc')->get();

        foreach($interviewAll as $iAll){
            
            echo("Comparing: ".$iAll->interview_date."\n");

            $dateThirtyMins = date("Y-m-d H:i:s", strtotime($iAll->interview_date));
            $timeThirtyMins = strtotime($dateThirtyMins);
            $timeThirtyMins = $timeThirtyMins - (30 * 60);
            $dateThirtyMins = date("Y-m-d H:i:s", $timeThirtyMins);    

            $dateLimit = date("Y-m-d H:i:s", strtotime($pAll->interview_date));
            $timeLimit = strtotime($dateLimit);
            $timeLimit = $timeLimit - (25*60);
            $dateLimit = date("Y-m-d H:i:s", $timeLimit);

            if($dateThirtyMins <= $today && $today <= $dateLimit){

            $index = 0;

                $interview = interview::with('user', 'interviewees')->where('interview_id', '=', $iAll->interview_id)->get();

                foreach ($interview as $a) {
                    
                    $interviewerNames[$index++] = $a->user->name;
                }

            foreach ($interview as $a) {

                $mail_data = [

                        'recipient' => $a->user->email,
                        'link' => $interview[0]->startLink,
                        'interviewType' => $a->interviewees->interviewee_type->name,
                        'interviewer' => implode(", ", $interviewerNames),
                        'intervieweeName' => $a->interviewees->name." ".$a->interviewees->surname,
                        'linkForReview'=>'http://127.0.0.1:8000/review/candidate/'.$a->interviewees->id.'/?id='.$a->id,
                        'fromEmail' => 'imsinfoteam@gmail.com',
                        'fromName' => 'IMS Company'
                    ];

                \Mail::send('/interviewComponents/mainEmailInterviewer', $mail_data, function($message) use ($mail_data){

                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject("Meeting Link - Interviewer");

                }); 
        }

        $mail_data['recipient'] = $interview[0]->interviewees->email;
        $mail_data['link'] = $interview[0]->joinLink;

        if($interview[0]->interviewees->id == $intervieweeID){
            \Mail::send('/interviewComponents/mainEmailInterviewee', $mail_data, function($message) use ($mail_data){

                    $message->to($mail_data['recipient'])
                            ->from($mail_data['fromEmail'], $mail_data['fromName'])
                            ->subject("Meeting Link - Interviewee");
            }); 
        }

        $intervieweeID = $interview[0]->interviewees->id;

                echo($today." is thirty minutes before ". $iAll->interview_date).".";
                echo " Mail sent \n";

            } 
        }

        $interview[0]->startLink = 'none';  // Interviewer Link (Multiple hosts)
        $interview[0]->joinLink = 'none';    // Interviewee Link 

        $interview[0]->save();

        echo("\n");
    }
}
