<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateCarStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-car-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rentals = Rental::where('return_date', '<', now())->get();

        foreach ($rentals as $rental) {
            Car::where('id', $rental->car_id)
                ->where('status', 'rented')
                ->update(['status' => 'available']);
        }
    }
}
