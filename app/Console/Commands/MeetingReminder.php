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

        $interviewAll = interview::with('user', 'interviewees')->where('interview_date', '>=', $today)->orderBy('interview_date', 'asc')->get(); //+3 mashum se sa na vyn

        foreach($interviewAll as $iAll){

                $dateThirtyMins = date("Y-m-d H:i:s", strtotime($iAll->interview_date));
                $timeThirtyMins = strtotime($dateThirtyMins);
                $timeThirtyMins = $timeThirtyMins - (30 * 60);
                $dateThirtyMins = date("Y-m-d H:i:s", $timeThirtyMins);

                $dateOneHour = date("Y-m-d H:i:s", strtotime($iAll->interview_date));
                $timeOneHour = strtotime($dateOneHour);
                $timeOneHour = $timeOneHour + (5*60);
                $dateOneHour = date("Y-m-d H:i:s", $timeOneHour);

                // dd($dateOneHour);

            echo("Is ".$today." one hour after \n");
            echo($iAll->interview_date."? \n");

            if($dateThirtyMins <= $today){

                $mail_data = [

                        'recipient' => $iAll->interviewees->email,
                        'fromEmail' => 'imsinfoteam@gmail.com',
                        'fromName' => 'IMS Company'
                    ];

                \Mail::send('/interviewComponents/reminderEmail', $mail_data, function($message) use ($mail_data){

                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject("Meeting Reminder");

                }); 

                echo "Mail sent";

            } 
            if($dateOneHour >= $today){
                $mail_data = [

                    'recipient' => $iAll->interviewees->email,
                    'fromEmail' => 'imsinfoteam@gmail.com',
                    'fromName' => 'IMS Company',
                    'linkForReview'=>'http://127.0.0.1:8000/review/candidate/'.$iAll->interviewees->id
                ];

            \Mail::send('/interviewComponents/reviewEmail', $mail_data, function($message) use ($mail_data){

            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject("Meeting Reminder");

            }); 

            echo "Mail sent";
                
            }else{
                echo "Jooooooo";
            }
            
        }

        echo("\n");
    }
}
