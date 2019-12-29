<?php

namespace App\Console\Commands;

use App\Models\Parfume;
use Illuminate\Console\Command;

class ImportParfumes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:parfume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import parfume';

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
        $parfume = [
            'Action',
            'Nature',
            'Food',
            'City',
            'Village',
            'Aroma',
            'Flowers',
            'Lifestyle'
        ];
        foreach ($parfume as $parfumeName){
            $parfume = new Parfume(['name'=>$parfumeName]);
            $parfume->save();
        }
    }
}
