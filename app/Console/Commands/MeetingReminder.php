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

        $interviewAll = interview::with('user', 'interviewees')->where('interview_date', '>=', $today)->orderBy('interview_date', 'asc')->get();
        $pastInterviewAll = interview::with('user', 'interviewees', 'review')->where('interview_date', '<', $today)->orderBy('interview_date', 'asc')->get();

        foreach($interviewAll as $iAll){

            echo("Comparing: ".$iAll->interview_date."\n");

            $dateThirtyMins = date("Y-m-d H:i:s", strtotime($iAll->interview_date));
            $timeThirtyMins = strtotime($dateThirtyMins);
            $timeThirtyMins = $timeThirtyMins - (30 * 60);
            $dateThirtyMins = date("Y-m-d H:i:s", $timeThirtyMins);    

            if($dateThirtyMins <= $today){

                $mail_data = [

                        'recipient' => $iAll->user->email,
                        'fromEmail' => 'imsinfoteam@gmail.com',
                        'fromName' => 'IMS Company'
                    ];

                \Mail::send('/interviewComponents/reminderEmail', $mail_data, function($message) use ($mail_data){

                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject("Meeting Reminder");

                }); 

                echo($today." is thirty minutes before ". $iAll->interview_date).".";
                echo " Mail sent \n";

            } 
        }

        foreach($pastInterviewAll as $pAll){

            echo("Comparing: ".$pAll->interview_date."\n");

            $dateOneHour = date("Y-m-d H:i:s", strtotime($pAll->interview_date));
            $timeOneHour = strtotime($dateOneHour);
            $timeOneHour = $timeOneHour + (60*60);
            $dateOneHour = date("Y-m-d H:i:s", $timeOneHour);

            $dateLimit = date("Y-m-d H:i:s", strtotime($pAll->interview_date));
            $timeLimit = strtotime($dateLimit);
            $timeLimit = $timeLimit + (89*60);
            $dateLimit = date("Y-m-d H:i:s", $timeLimit);

            if($dateOneHour <= $today && $today <= $dateLimit){
            // if(true){
                
                $mail_data = [

                    'recipient' => $pAll->user->email,
                    'fromEmail' => 'imsinfoteam@gmail.com',
                    'fromName' => 'IMS Company',
                    'linkForReview'=>'http://127.0.0.1:8000/review/candidate/'.$pAll->interviewees->id.'/?id='.$pAll->interview_id
                ];

            \Mail::send('/interviewComponents/reviewEmail', $mail_data, function($message) use ($mail_data){

            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject("Meeting Reminder");

            }); 

                echo($today." is one hour after ". $pAll->interview_date).".";
                echo " Mail sent \n";
            }
        }

        echo("\n");
    }
}
