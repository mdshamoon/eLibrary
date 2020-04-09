<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\WeeklyMail;

class WeeklyMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $users= User::all();
        foreach($users as $user)
        {
          $lasttime= $user->books()->where('created_at','>=',DATEADD(day, -7, GETDATE()))->get();

        
          
          if($lasttime)
          $user->notify(new WeeklyMail($lasttime));

        }


    }
}
