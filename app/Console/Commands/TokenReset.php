<?php

namespace App\Console\Commands;

use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TokenReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:reset';

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
     * @return int
     */
    public function handle()
    {
        Log::info("Cron is working fine!");

        $tokens = Applicant::where('access_token_creation_date', '<', Carbon::now()->subMinutes(15))->get();
        foreach ($tokens as $token) {
            $token->access_token = null;
            $token->save();
        }
    }
}
