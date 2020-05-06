<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\WeeklyMail;
use Carbon\Carbon;

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
            if(!$user->hasRole('admin')){
          $lasttime= $user->books()->where('book_user.created_at','>=',Carbon::now()->subDays(7))->get();

        
          
          if($lasttime)
          $user->notify(new WeeklyMail($lasttime));

        }
    }


    }
}
