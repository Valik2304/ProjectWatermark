<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $langs = ['uk', 'ru', 'en'];
        $sitemap_files = [];

        //Category Sitemap


        $sitemap_files[] = $this->generateSitemapMain('sitemap-main.xml');

        //End Category Sitemap



        //Product Sitemap
        $product_count = Product::whereHas('categories',function ($q){
            $q->where('name','!=','SIEMENS');
        })->count();
        $take = 50000;
        $product_limit = (int)($product_count / $take);

        for ($i = 0; $i <= $product_limit; $i++) {
            $product = Product::whereHas('categories',function ($q){
                $q->where('name','!=','SIEMENS');
            })->skip($i * $take)->take($take)->get();

            $sitemap_files[] = $this->generateSitemapProduct('sitemap-product-'.($i+1).'.xml', $product, '/shop/');
        }

        //End product sitemap

        //Generate sitemap.xml (sitemap index)

        $this->generateSitemapIndex($sitemap_files);

        //end generate sitemap index
    }


    public function getMultilangLink($domtree, $page, $whereAppendd)
    {
        $langs = ['uk', 'ru', 'en'];
        foreach ($langs as $lang) {
            $ulr_xhtml_link = $domtree->createElement("xhtml:link");
            $ulr_xhtml_link->setAttribute('rel', "alternate");
            $ulr_xhtml_link->setAttribute('hreflang', $lang);
            $ulr_xhtml_link->setAttribute('href', url($lang == 'uk' ? $page : $lang . $page));
            $whereAppendd->appendChild($ulr_xhtml_link);
            unset($ulr_xhtml_link);
        }
    }

    public function generateSitemapProduct($filename, $products, $main_url)
    {
        $domtree = new DOMDocument('1.0', 'UTF-8');

        $xmlRoot = $domtree->createElement("urlset");
        $xmlRoot->setAttribute('xmlns', "http://www.sitemaps.org/schemas/sitemap/0.9");
        $xmlRoot->setAttribute('xmlns:xhtml', "http://www.w3.org/1999/xhtml");

        $xmlRoot = $domtree->appendChild($xmlRoot);

        foreach ($products as $product) {
            $url = $xmlRoot->appendChild($domtree->createElement("url"));
            $product_url = $main_url . $product->categories->first()->slug . '/' . $product->id;
            $url_loc = $url->appendChild($domtree->createElement("loc", url($product_url)));

            $page = $product_url;
            $this->getMultilangLink($domtree, $page, $url);


            $url_lastmod = $url->appendChild($domtree->createElement("lastmod", \Carbon\Carbon::now()->format('Y-m-d')));
            $url_priority = $url->appendChild($domtree->createElement("priority", 1));

        }


        file_put_contents(public_path('sitemaps/' . $filename), $domtree->saveXML());
        return 'sitemaps/' . $filename;
    }

    public function generateSitemapMain($filename)
    {
        $domtree = new DOMDocument('1.0', 'UTF-8');

        $xmlRoot = $domtree->createElement("urlset");
        $xmlRoot->setAttribute('xmlns', "http://www.sitemaps.org/schemas/sitemap/0.9");
        $xmlRoot->setAttribute('xmlns:xhtml', "http://www.w3.org/1999/xhtml");

        $xmlRoot = $domtree->appendChild($xmlRoot);


        //Home page
        $page = '/';
        $url = $xmlRoot->appendChild($domtree->createElement("url"));
        $url_loc = $url->appendChild($domtree->createElement("loc", url($page)));


        $this->getMultilangLink($domtree, $page, $url);

        $url_lastmod = $url->appendChild($domtree->createElement("lastmod", Carbon::now()->format('Y-m-d')));
        $url_priority = $url->appendChild($domtree->createElement("priority", 1));

        //End Home page

        //About Us
        $page = '/about';
        $url = $xmlRoot->appendChild($domtree->createElement("url"));
        $url_loc = $url->appendChild($domtree->createElement("loc", url($page)));

        $this->getMultilangLink($domtree, $page, $url);

        $url_lastmod = $url->appendChild($domtree->createElement("lastmod", Carbon::now()->format('Y-m-d')));
        $url_priority = $url->appendChild($domtree->createElement("priority", 1));

        //End About us

        //News

        $allnews = News::with('category')->get();
        $this->generateUrlNews($allnews,$xmlRoot,$domtree,'/news/');

        //End news


        //Category
        $categories = Category::where('hide',0)->get();
        $this->generateUrlCategory($categories,$xmlRoot,$domtree,'/shop/');
        //EndCategory


        file_put_contents(public_path('sitemaps/' . $filename), $domtree->saveXML());
        return 'sitemaps/' . $filename;
    }

    public function generateUrlCategory($categories,$xmlRoot,$domtree,$main_url)
    {
        foreach ($categories as $category) {
            $url = $xmlRoot->appendChild($domtree->createElement("url"));
            $category_url = $main_url . $category->slug;
            $url_loc = $url->appendChild($domtree->createElement("loc", url($category_url)));

            $page = $category_url;
            $this->getMultilangLink($domtree, $page, $url);


            $url_lastmod = $url->appendChild($domtree->createElement("lastmod", Carbon::parse($category->created_at)->format('Y-m-d')));
            $url_priority = $url->appendChild($domtree->createElement("priority", 1));

        }
    }


    public function generateUrlNews($allnews,$xmlRoot,$domtree,$main_url)
    {
        foreach ($allnews as $news) {
            $url = $xmlRoot->appendChild($domtree->createElement("url"));
            $news_url = $main_url . $news->category->slug .'/'.$news->slug;
            $url_loc = $url->appendChild($domtree->createElement("loc", url($news_url)));

            $page = $news_url;
            $this->getMultilangLink($domtree, $page, $url);


            $url_lastmod = $url->appendChild($domtree->createElement("lastmod", Carbon::parse($news->created_at)->format('Y-m-d')));
            $url_priority = $url->appendChild($domtree->createElement("priority", 1));

        }
    }


    public function generateSitemapIndex($sitemap_files)
    {
        $domtree = new DOMDocument('1.0', 'UTF-8');

        $xmlRoot = $domtree->createElement("sitemapindex");
        $xmlRoot->setAttribute('xmlns', "http://www.sitemaps.org/schemas/sitemap/0.9");
        $xmlRoot = $domtree->appendChild($xmlRoot);

        foreach ($sitemap_files as $sitemap_file) {

            $url = $xmlRoot->appendChild($domtree->createElement("sitemap"));
            $url_loc = $url->appendChild($domtree->createElement("loc", asset($sitemap_file)));
            $url_lastmod = $url->appendChild($domtree->createElement("lastmod", \Carbon\Carbon::now()->format('Y-m-d')));


        }
        file_put_contents(public_path('sitemap.xml'), $domtree->saveXML());
    }
}