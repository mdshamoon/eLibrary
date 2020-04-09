<?php

namespace App\Jobs;

use App\User;
use Carbon\Carbon;
use App\Notifications\sendMails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MailServices implements ShouldQueue
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
          $lasttime= $user->books()->orderBy('updated_at')->first();
          

          $startTime = Carbon::parse($lasttime['updated_at']);
            $finishTime = Carbon::now();
            $totalDuration = $finishTime->diffInSeconds($startTime);
          if( $totalDuration>1296000)
          {
          $user->notify(new sendMails);
          $user->books()->where('book_user.id',$lasttime['id'])->update(['updated_at'=>Carbon::now()]);
          }

        }

        


    }
}
