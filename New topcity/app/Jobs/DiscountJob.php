<?php

namespace App\Jobs;

use App\Models\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Str;

class DiscountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

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

            $header = false;
            $i = 1;
            while (($csvLine = fgetcsv($file, 1000, ";")) !== FALSE) {
                if ($header) {
                    $header = false;
                } else {
                    $article = $csvLine[0];
                    $title = $csvLine[1];
                    $description = $csvLine[2];
                    $excerpt = $csvLine[3];
                    $slug = Str::slug($title);
                    $new_price = round_up((double)$csvLine[4]);
                    $product = DB::table('products')->where('article', $article)->select(['id', 'image', 'price'])->first();
                    if (isset($product->id)) {
                        $news = \DB::table('news')
                            ->where('product_id', $product->id)->get();
                        if (count($news) > 0) {
                            $i++;
                            continue;
                        }
                        DB::table('news')->insert([
                            'title' => $title,
                            'slug' => $slug,
                            'image' => $product->image,
                            'excerpt' => $excerpt,
                            'description' => $description,
                            'news_category_id' => 3,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'product_id' => $product->id
                        ]);
                        DB::table('products')
                            ->where('article', $article)
                            ->update([
                                'price' => $new_price,
                                'old_price' => $product->price
                            ]);
                    }
                }


            }

            fclose($file);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('JOBS - Create Discount ERROR :  ' . $e);

        }

        \Log::error('JOBS - Create Discount COUNT :  ' . $i . '...................................................  ');
    }
}
