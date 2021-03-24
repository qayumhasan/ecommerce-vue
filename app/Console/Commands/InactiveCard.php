<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

use DB;

class InactiveCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is for InActive cart delete';

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
        
        $limit = Carbon::now()->subDay(7);
        $cartdata = DB::table('cart_storage')->where('created_at','<',$limit)->delete();
        $this->info($cartdata);
        
    }
}
