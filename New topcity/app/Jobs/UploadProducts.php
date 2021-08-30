<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
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

            $file = fopen($this->file, "r");
            $product_not_found = [];
            $header = 9;
            $i = 1;
            while (($csvLine = fgetcsv($file, 1000, ";")) !== FALSE) {
                if ($i <= $header ) {
                    $i++;
                    continue;
                } else {
                    $article = $csvLine[0];
                    $details = ($csvLine[1]);
                    $price = round_up(floatval(str_replace(',', '.', $csvLine[2])));
                    $qty = (int)$csvLine[3];

                    $name = Str::words($details, 3, '');
                    $product_exist = DB::table('products')->where('article', $article)->value('id');
                    if ($product_exist) {
                        DB::table('products')
                            ->where('article', $article)
                            ->update([
//                                'name' => $name,
//                                'details' => $details,
                                'price' => $price,
                                'qty' => $qty,
                                'updated_at' => Carbon::now()
                            ]);
                    } else {
                        /*$product_id = DB::table('products')
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
                            ]);*/
                        $product_not_found[] = $article;

                    }

                }

            }

            fclose($file);

            \Log::error("-----------+++++++++++++++++-----");
            \Log::error("PRODUCT NOT FOUND!!!");
            \Log::error($product_not_found);
            \Log::error("-----------+++++++++++++++++-----");


//            Storage::put('products/', );
            if(!Storage::disk('public')->exists('products/upload-products-fail/')) {
                Storage::disk('public')->makeDirectory('products/upload-products-fail/');

            }

            \File::put(public_path('storage/products/upload-products-fail/upload-products-fail'. now()->format('d_m_Y__h_i_s') .'.txt'),implode(PHP_EOL, $product_not_found));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('JOBS - UPLOAD Product QTY AND PRICE ERROR :::  ' . $e);

        }
    }
}
