<?php

namespace App\Jobs;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FileToCategoryProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $category_id;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $category_id)
    {
        $this->file = $file;
        $this->category_id = $category_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
//            Product::with('categories:id')->whereHas('categories', function ($query) {
//                $query->where('category.id', $this->category_id);
//            })->update(['price' => 0]);

            $file = fopen($this->file, "r");

            $header = 9;
            $i = 1;
            while (($csvLine = fgetcsv($file, 1000, ";")) !== FALSE) {
                if ($i <= $header ) {
                    $i++;
                    continue;
                } else {
                    $article = $csvLine[0];
                    $details = ($csvLine[1]);
                    $price = round_up((double)$csvLine[2]);
                    $qty = (int)$csvLine[3];
//                    echo($article);
//                    echo($price);

                    $name = Str::words($details, 3, '');
//                    \Log::error('JOBS - Create Product name ERRORRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR :::  ' . $name);
                    $product_exist = DB::table('products')->where('article', $article)->value('id');
                    if ($product_exist) {
                        DB::table('products')
                            ->where('article', $article)
                            ->update([
                                'name' => $name,
                                'details' => $details,
                                'price' => $price,
                                'qty' => $qty,
                                'updated_at' => Carbon::now()
                            ]);
                    } else {
                        $product_id = DB::table('products')
                            ->insertGetId([
                                'name' => $name,
                                'article' => $article,
                                'details' => $details,
                                'price' => $price,
                                'qty' => $qty,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]);
                        DB::table('category_product')
                            ->insert([
                                'category_id' => $this->category_id,
                                'product_id' => $product_id,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]);

                    }

                }

            }

            fclose($file);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('JOBS - Create Product PRICE ERROR :::  ' . $e);

        }
    }
}
