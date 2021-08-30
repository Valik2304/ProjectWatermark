<?php

namespace App\Jobs;

use App\Models\Category;
use Carbon\Carbon;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Str;

class StockJobDiscount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->file = public_path('storage/category/stock_csv/stock_new_halloywen.csv');
        $not_category = [];
        $product_not_found  = [];
        DB::beginTransaction();
        try {
            $file = fopen($this->file, "r");

            $header = true;
            while (($csvLine = fgetcsv($file, 1000, ",")) !== FALSE) {

                $article = $csvLine[0];
                $product_id = DB::table('products')->where('article', $article)->value('id');
                \Log::error("JOBS - STOCK ARTICLE ::: $article");
                if ($product_id) {
                    $new_price = round_up((double)$csvLine[1]);
                    $old_price = round_up((double)$csvLine[2]);
                    DB::table('products')->where('article', $article)->update([
                        'price' => $new_price,
                        'old_price' => $old_price
                    ]);
                    $category_slug = \DB::table('products')
                        ->join('category_product', 'products.id', '=', 'category_product.product_id')
                        ->join('category', 'category.id', '=', 'category_product.category_id')
                        ->where('products.id', $product_id)
                        ->select('category.slug')
                        ->value('slug');


                    \Log::error("----------------");
                    \Log::error("JOBS - STOCK Category ::: $category_slug");
                    \Log::error("++++++++++++");


                    if ($category_slug) {

                        $category_id_stock = DB::table('category')->where('slug', 'cklad-' . $category_slug)->value('id');
                        DB::table('category_product')
                            ->updateOrInsert([
                                'product_id' => $product_id,
                                'category_id' => $category_id_stock
                            ]);
                        $ids = Category::ancestorsAndSelf($category_id_stock)->pluck('id')->toArray();
                        DB::table('category')->whereIn('id', $ids)->update(['hide' => 0]);

                    } else {
                        $not_category[] = $article;
                    }
                }else{

                    $product_not_found[] = $article;
                }
            }
            $langs = ['uk', 'ru', 'en'];
            foreach ($langs as $language) {
                \Cache::forget('catalog_html_' . $language);
            }
            fclose($file);
            \Log::error("-----------+++++++++++++++++-----");
            \Log::error($not_category);

            \Log::error("-----------+++++++++++++++++-----");
            \Log::error($product_not_found);

            file_put_contents(public_path('not_category.txt'), PHP_EOL, FILE_APPEND);
            file_put_contents(public_path('not_category.txt'), implode(PHP_EOL, $not_category), FILE_APPEND);

            file_put_contents(public_path('product_not_found.txt'), PHP_EOL, FILE_APPEND);
            file_put_contents(public_path('product_not_found.txt'), implode(PHP_EOL, $product_not_found), FILE_APPEND);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('JOBS - Create Product ERROR :::  ' . $e);

        }


    }
}
