<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('password/reset-code', 'Auth\ForgotPasswordController@resetCode');
Route::post('password/reset-code', 'Auth\ForgotPasswordController@postResetCode');

// site routes...
Route::name('site.')->namespace('Site')->group(function () {

    // home routes...
    Route::resource('/', 'HomeController')->only(['index']);

    // team routes...
    Route::resource('team', 'TeamController')->only(['index']);

    // content routes...
    Route::resource('content.post', 'ContentController')->only(['index', 'show']);

    // item routes...
    Route::resource('item.post', 'ItemController')->only(['index', 'show']);

    // portfolio routes...
    Route::resource('portfolio', 'PortfolioController')->only(['index', 'show']);

    // project routes...
    Route::resource('project', 'ProjectController')->only(['index', 'show']);

    // download routes...
    Route::resource('download', 'DownloadController')->only(['index']);

    // job routes...
    Route::resource('job', 'JobController')->only(['index', 'show']);
    Route::get('job/{slug}/apply', 'JobController@apply')->name('job.apply');
    Route::post('job/{slug}/apply', 'JobController@applySubmit')->name('job.apply.submit');
    Route::get('job-post', 'JobController@post')->name('job.post');
    Route::post('job-post', 'JobController@postSubmit')->name('job.post.submit');

    // blog routes...
    Route::resource('blog', 'BlogController')->only(['index', 'show']);

    // gallery routes...
    Route::resource('gallery', 'GalleryController')->only(['index']);

    // contact routes...
    Route::resource('contact', 'ContactController')->only(['index']);

    // registration routes...
    Route::get('registration', 'RegistrationController@index')->name('registration.index');
    Route::post('registration/store', 'RegistrationController@store')->name('registration.store');
//    Route::get('registration/payment', 'RegistrationController@payment')->name('registration.payment');
//    Route::post('registration/payment/create', 'RegistrationController@createPayment')->name('registration.payment.create');
//    Route::post('registration/payment', 'RegistrationController@paymentStore')->name('registration.payment.store');
//    Route::get('registration/successful', 'RegistrationController@successful')->name('registration.successful');

    Route::prefix('registration/payment')->group(function () {
        Route::get('/', 'RegistrationController@paymentIndex')->name('registration.payment.index');
        Route::post('store', 'RegistrationController@paymentStore')->name('registration.payment.store');
        Route::post('success', 'RegistrationController@paymentSuccess')->name('registration.payment.success');
        Route::post('fail', 'RegistrationController@paymentFail')->name('registration.payment.fail');
        Route::post('cancel', 'RegistrationController@paymentCancel')->name('registration.payment.cancel');
        Route::post('ipn', 'RegistrationController@paymentIpn')->name('registration.payment.ipn');
        Route::get('registration/successful', 'RegistrationController@successful')->name('registration.successful');
    });

});

Route::get('stlink', function() {
   \Artisan::call('storage:link'); 
   \Artisan::call('cache:clear'); 
   return "done";
});

Route::post('api/validate/phone', function () {
    if (request()->has('valid_id') && request()->get('valid_id') != '') {
        $user = \App\User::whereNotIn('id', [request()->get('valid_id')])->where(function($query) {
            $query->orWhere('email', request()->player_mobile);
            $query->orWhere('phone', request()->player_mobile);
        })->first();
        if (!empty($user)) {
            return 'false';
        }
        return 'true';
    } else {
        $user = \App\User::where('email', request()->player_mobile)->orWhere('phone', request()->player_mobile)->first();
        if (!empty($user)) {
            return 'false';
            /*if ($user->type == 1) {
                if ($user->approved == 1) {
                    return 'false';
                } else {
                    return 'true';
                }
            } else {
                return 'false';
            }*/
        }
        return 'true';
    }
});

Route::post('api/validate/login', function () {
    $data = request()->all();
    if (filter_var($data['phone'], FILTER_VALIDATE_EMAIL)) {
        $validation = \Illuminate\Support\Facades\Validator::make($data, [
            'phone' => 'unique:users,email'
        ]);
    } else {
        $validation = \Illuminate\Support\Facades\Validator::make($data, [
            'phone' => 'unique:users,phone'
        ]);
    }
    if ($validation->fails()) {
        return 'false';
    } else {
        return 'true';
    }
});

Route::get('bkash1', function() {
    $url = 'https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/';
    $client = new \GuzzleHttp\Client([
        'base_uri' => $url,
        'headers' => [
            'username' => env('BKASH_USERNAME'),
            'password' => env('BKASH_PASSWORD')
        ]
    ]);
    $body = json_encode([
        'app_key' => env('BKASH_APP_ID'),
        'app_secret' => env('BKASH_APP_SECRET')
    ]);
    $response = $client->post('token/grant', [
        'body' => $body
    ]);
    $data = json_decode($response->getBody()->getContents());
    return response()->json($data);
});

Route::get('bkash2', function() {
    $url = 'https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/';
    $client = new \GuzzleHttp\Client([
        'base_uri' => $url,
        'headers' => [
            'authorization' => "eyJraWQiOiJmalhJQmwxclFUXC9hM215MG9ScXpEdVZZWk5KXC9qRTNJOFBaeGZUY3hlamc9IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiI4ZGU4ZjBlMC1mY2RjLTQyNzMtYjY4YS1iNDAwOWNjZjc3ZDEiLCJhdWQiOiI1bmVqNWtlZ3VvcGo5Mjhla2NqM2RuZThwIiwiZXZlbnRfaWQiOiJiMGZhZjFhNS0zMDA5LTQ0NjItOWNkNC1mMzE5MzcxYTA0OTEiLCJ0b2tlbl91c2UiOiJpZCIsImF1dGhfdGltZSI6MTU3MDcwNDMyOCwiaXNzIjoiaHR0cHM6XC9cL2NvZ25pdG8taWRwLmFwLXNvdXRoZWFzdC0xLmFtYXpvbmF3cy5jb21cL2FwLXNvdXRoZWFzdC0xX2tmNUJTTm9QZSIsImNvZ25pdG86dXNlcm5hbWUiOiJ0ZXN0ZGVtbyIsImV4cCI6MTU3MDcwNzkyOCwiaWF0IjoxNTcwNzA0MzI4fQ.KGxSn99IAY45oI5NpD7z2L_aZ0LpM_jJWgz0pLqyotO4NXbV2aqRmYX3krGGy8IScctVtazXIJKaPZt9hhHLqMZDa-QMc0jDQmoajkphMZO3ViDVuadgxetDn9MwqCWJvqmeOwiCYYqpyBvwmrEG8cTKkIFa3AAr-oKjpQrPdRsIptZXNhSTYf6yk0U3ZH3Ehf72HuenkbKyLi6dcAAOV9NmXrqSLW8UJTL12jXN3Kb6jwrOZAlzKCvk3xl_JChNrn074yzyQ0QzEM6O-yaAbxw8Kbx4P-3Lc6RAtvy7MMgAcm6-R9UHVAkruZdpT4IenUb8tJgCw3VDt0AKSLZXtg",
            'x-app-key' => '5nej5keguopj928ekcj3dne8p'
        ]
    ]);
    $body = json_encode([
        "amount" => 100,
        "currency" => "BDT",
        "intent" => "sale",
        "merchantInvoiceNumber" => "1234561"
    ]);
    $response = $client->post('payment/create', [
        'body' => $body
    ]);
    $data = json_decode($response->getBody()->getContents());
    return response()->json($data);
});

Route::get('bkash3', function() {
    $url = 'https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/';
    $client = new \GuzzleHttp\Client([
        'base_uri' => $url,
        'headers' => [
            'authorization' => "eyJraWQiOiJmalhJQmwxclFUXC9hM215MG9ScXpEdVZZWk5KXC9qRTNJOFBaeGZUY3hlamc9IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiI4ZGU4ZjBlMC1mY2RjLTQyNzMtYjY4YS1iNDAwOWNjZjc3ZDEiLCJhdWQiOiI1bmVqNWtlZ3VvcGo5Mjhla2NqM2RuZThwIiwiZXZlbnRfaWQiOiJiMGZhZjFhNS0zMDA5LTQ0NjItOWNkNC1mMzE5MzcxYTA0OTEiLCJ0b2tlbl91c2UiOiJpZCIsImF1dGhfdGltZSI6MTU3MDcwNDMyOCwiaXNzIjoiaHR0cHM6XC9cL2NvZ25pdG8taWRwLmFwLXNvdXRoZWFzdC0xLmFtYXpvbmF3cy5jb21cL2FwLXNvdXRoZWFzdC0xX2tmNUJTTm9QZSIsImNvZ25pdG86dXNlcm5hbWUiOiJ0ZXN0ZGVtbyIsImV4cCI6MTU3MDcwNzkyOCwiaWF0IjoxNTcwNzA0MzI4fQ.KGxSn99IAY45oI5NpD7z2L_aZ0LpM_jJWgz0pLqyotO4NXbV2aqRmYX3krGGy8IScctVtazXIJKaPZt9hhHLqMZDa-QMc0jDQmoajkphMZO3ViDVuadgxetDn9MwqCWJvqmeOwiCYYqpyBvwmrEG8cTKkIFa3AAr-oKjpQrPdRsIptZXNhSTYf6yk0U3ZH3Ehf72HuenkbKyLi6dcAAOV9NmXrqSLW8UJTL12jXN3Kb6jwrOZAlzKCvk3xl_JChNrn074yzyQ0QzEM6O-yaAbxw8Kbx4P-3Lc6RAtvy7MMgAcm6-R9UHVAkruZdpT4IenUb8tJgCw3VDt0AKSLZXtg",
            'x-app-key' => '5nej5keguopj928ekcj3dne8p'
        ]
    ]);
    $response = $client->post('payment/execute/1VGNOEB1570704382830');
    $data = json_decode($response->getBody()->getContents());
    return response()->json($data);
});

Route::get('bkash4', function() {
   //
});

Route::get('bkash5', function() {
    //
});

/*Route::get('/', function () {
    return view('down');
});

Route::get('registration', function () {
    return view('down');
});*/


Route::get('p', function () {
    dd(bcrypt('secret'));
});



Route::get('/custom','showController@showCustom')->name('custom.show');
Route::get('/about','showController@showAbout')->name('about.show');
Route::get('/contact','showController@showContact')->name('contact.show');
Route::get('/house-land','showController@showHouseLand')->name('house_land.show');
Route::get('/our-process','showController@showOurProcess')->name('our-process');
Route::get('/promotions','showController@showPromotions')->name('promotions.show');
Route::get('/inclusions','showController@showInclusions')->name('inclusions.show');
Route::get('/carrers','showController@showCarrers')->name('carrers.show');
Route::get('/duplex-development','showController@showDuplexDevelopment')->name('duplex-development.show');
Route::get('/knock-down-rebuild','showController@showKnockDownRebuild')->name('knock-down-rebuild.show');
Route::get('/double-storey','showController@showDoubleStorey')->name('double-storey.show');
Route::get('/single-storey','showController@showSingleStorey')->name('single-storey.show');
Route::get('/duplex','showController@showDuplex')->name('duplex.show');
Route::get('/where-we-build','showController@showWhereWeBuild')->name('where-we-build.show');
Route::get('/blog','showController@showBlog')->name('blog.show');
Route::get('/supplier','showController@showSupplier')->name('supplier.show');
Route::get('/triplex','showController@showTriplex')->name('triplex.show');
Route::get('/house-granny-flat','showController@showHouseGranny')->name('house-granny.show');
Route::get('/display-homes','showController@showDisplayHome')->name('display-homes.show');
Route::get('/client-portal','showController@showClientPortal')->name('client-portal.show');
Route::get('/granny-flat','showController@showGranny')->name('granny-flat.show');
Route::get('/multi-dwelling','showController@showMultiDwellings')->name('multi-dwelling.show');
Route::get('/points-of-differentiation','showController@pointsDifferentitaion')->name('points-of-differentiation.show');
Route::get('/duplex-list/{id}', 'showController@showDuplexProductList')->name('duplex_all_list.show');
Route::get('/duplex-product-details/{id}', 'showController@showDuplexProductDetails')->name('duplex_product_details.show');

Route::get('/grannyFlat-product-details/{id}', 'showController@showGrannyFlatDetails')->name('grannyFlat-product-details.show');

Route::get('/houseGrannyFlat-product-details/{id}', 'showController@showHouseGrannyFlatDetails')->name('houseGrannyFlat-product-details.show');

Route::get('/doubleStoreyList/{id}','showController@showDoubleStoreyList')->name('double-storey-list.show');

Route::get('/double-storey-productDetails/{id}', 'showController@showDoubleStoreyProductDetails')->name('doubleStoreyProductDetails.show');

Route::get('/singleStoreyList/{id}', 'showController@showSingleStoreyList')->name('single-storey-list.show');

Route::get('/single-storey-product-Details/{id}','showController@showSingleStoreyProductDetails')->name('singleStoreyProductDetails.show');