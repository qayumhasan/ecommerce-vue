<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class UnUsedCardDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Un used Cart From Database';

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
