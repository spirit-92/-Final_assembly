<?php

namespace App\Console\Commands;

use App\model\Author;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;


class Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parse site';

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
        for ($i = 1; $i <= 101; $i++) {
            $html = file_get_contents("https://book24.ua/authors/?PAGEN_1=$i");
            $crawler = new Crawler($html);
            $crawler = $crawler->filter('.item-title');
            foreach ($crawler as $domElement) {
                $addAuthor = new Author([
                    'name' => trim($domElement->textContent),
                ]);
                $addAuthor->save();
            }
        }
//        $imgArr = [];
//        for ($i = 1; $i <= 101; $i++) {
//            $html = file_get_contents("https://book24.ua/authors/?PAGEN_1=$i");
//            $crawler = new Crawler($html);
//            $image = $crawler->filter('.image>img');
//            foreach ($image as $domElement) {
//                $imgArr[] = 'https://book24.ua' . $domElement->attributes['src']->textContent;
//            }
//        }
    }
}
