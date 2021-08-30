    <?php


    use App\Http\Middleware\LocaleMiddleware;




    Route::get('index','NovaPoshtaController@index');
    Route::get('show','NovaPoshtaController@show');



    Route::get('/products', 'Voyager\NewsController@getProducts')->name('products');
    Route::post('/products-upload', 'Voyager\ProductsController@upload_products')->name('voyager.products.upload_csv');



    Route::post('/checkout/quick','CheckoutController@quick_store')->name('checkout.quick_store');


    //Загрузка акцій
    Route::post('/admin/upload-discount','Voyager\NewsController@upload_discount')->name('upload_discount');
    //end------------------------

    Route::put('/admin/product/update/{id}','Voyager\ProductsController@update_characteristics')->name('voyager.product.update_characteristics');

    Route::get('trans','TranslateController@translateToRu');
    Route::post('parse','ParseCsvController@parse');



    Route::get('/liqpay', 'CheckoutController@liqpay')->name('checkout.liqpay');

    Route::post('/confirm_pay', 'CheckoutController@callbackLiqpay')->name('checkout.callback');




    Route::get('admin/feed','FeedsController@index')->name('feed.index');
    Route::get('admin/feed/generate','FeedsController@generate')->name('feed.generate');


    Route::post('reset/password','Auth\ResetPasswordController@resetPasswordFromEmail')->name('reset.password');


    /*//Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
    //Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

    //Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
    //Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    //Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

    //Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');

    */
    Route::get('/check/{id}', 'CheckoutController@check')->name('checkout.check')->middleware('auth');

    Route::get('/auth', function (){
        return response()->json(['auth'=> auth()->user() ? true : false]);
    });


    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    // Social Auth ------------------------------------------------------------------------

    Route::get('/redirect/{provider}', 'Auth\SocialAuthController@redirect');
    Route::get('/callback/{provider}', 'Auth\SocialAuthController@callback');

    // End social auth ----------------------------------------------------------------







    // Contacts form in main page--------------------------------------------------------

    Route::post('/sendmail', 'ContactController@send');
    Route::post('/sendphone', 'MailController@send')->name('sendemail');

    //end contact form ------------------------------------------------------------------

    Route::group(['prefix' => LocaleMiddleware::getLocale()], function(){

        Route::view('/thank', 'thank-you');
        Route::get('checkout','CheckoutController@index')->name('checkout');

        Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

        // landing page
        Route::get('/', 'LandingPageController@index')->name('landing-page');
        // end landing page

        // Catalog
        Route::get('/shop', 'ShopController@index')->name('shop.index');
        Route::get('/shop/{category}', 'ShopController@show')->name('shop.show');
        Route::get('/shop/{category}/{product}/', 'ShopController@showProduct')->name('shop.show-product');
        Route::get('/search', 'ShopController@search')->name('shop.search');
        Route::get('/searchCurrentCategory', 'ShopController@searchCurrentCategory')->name('shop.searchCurrentCategory');
        // end catalog


        //comments
        Route::get('/comment','CommentController@index')->name('comment.index');
        Route::post('/comment/{product}/create','CommentController@store')->name('comment.store');
       //endcomments

        // News
        Route::get('news/{category?}','NewsController@index')->name('news.index');
        Route::get('industry-solutions','NewsController@industry_solutions')->name('news.industry_solutions');
        Route::get('news/{category}/{slug}','NewsController@show')->name('news.show');
        // end news


        //cart

        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::get('/cart/translation', 'CartController@translation')->name('cart.translation');
        Route::get('/cart-count', 'CartController@cartCount')->name('cart.count');
        Route::post('/cart', 'CartController@store')->name('cart.store');
        Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
        Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
        Route::post('/cart/addToCartFromSpec', 'CartController@addToCartFromSpec')->name('cart.addToCartFromSpec');


        //endcart


        //specifications

        Route::get('user-cabinet/specifications','SpecificationController@index')->name('specification');
        Route::post('user-cabinet/specification-menu/add-menu','SpecificationController@add_menu');
        Route::post('user-cabinet/specification-menu/search','SpecificationController@search');
        Route::post('user-cabinet/specification-menu/add-specification','SpecificationController@add_specification');
        Route::patch('user-cabinet/specification-menu/{specification}','SpecificationController@update')->name('specification.update');
        Route::delete('user-cabinet/specification-menu/{specification}/item/{specification_item}','SpecificationController@destroy_specification_item');
        Route::delete('user-cabinet/specification-menu/{specification}','SpecificationController@destroy')->name('specification.destroy');
        Route::post('user-cabinet/specification-menu/switchToArchive/{specification}','SpecificationController@switchToArchive');
        Route::post('user-cabinet/specification-menu/switchToSpecification/{specification}','SpecificationController@switchToSpecification');

        //end specifications

        // Auth
        Auth::routes();
        // end auth


        // About Us
        Route::get('/about','AboutUsController@index')->name('about.index');
        //end about us

        Route::middleware('auth')->group(function () {
    //    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
            Route::patch('/user-cabinet', 'UserCabinet\UsersController@update')->name('users.update');
            Route::get('user-cabinet', 'UserCabinet\UsersController@edit')->name('users.edit');


            //delivery address
            Route::get('user-cabinet/my-delivery-address', 'UserCabinet\DeliveryAddressController@create')->name('delivery-address.create');
            Route::post('user-cabinet/my-delivery-address', 'UserCabinet\DeliveryAddressController@store')->name('delivery-address.store');
            Route::get('/user-cabinet/my-delivery-address/{delivery_address}/edit', 'UserCabinet\DeliveryAddressController@edit')->name('delivery-address.edit');
            Route::patch('/user-cabinet/my-delivery-address/{delivery_address}', 'UserCabinet\DeliveryAddressController@update')->name('delivery-address.update');
            Route::delete('user-cabinet/my-delivery-address/{id}', 'UserCabinet\DeliveryAddressController@destroy')->name('delivery-address.destroy');
            //end delivery address


            // legal-person
            Route::get('user-cabinet/my-legal-person', 'UserCabinet\LegalEntityController@create')->name('legal-person.create');
            Route::post('user-cabinet/my-legal-person', 'UserCabinet\LegalEntityController@store')->name('legal-person.store');
            Route::get('user-cabinet/my-legal-person/{legal_person}/edit', 'UserCabinet\LegalEntityController@edit')->name('legal-person.edit');
            Route::patch('user-cabinet/my-legal-person/{legal_person}', 'UserCabinet\LegalEntityController@update')->name('legal-person.update');
            Route::delete('user-cabinet/my-legal-person/{id}', 'UserCabinet\LegalEntityController@destroy')->name('legal-person.destroy');
            // end legal person
            Route::view('user-cabinet/specification-menu','user-cabinet.specification-menu')->name('specification-menu.index');

            // ZIP
            Route::get('user-cabinet/your-zip','UserCabinet\ZipController@index')->name('zip.index');
            Route::post('user-cabinet/your-zip','UserCabinet\ZipController@store')->name('zip.store');
            Route::post('user-cabinet/your-zip/switchToCart','UserCabinet\ZipController@switchToCart')->name('zip.switchToCart');
            Route::delete('user-cabinet/your-zip/{id}','UserCabinet\ZipController@destroy')->name('zip.destroy');
            //endZip

    //        Route::view('user-cabinet/your-zip','user-cabinet.zip')->name('zip.index');

            //specification menu
            Route::view('user-cabinet/specification-menu','user-cabinet/specification-menu')->name('specification-menu.index');

            // end specification menu


            //cart
            Route::post('/cart/switchToZip/', 'CartController@switchToZip')->name('cart.switchToZip');
            //endcart


            Route::get('my-orders', 'UserCabinet\OrdersController@index')->name('orders.index');
    //        Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');


            Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');




        });
        Route::get('{customPage}','CustomPageController@show')->name('custom-page');
    });





    // Start Lang-------------------------------------------------------------------------------------

    //Переключение языков
    Route::get('setlocale/{lang}', 'LangController@setlocale')->name('setlocale');

    //End Lang---------------------------------------------------------------------------

    /*Route::delete('category/truncate',array('as'=>'category.truncate', 'uses'=>'Voyager\CategoryController@truncate'));*/






