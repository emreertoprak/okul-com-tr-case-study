<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Offer;
use Carbon\Carbon;

class AutoRejectExpiredOffers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-reject-expired-offers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically reject offers that have not been updated in 48 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoffTime = Carbon::now()->subHours(48);

        Offer::where('status', 'pending')
            ->where('updated_at', '<', $cutoffTime)
            ->update(['status' => 'auto-rejected']);

        $this->info('Auto-rejected expired offers.');
    }
}
