<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchangerate:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the dollar exchange rate from the private bank';

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
        $pay = json_decode(file_get_contents("https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5"));
        $pay = collect($pay);
        \Cache::forget('euro_exchange_rate');
        \Cache::rememberForever('euro_exchange_rate', function () use ($pay){
            return $pay->where('ccy','EUR')->first()->sale;
        });

    }
}
