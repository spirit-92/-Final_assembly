<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\GetWeatherFoo;


class GetWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city:name{city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get weather';


    public function handle()
    {

        $weather = new GetWeatherFoo();
        if (!is_numeric($this->argument('city'))){
            $weather2 = $weather->getWeather($this->argument('city'));
            if ($weather2->cod === '404'){
                $this->error($weather2->message);
            }else{
                var_dump(json_encode($weather2));
            }
        }else{
            $this->error('не строка');
        }
    }
}
