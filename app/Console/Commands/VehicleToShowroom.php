<?php

namespace App\Console\Commands;

use App\Models\Showroom;
use App\Models\Vehicle;
use Illuminate\Console\Command;

class VehicleToShowroom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:vehicle-to-showroom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just user for fresh vehicle';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $vehiclePlateNumber = $this->ask('Enter Vehicle Plate Number : ');
        $vehiclePrice = $this->ask('Enter Vehicle Price : ');
        dump($vehiclePlateNumber);
        $vehicle = Vehicle::where('id',"67165f9902419d3b5c0ce1111")->first();
        dump($vehicle);
        Showroom::create([
            'vehicle_id' => $vehicle->id,
            'from_user_id' => null,
            'to_user_id' => null,
            'price' => $vehiclePrice
        ]);
    }
}
