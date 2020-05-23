<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Mail\Mailable;
use App\Project;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class DailyEmailBlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Blog:Newest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::all();
        
       foreach ($user as $users)
       {
   Mail::raw("This is automatically generated Daily Update", function($message) use ($users)
   {
       $message->from('LoicBlogs@gmail.com');
       $message->to($users->email)->subject('Daily Update');
   });
   }
   $this->info('Daily Update has been send successfully');
    }
}
