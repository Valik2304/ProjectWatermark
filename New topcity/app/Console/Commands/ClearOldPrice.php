<?php

namespace App\Console\Commands;

use App\Models\Category;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;

class ClearOldPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:oldprice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Old Price';

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
        DB::beginTransaction();
        try {
            $products_id = \DB::table('products')->get()->pluck('id');
            foreach($products_id as $id)
            {
                $old_price = \DB::table('products')->where('id',$id)->value('old_price');
                \DB::table('products')->where('id',$id)->update([
                    'price' => $old_price,
                    'old_price' => 0.00
                ]);
                echo '_S' . $id .'_E';
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('JOBS - Create ClearOldPrice ERROR :::  ' . $e);

        }

    }
}
