<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('breadcrumbs.home'), route('landing-page'));
});

//Custom page

Breadcrumbs::for('custom-page', function ($trail,$customPage) {
    $trail->parent('home');
    $trail->push(\Illuminate\Support\Str::words($customPage->getTranslatedAttribute('title',App::getLocale(), 5)), route('users.edit'));
});


//User Cabinet
Breadcrumbs::for('user-cabinet', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.my_cabinet'), route('users.edit'));
});

Breadcrumbs::for('users.edit', function ($trail) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.profile'), route('users.edit'));
});

Breadcrumbs::for('legal-person.create', function ($trail) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.legal_persons'), route('legal-person.create'));
});

Breadcrumbs::for('legal-person.edit', function ($trail) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.legal_persons'), route('legal-person.create'));
});

Breadcrumbs::for('delivery-address.create', function ($trail) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.targeted_address'), route('delivery-address.create'));
});

Breadcrumbs::for('delivery-address.edit', function ($trail,$myid =1) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.targeted_address'), route('delivery-address.create'));
});

Breadcrumbs::for('orders.index', function ($trail) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.orders_history'), route('orders.index'));
});

Breadcrumbs::for('specification-menu.index', function ($trail) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.specification_menu'), route('specification-menu.index'));
});

Breadcrumbs::for('zip.index', function ($trail) {
    $trail->parent('user-cabinet');
    $trail->push(__('breadcrumbs.your_ZIP'), route('zip.index'));
});
//==============End User Cabinet

//Catalog
Breadcrumbs::for('shop.index', function ($trail,$category_current = 0) {
    $trail->parent('home');

    $trail->push(__('general.catalog'), route('shop.index'));
});

Breadcrumbs::for('shop.show', function ($trail,$category_current = null) {
    $trail->parent('shop.index');

    if (count($category_current->ancestors) > 0) {
        foreach ($category_current->ancestors as $ancestor) {
            $trail->push(\Illuminate\Support\Str::words($ancestor->getTranslatedAttribute('name', App::getLocale(),'en'), 2), route('shop.show', $ancestor->slug));
        }
    }
        $trail->push(\Illuminate\Support\Str::words($category_current->getTranslatedAttribute('name',App::getLocale(),'uk'),2), route('shop.show',$category_current->slug));


});


Breadcrumbs::for('shop.search', function ($trail) {
    $trail->parent('home');

    $trail->push(__('general.search_result'), route('shop.search'));
});


Breadcrumbs::for('shop.show-product', function ($trail,$product,$category_ancestors) {
    $trail->parent('shop.show',$category_ancestors);

    $trail->push($product->getTranslatedAttribute('name',app()->getLocale(),'uk'), route('shop.show-product',['category'=> $category_ancestors->slug,'product'=>$product->id]));
});

//==============End Catalog


//News

Breadcrumbs::for('news.index', function ($trail,$category = null) {
    $trail->parent('home');
    $trail->push(__('general.news'), route('news.index'));
    if($category){
        $trail->push(\Illuminate\Support\Str::words($category->getTranslatedAttribute('name',App::getLocale()) ?? 'no translation',2,'...'), route('news.index',$category->slug));
    }

});


Breadcrumbs::for('news.industry_solutions', function ($trail,$category = null) {
    $trail->parent('home');
    $trail->push(__('general.industry_solutions'), route('news.index'));
    if($category){
        $trail->push(\Illuminate\Support\Str::words($category->getTranslatedAttribute('name',App::getLocale()) ?? 'no translation',2,'...'), route('news.index',$category->slug));
    }

});


Breadcrumbs::for('news.show', function ($trail,$news) {
    $trail->parent('news.index');
    $trail->push(\Illuminate\Support\Str::words($news->category->getTranslatedAttribute('name',App::getLocale()) ?? 'no translate',2,'...'), route('news.index',$news->category->slug));
    $trail->push(\Illuminate\Support\Str::words($news->title,2,'...'), route('news.show',['category'=>$news->category->slug,'news' => $news->id]));

});

//===========End News


//About US
Breadcrumbs::for('about.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('general.about_us'), route('about.index'));


});

//=============End About US

//CHECKOUT

Breadcrumbs::for('checkout', function ($trail) {
    $trail->parent('home');
    $trail->push(__('general.checkout'), route('checkout'));


});

//ENDCHECKOUT