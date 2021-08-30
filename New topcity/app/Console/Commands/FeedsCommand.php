<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class FeedsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeds:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'feeds generate';

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
        $xml = new \DOMDocument('1.0', 'utf-8'); //создаем новый экземпляр<

        $rss = $xml->appendChild($xml->createElement('rss')); // добавляем тег rss

        $rss->setAttribute('version', '2.0'); //атрибуты

        $rss->setAttribute('xmlns:g', 'http://base.google.com/ns/1.0');//атрибуты/


        $channel = $rss->appendChild($xml->createElement('channel'));
        $main_title = $channel->appendChild($xml->createElement('title'));

        $main_title->appendChild($xml->createTextNode('ТОВ "Топсітісервіс"'));

        $main_link = $channel->appendChild($xml->createElement('link',url('/')));


        $main_desc = $channel->appendChild($xml->createElement('description'));

        $main_desc->appendChild($xml->createTextNode('Компанія Топсітісервіс спеціалізується на професійному доборі обладнання SIEMENS, реалізації та постачанні автоматизованих систем управління технологічними процесами (АСУ ТП).'));


        $category = Category::query()->where('slug','sklad')->first();
        $categories = $category->descendants()->pluck('id');
        $categories[] = $category->id;


        $products = Product::query()->with('categories')->whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('category_id', $categories);
        })->get();

        foreach ($products as $product)
        {

            $item = $channel->appendChild($xml->createElement('item'));

            $id = $item->appendChild($xml->createElement('g:id',$product->id));



            $title = $item->appendChild($xml->createElement('g:title',$product->name));

            $description = $item->appendChild($xml->createElement('g:description',$product->details));

            $url = $item->appendChild($xml->createElement('g:link',route('shop.show-product',['category'=> $product->categories->last()->slug,'product'=>$product->id])));

            $image_link = $item->appendChild($xml->createElement('g:image_link',asset('storage/'.$product->image)));

            $condition = $item->appendChild($xml->createElement('g:condition','new'));

            $availability = $item->appendChild($xml->createElement('g:availability','in stock'));

            $price = $item->appendChild($xml->createElement('g:price',$product->price . ' EUR'));

            $brand = $item->appendChild($xml->createElement('g:brand','SIEMENS'));

            $mpn = $item->appendChild($xml->createElement('g:mpn',$product->article));


            //img link




//            $shipping = $item->appendChild($xml->createElement('g:shipping','true'));











        }

        if($xml->save('feeds.xml')) {

            echo 'Обновление фида завершилось успешно!';

        }else {

            echo "Не удалось сохранить файл фида данных. Возможно у файла не достаточно прав доступа";

        }

        $xml->save('feeds.xml'); #-> сохраняем файл
    }
}
