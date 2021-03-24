<?php


Route::get('/',function(){
    return view('vue.master');
});

Auth::routes();
  Route::post('/wallet/ssl/success', 'Frontend\WalletController@sslSuccess');
       Route::post('/wallet/ssl/cancle', 'Frontend\WalletController@sslCancel');
       Route::post('/wallet/ssl/fail', 'Frontend\WalletController@fail');


    Route::group(['prefix' => 'forgot/password', 'namespace' => 'Auth'], function () {
        Route::get('verification/code/{remember_token}', 'ForgotPasswordController@forgetPassVerificationCodeFrom')->name('forget.password.verify.code.form');
        Route::post('verification/code/', 'ForgotPasswordController@checkForgetPassVerificationCode')->name('user.check.verification.code');
        Route::get('reset/{remember_token}', 'ForgotPasswordController@forgetResetPasswordForm')->name('forget.reset.password');
        Route::post('forget/reset/password/submit', 'ForgotPasswordController@forgetResetPasswordSubmit')->name('forget.reset.password.submit');
        Route::post('resend/verification/code/mail/{remember_token}', 'ForgotPasswordController@forgetResendVerificationCodeMail')->name('resend.verification.code');
    });

    Route::group(['prefix' => 'user/login/', 'namespace' => 'Auth'], function () {
        Route::post('modal', 'LoginController@modalLogin')->name('modal.login');
        Route::get('login/google', 'LoginController@redirectToProviderGoogle')->name('google.login');
        Route::get('google/callback', 'LoginController@handleProviderGoogleCallback');
        Route::get('login/facebook', 'LoginController@redirectToProviderFacebook')->name('facebook.login');
        Route::get('facebook/callback', 'LoginController@handleProviderFacebookCallback');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    //admin routes
    Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('admin/password/reset/', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('admin/password/reset/{token}', 'Auth\AdminForgotPasswordController@forgetpassreset')->name('admin.resetpassword.request');
    Route::post('admin/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard'); //admin dashboard
    Route::get('/admin/auth/verification/{email}', 'Auth\AdminForgotPasswordController@adminverification')->name('admin.auth.adminverification'); //admin dashboard
    Route::post('/admin/auth/verify/code', 'Auth\AdminForgotPasswordController@adminverifycode')->name('admin.verify.code'); //admin dashboard
    Route::get('/admin/auth/password/reset/{email}', 'Auth\AdminForgotPasswordController@adminpassreset')->name('admin.forget.pass.reset'); //admin dashboard
    Route::post('/admin/auth/password/forget', 'Auth\AdminForgotPasswordController@adminforpasschange')->name('admin.forgetpassword.change'); //admin dashboard



    //admin setting section
    Route::get('admin/profile', 'AdminController@AdminProfile')->name('admin.profile');
    Route::get('admin/edit/profile', 'AdminController@AdminEditProfile')->name('admin.edit.profile');
    Route::post('admin/update/profile', 'AdminController@AdminUpdateProfile')->name('admin.update.profile');
    Route::get('admin/password/change', 'AdminController@AdminPasswordChange')->name('admin.password.change');
    Route::post('admin/password/update', 'AdminController@AdminPasswordUpdate')->name('admin.password.update');
    Route::get('admin/profile/lock', 'AdminController@AdminLockScreen')->name('admin.lock.screen');
    Route::post('/admin/unlock/screen', 'AdminController@UnlockScreen')->name('admin.unlock.screen');
    Route::get('admin/logout', 'AdminController@AdminLogOut')->name('admin.logout');

    //seo setting
    Route::get('admin/general/setting', 'Admin\SeoController@Seo')->name('admin.seo.setting');
    Route::post('admin/seo/update', 'Admin\SeoController@SeoUpdate')->name('admin.seo.update');
    Route::get('admin/social/setting', 'Admin\SeoController@Social')->name('admin.social.setting');
    Route::post('admin/social/update', 'Admin\SeoController@SocialUpdate')->name('admin.social.update');
    Route::post('admin/socialmedia/update', 'Admin\SeoController@SocialmediaUpdate')->name('admin.socialmedia.update');
    Route::get('admin/logo/setting', 'Admin\SeoController@LogoSetting')->name('admin.logo.setting');
    Route::post('admin/panel/logo/update', 'Admin\SeoController@AdminLogoUpdate')->name('admin.panel.logo');
    Route::post('admin/frontlogo/update', 'Admin\SeoController@AdminFrontLogoUpdate')->name('admin.front.logo');
    //mail and Sms setting
    Route::get('admin/mail/setting', 'Admin\SeoController@MailSetting')->name('admin.mail.setting');
    Route::post('admin/smtp/update', 'Admin\SeoController@smtpUpdate')->name('admin.smtp.update');
    Route::post('admin/mailgun/update', 'Admin\SeoController@mailgunUpdate')->name('admin.mailgun.update');

    Route::get('admin/message/update', 'Admin\SeoController@messagenew')->name('admin.message.get');

    // sms setting area start
    Route::post('admin/sms/setting', 'Admin\SmsController@smsUpdate')->name('admin.sms.update');
    Route::get('admin/sms/verification/form/{rem_token}', 'Auth\RegisterController@smsVerificationform')->name('sms.verification.form');
    Route::post('admin/sms/verification/submit', 'Auth\RegisterController@smsVerification')->name('sms.verification.submit');
    //payment gateway
    Route::get('admin/payment/gateway', 'Admin\GatewayController@PaymentGateway')->name('admin.payment.gateway');
    Route::get('admin/social/login', 'Admin\GatewayController@sociallogin')->name('admin.sociallogin');

    Route::get('admin/smtp/setup', 'Admin\GatewayController@smtp')->name('admin.smtp');
    Route::post('admin/sociallogin/update', 'Admin\GatewayController@socialloginupdate');
    Route::post('admin/checkout/update', 'Admin\GatewayController@update');
    Route::post('admin/mollie/gateway', 'Admin\GatewayController@MollieUpdate')->name('admin.mollie.update');
    Route::get(md5('admin/Activation'), 'Admin\GatewayController@activation')->name('admin.activation');

    // facebook activation

    Route::get('admin/facebook/update/active/{id}', 'Admin\GatewayController@fbupdate');
    Route::get('admin/facebook/update/deactive/{id}', 'Admin\GatewayController@fbupdatedeactive');
    // google
    Route::get('admin/google/update/active/{id}', 'Admin\GatewayController@googleactive');
    Route::get('admin/google/update/deactive/{id}', 'Admin\GatewayController@googledeactive');
    //smtp
    Route::get('admin/smtp/update/active/{id}', 'Admin\GatewayController@smtpactive');
    Route::get('admin/smtp/update/deactive/{id}', 'Admin\GatewayController@smtpdeactive');
    //paypal
    Route::get('admin/paypal/update/active/{id}', 'Admin\GatewayController@paypalactive');
    Route::get('admin/paypal/update/deactive/{id}', 'Admin\GatewayController@paypaldeactive');

    Route::get('admin/stripe/update/active/{id}', 'Admin\GatewayController@stripeactive');
    Route::get('admin/stripe/update/deactive/{id}', 'Admin\GatewayController@stripedeactive');
    // ssl
    Route::get('admin/ssl/update/active/{id}', 'Admin\GatewayController@sslactive');
    Route::get('admin/surjo/update/active/{id}', 'Admin\GatewayController@surjoactive');
    Route::get('admin/ssl/update/deactive/{id}', 'Admin\GatewayController@ssldeactive');
    Route::get('admin/surjo/update/deactive/{id}', 'Admin\GatewayController@surjodeactive');
    // cash on delevery
    Route::get('admin/cash/update/active/{id}', 'Admin\GatewayController@cashactive');
    Route::get('admin/cash/update/deactive/{id}', 'Admin\GatewayController@cashdeactive');
    // sms
    Route::get('admin/sms/update/active/{id}', 'Admin\GatewayController@smsactive');
    Route::get('admin/sms/update/deactive/{id}', 'Admin\GatewayController@smsdeactive');

    Route::get('Admin/user/verification/option/choose/{verifyId}', 'Admin\GatewayController@changeVerificationOption')->name('verification.option');


    // category
    Route::get(md5('admin/category/add'), 'Admin\CategoryController@add')->name('admin.category.add');
    Route::get(md5('admin/category/all'), 'Admin\CategoryController@index')->name('admin.category.all');
    Route::post(md5('admin/category/insert'), 'Admin\CategoryController@insert')->name('admin.category.insert');

    Route::get('admin/category/edit/{cate_id}', 'Admin\CategoryController@edit');

    Route::post(md5('admin/category/update'), 'Admin\CategoryController@update')->name('admin.category.update');
    Route::get('admin/category/softdelete/{id}', 'Admin\CategoryController@softdelete');
    Route::post('admin/category/multiplesoftdelete', 'Admin\CategoryController@multiplesoftdelete');
    Route::get('admin/category/deactive/{id}', 'Admin\CategoryController@deactive');
    Route::get('admin/category/active/{id}', 'Admin\CategoryController@active');
    Route::get('admin/category/delete/{id}', 'Admin\CategoryController@delete');
    Route::get('admin/category/restore/{id}', 'Admin\CategoryController@restore');
    // subcategory
    Route::get(md5('admin/subcategory/all'), 'Admin\SubCategoryController@index')->name('admin.subcategory.all');
    Route::post(md5('admin/subcategory/insert'), 'Admin\SubCategoryController@insert')->name('admin.subcategory.insert');
    Route::get('/get/subcategory/edit/{subcate_id}', 'Admin\SubCategoryController@edit');
    Route::post('admin/subcategory/update', 'Admin\SubCategoryController@update')->name('admin.subcategory.update');
    Route::get('admin/subcategory/active/{id}', 'Admin\SubCategoryController@active');
    Route::get('admin/subcategory/deactive/{id}', 'Admin\SubCategoryController@deactive');
    Route::get('admin/subcategory/softdelete/{id}', 'Admin\SubCategoryController@softdelete');
    Route::get('admin/subcategory/restore/{id}', 'Admin\SubCategoryController@restore');
    Route::post('admin/subcategory/multiplesoftdelete', 'Admin\SubCategoryController@multiplesoftdelete');
    Route::get('admin/subcategory/delete/{id}', 'Admin\SubCategoryController@delete');
    // resubcategory
    Route::get(md5('admin/resubcategory/all'), 'Admin\ReSubCategoryController@index')->name('admin.resubcategory.all');
    Route::get('/get/subcategory/all/{cate_id}', 'Admin\ReSubCategoryController@subcate');
    Route::post('admin/resubcategory/insert', 'Admin\ReSubCategoryController@insert')->name('admin.resubcategory.insert');
    Route::get('admin/resubcategory/deactive/{id}', 'Admin\ReSubCategoryController@deactive');
    Route::get('admin/resubcategory/active/{id}', 'Admin\ReSubCategoryController@active');
    Route::get('admin/resubcategory/softdelete/{id}', 'Admin\ReSubCategoryController@softdelete');
    Route::post('admin/resubcategory/multisoftdelete', 'Admin\ReSubCategoryController@multisoftdel')->name('');
    Route::get('/get/resubcategory/edit/{resubcate_id}', 'Admin\ReSubCategoryController@edit')->name('');
    Route::post('admin/resubcategory/update', 'Admin\ReSubCategoryController@update')->name('admin.resubcategory.update');
    Route::get('admin/resubcategory/restore/{id}', 'Admin\ReSubCategoryController@restore');
    Route::get('admin/resubcategory/delete/{id}', 'Admin\ReSubCategoryController@delete');
    // color
    Route::get(md5('admin/color/all'), 'Admin\ColorController@index')->name('admin.color.all');
    Route::post(md5('admin/color/insert'), 'Admin\ColorController@insert')->name('admin.color.insert');
    Route::get('admin/color/active/{id}', 'Admin\ColorController@active');
    Route::get('admin/color/deactive/{id}', 'Admin\ColorController@deactive');
    Route::get('admin/color/softdelete/{id}', 'Admin\ColorController@softdelete');
    Route::get('admin/color/recover/{id}', 'Admin\ColorController@recover');
    Route::post('admin/color/multisoftdelete', 'Admin\ColorController@multisoftdel');
    Route::get('admin/color/delete/{id}', 'Admin\ColorController@delete');
    Route::get('/get/color/edit/{color_id}', 'Admin\ColorController@edit');
    Route::post(md5('admin/color/update'), 'Admin\ColorController@update')->name('admin.color.update');
    // theme color setup
    Route::get(md5('admin/themecolor/all'), 'Admin\ThemeColorController@index')->name('admin.themecolor.all');
    Route::post(md5('admin/themecolor/insert'), 'Admin\ThemeColorController@insert')->name('admin.themcolor.insert');
    Route::post(md5('admin/themecolor/update'), 'Admin\ThemeColorController@update')->name('admin.themecolor.update');
    Route::get('/get/admin/themecolor/{id}', 'Admin\ThemeColorController@edit');
    Route::get('admin/themecolor/softDelete/{id}', 'Admin\ThemeColorController@softDelete');
    Route::get('admin/themecolor/active/{id}', 'Admin\ThemeColorController@active');
    Route::post('admin/themecolor/multisofdel', 'Admin\ThemeColorController@multisofdel');


    // brand controller
    Route::get(md5('admin/brand/all'), 'Admin\BrandController@index')->name('admin.brand.all');
    Route::post('admin/brand/insert', 'Admin\BrandController@insert')->name('admin.brand.insert');
    Route::get('admin/brand/active/{id}', 'Admin\BrandController@active');
    Route::get('admin/brand/deactive/{id}', 'Admin\BrandController@deactive');
    Route::get('admin/brand/softdelete/{id}', 'Admin\BrandController@softdelete');
    Route::get('admin/brand/recover/{id}', 'Admin\BrandController@recover');
    Route::post('admin/brand/multipledelete', 'Admin\BrandController@multidel');
    Route::get('admin/brand/delete/{id}', 'Admin\BrandController@delete');
    Route::get('/get/brand/edit/{brand_id}', 'Admin\BrandController@edit');
    Route::post('admin/brand/update', 'Admin\BrandController@update')->name('admin.brand.update');
    // measurement
    Route::get(md5('admin/measurement/all'), 'Admin\MeasurementController@index')->name('admin.measurement.all');
    Route::post('admin/measurement/insert', 'Admin\MeasurementController@insert')->name('admin.measurement.insert');
    Route::post('admin/measurement/update', 'Admin\MeasurementController@update')->name('admin.measurement.update');
    Route::get('admin/measurement/actve/{id}', 'Admin\MeasurementController@active');
    Route::get('/get/measurement/edit/{m_id}', 'Admin\MeasurementController@edit');
    Route::get('admin/measurement/deactve/{id}', 'Admin\MeasurementController@deactive');
    Route::get('admin/measurement/softdelete/{id}', 'Admin\MeasurementController@softdelete');
    Route::get('admin/measurement/recover/{id}', 'Admin\MeasurementController@recover');
    Route::get('admin/measurement/delete/{id}', 'Admin\MeasurementController@delete');
    Route::post('admin/measurement/multisoftdelete', 'Admin\MeasurementController@multisoftdelete');
    // delevery amount
    Route::get(md5('admin/deleveryamount'), 'Admin\MeasurementController@deleverypayment')->name('admin.deleveryamount.all');
    Route::post(md5('admin/deleveryamount/submit'), 'Admin\MeasurementController@deleverysubmit')->name('admin.deleveryamount.submit');



    // cupon controller
    Route::get(md5('admin/cupon/all'), 'Admin\CuponController@index')->name('admin.cupon.all');
    Route::get(md5('admin/cupon/add'), 'Admin\CuponController@add')->name('admin.cupon.add');
    Route::post(md5('admin/cupon/insert'), 'Admin\CuponController@insert')->name('admin.cupon.insert');
    Route::get('admin/cupon/deactive/{id}', 'Admin\CuponController@deactive');
    Route::get('admin/cupon/active/{id}', 'Admin\CuponController@active');
    Route::get('admin/cupon/softdelete/{id}', 'Admin\CuponController@softdelete');
    Route::get('admin/cupon/edit/{id}', 'Admin\CuponController@edit');
    Route::post('admin/cupon/update', 'Admin\CuponController@update')->name('admin.cupon.update');
    Route::post('admin/cupon/multiplesoftdelete', 'Admin\CuponController@multiplesoftdelete');
    Route::get('admin/cupon/restore/{id}', 'Admin\CuponController@restore');
    Route::get('admin/cupon/delete/{id}', 'Admin\CuponController@delete');

    // product controller
    Route::get(md5('admin/product/producttype'), 'Admin\ProductController@producttype')->name('admin.product.producttype');
    Route::get(md5('admin/product/add'), 'Admin\ProductController@add')->name('admin.product.add');
    Route::get(md5('admin/product/digital/add'), 'Admin\ProductController@digital')->name('admin.product.digital');
    Route::get(md5('admin/product/affiliate/add'), 'Admin\ProductController@affiliate')->name('admin.product.affiliate');
    Route::get(md5('admin/product/digital/license'), 'Admin\ProductController@license')->name('admin.product.license');
    Route::get(md5('admin/product/all'), 'Admin\ProductController@index')->name('admin.product.all');
    Route::post(md5('admin/product/insert'), 'Admin\ProductController@insert')->name('admin.product.insert');
    Route::post('admin/product/update/{id}', 'Admin\ProductController@update')->name('admin.product.update');
    Route::get('admin/product/combination', 'Admin\ProductController@sku_combination')->name('products.sku_combination');
    Route::get('admin/product/combination/edit', 'Admin\ProductController@sku_combination_edit')->name('products.sku_combination_edit');
    Route::get('/get/resubcategory/all/{subcate_id}', 'Admin\ProductController@resub');
    Route::post('/get/admin/todays_deal', 'Admin\ProductController@updatetodaydeal')->name('products.todays_deal');
    Route::post('/get/admin/published', 'Admin\ProductController@updatepublished')->name('products.published');
    Route::get('admin/product/view/{id}', 'Admin\ProductController@view');

    Route::post('admin/product/multisoftdelete', 'Admin\ProductController@productmultisoftdelete');
    Route::get('admin/product/restore/{id}', 'Admin\ProductController@prorecover');
    Route::get('admin/product/lincencepro/{id}', 'Admin\ProductController@licencepro')->name('admin.licencepro.delete');
    Route::get('admin/product/softdelete/{id}', 'Admin\ProductController@softdelete');
    Route::get('admin/product/hearddelete/{id}', 'Admin\ProductController@hearddelete');




    // product type physical edit
    Route::get('admin/product/edittypeone/{id}', 'Admin\ProductController@producteditone');
    // product type digital  edit
    Route::get('admin/product/productedittwo/{id}', 'Admin\ProductController@productedittwo');
    // product type lincence edit
    Route::get('admin/product/producteditthree/{id}', 'Admin\ProductController@producteditthree');
    // product type affiliate edit
    Route::get('admin/product/producteditfour/{id}', 'Admin\ProductController@producteditfour');

    // general setting


    Route::get(md5('admin/forntendsetup/aboutus'), 'Admin\ForntendSetupController@aboutus')->name('admin.aboutus');
    Route::post('admin/forntendsetup/aboutus/update', 'Admin\ForntendSetupController@aboutusupdate')->name('admin.aboutus.update');
    Route::get(md5('admin/forntendsetup/termscondition'), 'Admin\ForntendSetupController@termsandcondition')->name('admin.termscondition');
    Route::post(md5('admin/forntendsetup/termsconditionupdate'), 'Admin\ForntendSetupController@termsandconditionupdate')->name('admin.termsandcondition.update');
    Route::get(md5('admin/forntendsetup/faq/add'), 'Admin\ForntendSetupController@faq')->name('admin.faq');

    Route::post(md5('admin/forntendsetup/faq/insert'), 'Admin\ForntendSetupController@faqinsert')->name('admin.faq.insert');
    Route::get(md5('admin/forntendsetup/faq/all'), 'Admin\ForntendSetupController@allfaq')->name('admin.faq.all');

    Route::get('admin/faq/deactive/{id}', 'Admin\ForntendSetupController@faqdeactive');
    Route::get('admin/faq/active/{id}', 'Admin\ForntendSetupController@faqactive');
    Route::get('/get/faq/edit/{faqid}', 'Admin\ForntendSetupController@faqedit');
    Route::post('admin/faq/update', 'Admin\ForntendSetupController@faqupdate')->name('admin.faq.update');
    Route::get('admin/faq/softdelete/{id}', 'Admin\ForntendSetupController@faqsoftdelete');
    Route::post('admin/faq/multisoftdelete', 'Admin\ForntendSetupController@faqmultidelete');
    Route::get('admin/faq/recover/{id}', 'Admin\ForntendSetupController@faqrecover');
    Route::get('admin/faq/faqhearddelete/{id}', 'Admin\ForntendSetupController@faqhearddelete');
    //page controller
    Route::get(md5('admin/page/all'), 'Admin\PageController@index')->name('admin.page.all');
    Route::get(md5('admin/page/add'), 'Admin\PageController@add')->name('admin.page.add');
    Route::get('admin/page/edit/{id}', 'Admin\PageController@edit');

    Route::post(md5('admin/page/insert'), 'Admin\PageController@insert')->name('admin.page.insert');
    Route::get('admin/page/deactive/{id}', 'Admin\PageController@deactive');
    Route::get('admin/page/active/{id}', 'Admin\PageController@active');
    Route::get('admin/page/softdelete/{id}', 'Admin\PageController@pagesoftdel');

    Route::post('admin/page/update', 'Admin\PageController@update')->name('admin.page.update');
    Route::post('admin/page/multisoftdelete', 'Admin\PageController@pagemultidel')->name('admin.page.multisoftdelete');
    Route::get('admin/page/recover/{id}', 'Admin\PageController@recover');
    Route::get('admin/page/hearddelete/{id}', 'Admin\PageController@hearddelete');
    // banner
    Route::get('admin/banner/all', 'Admin\BannerController@index')->name('admin.banner.all');
    Route::post(md5('admin/banner/insert'), 'Admin\BannerController@insert')->name('admin.banner.insert');

    Route::get('admin/banner/active/{id}', 'Admin\BannerController@active');
    Route::get('admin/banner/restore/{id}', 'Admin\BannerController@restore');
    Route::get('admin/banner/deactive/{id}', 'Admin\BannerController@deactive');
    Route::get('admin/banner/softdelete/{id}', 'Admin\BannerController@softdelete');

    Route::get('admin/banner/multihearddelete/{id}', 'Admin\BannerController@multihearddelete');

    Route::post('admin/banner/multisoftdelete', 'Admin\BannerController@multisoftdelete')->name('admin.banner.multisoftdelete');
    Route::get('/get/admin/banner/edit/{ban_id}', 'Admin\BannerController@edit');
    Route::post('admin/banner/update', 'Admin\BannerController@update')->name('admin.banner.update');


    // trash controller
    Route::get(md5('admin/trash/category'), 'Admin\TrashController@category')->name('admin.trash.category');
    Route::post('admin/trash/category/multipledelete', 'Admin\TrashController@hearddeletecategory');
    Route::get(md5('admin/trash/subcategory'), 'Admin\TrashController@subcategory')->name('admin.trash.subcategory');
    Route::post('admin/trash/subcategory/multipledelete', 'Admin\TrashController@hearddelsubcate')->name('admin.trash.hearddel');
    Route::get(md5('admin/trash/resubcategory'), 'Admin\TrashController@resubcategory')->name('admin.trash.resubcategory');
    Route::post('admin/trash/resubcategory/multipledelete', 'Admin\TrashController@resubmultidel');
    Route::post('admin/trash/color/multiplehdelete', 'Admin\TrashController@multicolordel')->name('admin.trash.color.delete');
    Route::get(md5('admin/trash/color'), 'Admin\TrashController@color')->name('admin.trash.color');

    Route::get(md5('admin/trash/brand'), 'Admin\TrashController@brand')->name('admin.trash.brand');
    Route::get(md5('admin/trash/measurement'), 'Admin\TrashController@measurement')->name('admin.trash.measurement');
    Route::post('admin/trash/brand/delete', 'Admin\TrashController@brandhearddelete')->name('admin.trash.brand.delete');
    Route::post('admin/trash/measurement/delete', 'Admin\TrashController@measurementhearddelete')->name('admin.trash.measurement.delete');
    Route::get(md5('admin/trash/product'), 'Admin\TrashController@product')->name('admin.trash.product');
    Route::post(md5('admin/trash/product/hearddelete'), 'Admin\TrashController@producthearddel')->name('admin.trash.producthearddel');
    Route::get(md5('admin/trash/banner'), 'Admin\TrashController@banner')->name('admin.trash.banner');
    Route::post(md5('admin/trash/banmultidel'), 'Admin\TrashController@banmultidel')->name('admin.trash.multidelban');
    Route::get(md5('admin/trash/allorder'), 'Admin\TrashController@alldeleteorder')->name('admin.trash.allorder');
    Route::post(md5('admin/trash/allorder/multidel'), 'Admin\TrashController@ordermultdel')->name('admin.trash.ordermultdel');
    // Warranty trash
    Route::get(md5('admin/trash/warrantytrash'), 'Admin\TrashController@warrantytrash')->name('admin.trash.warrantytrash');
    Route::post(md5('admin/trash/warranty/multidelete'), 'Admin\trashcontroller@warrantytrashdelete')->name('admin.warranty.multidelete');
    // support
    Route::get(md5('admin/trash/support'), 'Admin\TrashController@support')->name('admin.trash.support');
    Route::post(md5('admin/trash/support/multidelete'), 'Admin\TrashController@supportnnmultidel')->name('admin.support.multidelete');
    // mobile slider
    Route::get(md5('admin/trash/mobileslider'), 'Admin\TrashController@mobileslider')->name('admin.trash.MobileSlider');

    Route::post(md5('admin/trash/mobileslider/multidelete'), 'Admin\TrashController@msliderdel')->name('admin.trash.multideletemslider');

    Route::get(md5('admin/trash/mobilebanner'), 'Admin\TrashController@trashmobilebanner')->name('admin.trash.mobilebanner');
    Route::post(md5('admin/trash/mobile/banner/multidel'), 'Admin\TrashController@mobilebandel')->name('admin.trash.mobilebannerdel');


    // footer option area start
    Route::get(md5('admin/footer/option'), 'Admin\FooterController@footerShow')->name('admin.footer.option');
    Route::post('admin/footer/option/update', 'Admin\FooterController@footerupdate')->name('admin.footer.option.update');
    // warranty controller index
    Route::get(md5('admin/warranty/all'), 'Admin\WarrantyController@index')->name('admin.warranty.all');
    Route::post(md5('admin/warranty/insert'), 'Admin\WarrantyController@insert')->name('admin.warranty.insert');
    Route::post('admin/warranty/update', 'Admin\WarrantyController@update')->name('admin.warranty.update');
    Route::post(md5('admin/warranty/multipleSoftDelete'), 'Admin\WarrantyController@multipleSoftDelete')->name('admin.warranty.multiplesoftdelete');
    Route::get('admin/warranty/active/{id}', 'Admin\WarrantyController@active');
    Route::get('admin/warranty/deactive/{id}', 'Admin\WarrantyController@deactive');
    Route::get('admin/warranty/softDelete/{id}', 'Admin\WarrantyController@softDelete');
    Route::get('admin/warranty/restore/{id}', 'Admin\WarrantyController@restore');
    Route::get('admin/warranty/delete/{id}', 'Admin\WarrantyController@delete');
    Route::get('get/admin/warranty/edit/{id}', 'Admin\WarrantyController@edit');
    // support controller
    Route::get(md5('admin/support/all'), 'Admin\SupportController@index')->name('admin.support.all');
    Route::post(md5('admin/support/insert'), 'Admin\SupportController@insert')->name('admin.support.insert');
    Route::post(md5('admin/warranty/update'), 'Admin\SupportController@update')->name('admin.support.update');
    Route::get('admin/support/active/{id}', 'Admin\SupportController@active');
    Route::get('admin/support/deactive/{id}', 'Admin\SupportController@deactive');
    Route::get('admin/support/softDelete/{id}', 'Admin\SupportController@softDelete');
    Route::get('admin/support/restore/{id}', 'Admin\SupportController@restore');
    Route::get('admin/support/delete/{id}', 'Admin\SupportController@delete');
    Route::post(md5('admin/support/multipleSoftDelete'), 'Admin\SupportController@multipleSoftDelete')->name('admin.support.multiplesoftdelete');
    Route::get('get/admin/support/edit/{id}', 'Admin\SupportController@edit');
    // blog controller category
    Route::get('admin/blog/category', 'Admin\BlogController@catecreate')->name('admin.blog.category');
    Route::post('admin/blog/category/submit', 'Admin\BlogController@catesubmit')->name('admin.blog.category.submit');
    Route::get('admin/blogcate/active/{id}', 'Admin\BlogController@cateactive');
    Route::get('admin/blogcate/deactive/{id}', 'Admin\BlogController@catedeactive');
    Route::get('/get/blogcategory/edit/{subcate_id}', 'Admin\BlogController@editcateblog');
    Route::post('admin/blogcategory/update', 'Admin\BlogController@updatecateblog')->name('admin.blogcategory.update');
    Route::get('admin/blogcategory/delete/{id}', 'Admin\BlogController@catedelete');
    // blog add
    Route::get(md5('admin/blog/add'), 'Admin\BlogController@add')->name('admin.blog.add');
    Route::post(md5('admin/blog/insert'), 'Admin\BlogController@insert')->name('admin.blog.insert');
    Route::get(md5('admin/blog/all'), 'Admin\BlogController@index')->name('admin.blog.all');
    Route::get('admin/blog/deactive/{id}', 'Admin\BlogController@deactive');
    Route::get('admin/blog/active/{id}', 'Admin\BlogController@active');
    Route::get('admin/blog/softdel/{id}', 'Admin\BlogController@softdelete');
    Route::get('admin/blog/recycle/{id}', 'Admin\BlogController@recycle');
    Route::get('admin/blog/delete/{id}', 'Admin\BlogController@delete');
    Route::post('admin/blog/multiplesoftdelete', 'Admin\BlogController@multiplesoftdelete');
    Route::get('admin/blog/edit/{id}', 'Admin\BlogController@edit');
    Route::post('admin/blog/update', 'Admin\BlogController@update')->name('admin.blog.update');

    Route::get(md5('admin/blog/blogcomment'), 'Admin\BlogController@blogcommen')->name('admin.blog.blogcomment');

    Route::get('admin/blogcomment/delete/{id}', 'Admin\BlogController@blogcommentdelete');
    Route::post('admin/blogcomment/multidel', 'Admin\BlogController@blogcommentmultidelete');
    Route::get('/get/admin/blogcomment/reply/{id}', 'Admin\BlogController@blogreply');
    Route::post('admin/reply/submit', 'Admin\BlogController@replySubmit')->name('admin.reply.comment');
    Route::get('admin/comment/deactive/{id}', 'Admin\BlogController@comdeactive');
    Route::get('admin/comment/active/{id}', 'Admin\BlogController@comactive');



    //  Frontend route start from here ============================================ //

    // front end controller

    // Route::get('/', 'Frontend\FrontendController@index');
    Route::get('pagecrate/{id}', 'Frontend\FrontendController@pagecreate');


    Route::get('/about-us', 'Frontend\FrontendController@aboutus')->name('about.us');
    // category
    Route::get('/{slug}', 'Frontend\FrontendController@cateproduct')->name('website.category');

    // subcategory
    Route::get('subacete/{cate_slug}/{subacet_slug}', 'Frontend\FrontendController@subcateproduct');
    // resubcate
    Route::get('resubacetegory/{cate_slug}/{subacet_slug}/{resub_slug}', 'Frontend\FrontendController@resubcateproduct');

    Route::get('flashdeal/products', 'Frontend\FrontendController@flashDealProducts')->name('hot.deal.products');
    Route::post('products/loadmore/show', 'Frontend\FrontendController@loadmoreproduct')->name('load.more.show');
    Route::post('shopproducts/shoploadmore/show', 'Frontend\FrontendController@shoploadmoreproduct')->name('shop.load.more.show');

    // product add to cart in front end




    Route::get('/product/blog', 'Frontend\FrontendController@allblog');
    Route::get('/product/blog/details/{id}', 'Frontend\FrontendController@blogdetails');
    Route::post('/blog/comment', 'Frontend\FrontendController@blogcomment');

    Route::get('details/{id}', 'Frontend\FrontendController@productmodal');

    // Route::get(md5('/customer/login'), 'Frontend\FrontendController@customerLogin')->name('customer.login');

    // Route::get(md5('/customer/register'), 'Frontend\FrontendController@customerRegister')->name('customer.register');
    // wish list

    Route::get('/product/wishlist', 'Frontend\WishlistController@index')->name('product.wishlist');
    Route::get('/product/add/wishlist/{id}', 'Frontend\WishlistController@insert');
    Route::get('/product/add/wishlist/count/{id}', 'Frontend\WishlistController@wishcount');

    Route::get('/allproduct/wishlist', 'Frontend\WishlistController@getproduct');

    Route::get('/allproduct/wishlist/ajax', 'Frontend\WishlistController@getajaxdata')->name('get.wish.data');
    Route::post('/wishlist/delete/', 'Frontend\WishlistController@delete')->name('wish.list.del');
    Route::get(md5('/customer/login'), 'Frontend\FrontendController@customerLogin')->name('customer.login');
    Route::get('/customer/register', 'Frontend\FrontendController@customerRegister')->name('customer.register');
    Route::get('/product/compare/page', 'Frontend\CompareProductController@productCompare')->name('product.compare');
    Route::get('/product/compare/get', 'Frontend\CompareProductController@getCompare')->name('get.compare.data');
    Route::get('/product/add/compare/{com_id}', 'Frontend\CompareProductController@necompare');
    Route::get('/product/add/compare/comcount/{id}', 'Frontend\CompareProductController@comparecount');
    Route::post('/compare/delete/', 'Frontend\CompareProductController@delete')->name('compare.list.del');
    Route::post('/compare/surjopay/payment', 'Frontend\CompareProductController@surjopaynew');
    Route::get('/compare/surjopay/payment/success', 'Frontend\CompareProductController@surjosuccess')->name('surjopy.com.success');
    // wish list end


    // Route::group(['prefix' => 'dashboard', 'namespace' => 'Frontend',], function () {
    //     Route::get('customer/myaccount/settings', 'CustomerController@customerAccount')->name('customer.account');
    //     Route::post('customer/account/update', 'CustomerController@customerAccountUpdate')->name('customer.account.update');
    //     // Ajax Routes
    //     Route::get('customer/get/district/by/division/id/{divisionId}', 'CustomerController@customerGetDistrictByDivision');
    //     Route::get('customer/sub_district/by/district/id/{districtId}', 'CustomerController@customerGetSubDistrictByDistrict');
    //     // Ajax Routes End
    // });

    Route::get('/customer/order', 'Frontend\FrontendController@customerOrder')->name('customer.order');
    Route::get('/customer/order/info/{id}', 'Frontend\FrontendController@customerOrderInfo')->name('customer.order.info');
    Route::get(md5('/customer/order/return'), 'Frontend\FrontendController@customerOrderReturn')->name('customer.order.return');
    Route::get(md5('/customer/gift/voucher'), 'Frontend\FrontendController@customerGiftVoucher')->name('customer.gift.voucher');

    Route::get('/product/detailssearch/', 'Frontend\FrontendController@searchcate')->name('products.search.cate');

    // traking
    Route::get('/tracking/page', 'Frontend\FrontendController@tracking');
    Route::get('tracking/order', 'Frontend\FrontendController@ordertracking');
    // faq
    Route::get('site/faq', 'Frontend\FrontendController@faqpage');
    Route::get('/support', 'Frontend\FrontendController@supportpage');
    Route::get('/warranty', 'Frontend\FrontendController@warrantypage');
    Route::post('product/review', 'Frontend\FrontendController@productreview');
    Route::get('product/shop', 'Frontend\FrontendController@shop')->name('webiste.product.shop');
    // Route Created By Harrison


    Route::get('admin/product/varient', 'Frontend\FrontendController@provarient')->name('products.variant_price');

    //Route::get('category/details/{slug}', 'Frontend\FrontendController@categorydetails');

    Route::group(['prefix' => 'subscriber', 'namespace' => 'Frontend'], function () {
        Route::get('add', 'SubscribeController@insert')->name('frontend.subscriber.insert');
    });

    Route::group(['prefix' => 'contact-us', 'namespace' => 'Frontend'], function () {
        Route::get('/contact', 'ContractUsController@index')->name('contract.us');
        Route::post('send/message', 'ContractUsController@sendMessage')->name('frontend.contract.us.send.message');
    });

    Route::group(['prefix' => 'authentication', 'namespace' => 'Auth'], function () {
        Route::get('users/registred/success/{email}', 'RegisterController@userRegistrationSuccess')->name('user.auth.registration.success');
        Route::get('users/email/verification/{token}', 'RegisterController@emailVerification')->name('user.auth.verification');
    });

    // Route Created By Harrison Ended

    // Theme Selector area start

    Route::get('admin/theme/selector/show', 'Admin\ThemeOptionController@themeSelectorPageShow')->name('theme.selector.show');


    Route::get('admin/theme/selector/active/{id}', 'Admin\ThemeOptionController@active');
    Route::get('admin/theme/selector/deactive/{id}', 'Admin\ThemeOptionController@deactive');



    Route::get('admin/product/modal/show', 'Admin\ThemeOptionController@productModal');
    // add to cart area start

    Route::get('add/to/cart', 'Frontend\AddToCartController@addToCart')->name('product.add.cart');
    // Route::get('product/cart/page', 'Frontend\AddToCartController@productViewCart')->name('product.cart.data');




    Route::post('add/to/cart/show', 'Frontend\Controller@addToCartShow')->name('add.cart.show');
    Route::post('add/to/cart/delete', 'Frontend\AddToCartController@addToCartDelete')->name('add.cart.delete');
    Route::get('get/cart/count/new', 'Frontend\AddToCartController@allcartdatanew')->name('get.allcatmain.getnew');
    // Product view cart
    Route::get(md5('/product/cart/page'), 'Frontend\AddToCartController@productViewCart')->name('product.cart.add');
    Route::post('/product/cart/delete', 'Frontend\AddToCartController@viewCartDelete')->name('product.cart.delete');
    Route::get('/show/total/price', 'Frontend\AddToCartController@showTotalPrice')->name('product.cart.delete');
    // checkout route start here
    Route::get(md5('/checkout/page/show'), 'Frontend\CheckoutController@checkoutshow')->name('checkout.page.show');
    Route::get(md5('/checkout/customer/login'), 'Frontend\CheckoutController@CustomerLogin')->name('checkout.login.show');
    Route::post(md5('/checkout/customer/login'), 'Frontend\CheckoutController@authenticate')->name('checkout.login');
    Route::get(md5('/checkout/order/data'), 'Frontend\CheckoutController@orderData')->name('get.order.data');
    Route::post(md5('/order/data/update'), 'Frontend\CheckoutController@orderDataUpdate')->name('product.order.update');
    Route::post(md5('/order/data/delete'), 'Frontend\CheckoutController@orderDataDelete')->name('product.order.delete');

    //  Add Ajax route for getting courier by upazila ID !
    // Created By Harrison
    Route::get('get/courier/by/upazila/id/{upazilaId}', 'Frontend\CheckoutController@getCourierByUpazila');
    Route::get('check/courier/cash_on_deliviry/{upazila_id}/{courier_id}', 'Frontend\CheckoutController@checkCourierCashOnDeliviry');

    // cart all product show


    Route::post('add/to/cart/show', 'Frontend\AddToCartController@addToCartShow')->name('add.cart.show');

    Route::post('add/to/cart/delete', 'Frontend\AddToCartController@addToCartDelete')->name('add.cart.delete');

    Route::get('addtocart/test/', 'Frontend\AddToCartController@adtest')->name('addtest.cart');

    // used cupon area start


    // place order area start

    Route::post('place/order/submit', 'Frontend\CheckoutController@orderSubmit')->name('place.order.submit');
    Route::get('/user/division/name/{id}', 'Frontend\CheckoutController@userCountrySubmit');
    Route::get('/user/district/name/{id}', 'Frontend\CheckoutController@userDivisionSubmit');
    Route::get('/user/upazila/name/{id}', 'Frontend\CheckoutController@userUpazilaSubmit');



   Route::get('/surgopay/success', 'Frontend\CheckoutController@surgosuccess')->name('surgo.success');



    Route::get('/pay-with-paypal', 'Frontend\CheckoutController@paywithpaypal')->name('payment.paypal');
    Route::get('/payfdggfg', 'Frontend\CheckoutController@paymentsuccess');
    Route::get('/text', 'Frontend\CheckoutController@text');

    // user controller
    route::get('admin/user/add', 'Admin\UserController@add')->name('admin.user.add');
    route::get('admin/user/all', 'Admin\UserController@index')->name('admin.user.all');
    route::get('admin/user/edit/{id}', 'Admin\UserController@edit');
    route::post(md5('admin/user/insert'), 'Admin\UserController@insert')->name('admin.userlist.insert');
    route::post(md5('admin/user/update'), 'Admin\UserController@update')->name('admin.userlist.update');
    route::get('admin/user/delete/{id}', 'Admin\UserController@delete');

    route::post('admin/useradmin/update/', 'Admin\UserController@adminupdate');
    // custommer

    route::get('admin/custommer/all', 'Admin\UserController@customer')->name('admin.custommer.all');
    route::get('admin/custommer/wallet', 'Admin\UserController@wallet')->name('admin.custommer.wallet');
    route::get('admin/custommer/wallet/active/{id}', 'Admin\UserController@walletactive');
    route::get('admin/custommer/wallet/delete/{id}', 'Admin\UserController@walletdelete');
    route::get('admin/custommer/view/{id}', 'Admin\UserController@customerview');
    route::get('admin/customer/delete/{id}', 'Admin\UserController@customerdelete');
    route::post('admin/customeradmin/update', 'Admin\UserController@customerupdate');


    // site banner
    route::get('admin/sitebanner/all', 'Admin\SiteBannerController@sitebanner')->name('admin.sitebanner.all');
    route::get('admin/sitebanner/add', 'Admin\SiteBannerController@addsiteban')->name('admin.sitebanner.add');
    Route::get('admin/sitebanner/deactive/{id}', 'Admin\SiteBannerController@sitebannerdeactive');
    Route::get('admin/sitebanner/active/{id}', 'Admin\SiteBannerController@sitebanneractive');
    Route::get('admin/sitebanner/softdelete/{id}', 'Admin\SiteBannerController@sitebabnsoftdelete');
    Route::get('/get/admin/sitebanner/edit/{id}', 'Admin\SiteBannerController@sitebabnsoftedit');
    Route::get('admin/sitebanner/restore/{id}', 'Admin\SiteBannerController@sitebanrestore');
    Route::get('admin/sitebanner/hearddelete/{id}', 'Admin\SiteBannerController@sitebahearddel');
    route::post(md5('admin/sitebanner/insert'), 'admin\SiteBannerController@sitebannerinsert')->name('admin.sitebanner.insert');
    route::post(md5('admin/sitebanner/update'), 'admin\SiteBannerController@sitebannerupdate')->name('admin.sitebanner.update');
    route::post(md5('admin/sitebanner/multisoftdelete'), 'admin\SiteBannerController@sitebanmultisoft')->name('admin.sitebanner.multisoftdelete');


    // cupon
    Route::get(md5('admin/trash/cupon'), 'Admin\TrashController@cupon')->name('admin.trash.cupon');
    Route::post('admin/trash/cupon/multipledelete', 'Admin\TrashController@cuponmultidelete')->name('admin.trash.cupondelete');
    Route::get(md5('admin/trash/faq'), 'Admin\TrashController@faqtrash')->name('admin.trash.faq');
    Route::post('admin/trash/multihearddelfaq', 'Admin\TrashController@multihearddelfaq')->name('');


    // site banner


    // mobile slider
    route::get(md5('admin/mobile/slider/all'), 'Admin\MobileController@index')->name('admin.mobileslider.all');
    route::post(md5('admin/mobile/slider/insert'), 'Admin\MobileController@insert')->name('admin.mobileslider.insert');
    route::post('admin/mobile/slider/update', 'Admin\MobileController@update');
    route::get('admin/mobile/slider/deactive/{id}', 'Admin\MobileController@deactive');
    route::get('admin/mobile/slider/active/{id}', 'Admin\MobileController@active');
    route::get('admin/mobile/slider/softDelete/{id}', 'Admin\MobileController@softdelete');
    route::get('admin/mobile/slider/restore/{id}', 'Admin\MobileController@restore');
    route::get('/get/admin/mobile/slider/edit/{id}', 'Admin\MobileController@edit');
    route::post(md5('admin/mobile/slider/update'), 'Admin\MobileController@multipleSoftDelete')->name('admin.mobileslider.multipleSoftDelete');
    route::get('admin/mobile/slider/delete/{id}', 'Admin\MobileController@delete');
    // mobile banner
    route::get(md5('admin/mobile/banner/all'), 'Admin\MobileController@banner')->name('admin.mbanner.all');
    route::post(md5('admin/mobile/banner/insert'), 'Admin\MobileController@bannerinsert')->name('admin.mobilebanner.insert');
    route::post(md5('admin/mobile/banner/multibanmodel'), 'Admin\MobileController@multibanmodel')->name('admin.mobilebanner.multibanmodel');
    route::post('admin/mobile/banner/update', 'Admin\MobileController@bannerupdate');
    route::get('admin/mobile/banner/active/{id}', 'Admin\MobileController@banneractive');
    route::get('admin/mobile/banner/softDelete/{id}', 'Admin\MobileController@bannersoftdelete');
    route::get('/get/admin/mobile/banner/edit/{id}', 'Admin\MobileController@banneredit');
    route::get('admin/mobile/banner/delete/{id}', 'Admin\MobileController@mobannerdelete');
    route::get('admin/mobile/banner/restore/{id}', 'Admin\MobileController@mobanrestore');

    // page trash
    Route::get(md5('admin/trash/page'), 'Admin\TrashController@page')->name('admin.trash.page');
    Route::post(md5('admin/trash/multidelpage'), 'Admin\TrashController@pagemultdel')->name('admin.trash.pagemultidel');
    Route::get(md5('admin/trash/sitebanner'), 'Admin\TrashController@sitebanner')->name('admin.trash.sitebanner');
    Route::post(md5('admin/trash/sitebanner/multipledelete'), 'Admin\TrashController@sitebanmultidel')->name('admin.trash.sitebannerdel');
    // blog
    Route::get(md5('admin/trash/blog'), 'Admin\TrashController@blog')->name('admin.trash.blog');
    Route::post(md5('admin/trash/multidelblog'), 'Admin\TrashController@blogdel')->name('admin.trash.blogdel');

    // order Controller



    // page trash
    Route::get(md5('admin/trash/page'), 'Admin\TrashController@page')->name('admin.trash.page');
    Route::post(md5('admin/trash/multidelpage'), 'Admin\TrashController@pagemultdel')->name('admin.trash.pagemultidel');
    Route::get(md5('admin/trash/sitebanner'), 'Admin\TrashController@sitebanner')->name('admin.trash.sitebanner');
    Route::post(md5('admin/trash/sitebanner/multipledelete'), 'Admin\TrashController@sitebanmultidel')->name('admin.trash.sitebannerdel');


    Route::get('admin/product/allorder', 'Admin\OrderController@allorder')->name('admin.allorder');
    Route::get(md5('admin/product/order'), 'Admin\OrderController@index')->name('admin.productorder');
    Route::get('admin/product/process', 'Admin\OrderController@processproduct')->name('admin.productprocess');

    Route::get('admin/product/ondelevery', 'Admin\OrderController@ondelevery')->name('admin.ondevelery');
    Route::get('admin/product/complateorder', 'Admin\OrderController@complateorder')->name('admin.complateorder');
    Route::post('admin/delevary/status', 'Admin\OrderController@deleverystatus');

    Route::get('admin/delevary/rejecteorder', 'Admin\OrderController@rejecteorder')->name('admin.rejecteorder');


    // Blog route start from here
    Route::get('admin/blog/page', 'Admin\BlogController@blogpage')->name('admin.blog.page');


    Route::get(md5('admin/product/order'), 'Admin\OrderController@index')->name('admin.productorder');
    // Route::get(md5('admin/product/process'), 'Admin\OrderController@processproduct')->name('admin.productprocess');

    // Route::get(md5('admin/product/ondelevery'), 'Admin\OrderController@ondelevery')->name('admin.ondevelery');
    // Route::get(md5('admin/product/complateorder'), 'Admin\OrderController@complateorder')->name('admin.complateorder');
    Route::post('admin/delevary/status', 'Admin\OrderController@deleverystatus');


    //
    Route::get('admin/product/order/pendingsoftdelete/{id}', 'Admin\OrderController@pendingsoftdelete');
    Route::get('admin/product/order/invoice/{id}', 'Admin\OrderController@invoice');
    Route::get('admin/product/order/restore/{id}', 'Admin\OrderController@orderrestore');
    Route::post('admin/product/order/multideletepending', 'Admin\OrderController@multideletepending')->name('admin.pendingsoftdelete');
    Route::any('admin/product/status/paymentorder', 'Admin\OrderController@paymentorder')->name('products.orderpayment');
    Route::get('admin/product/order/hearddelete/{id}', 'Admin\OrderController@orderhearddelete');


    // Report controller

    Route::get('admin/product/stockreport', 'Admin\ReportController@productstockreport')->name('admin.product.stock');
    Route::get('/get/admin/report/category/filter', 'Admin\ReportController@categoryreport');
    Route::get('admin/product/wishlist', 'Admin\ReportController@wishproduct')->name('admin.product.wishlistpro');
    Route::get('admin/product/bestsell', 'Admin\ReportController@bestsell')->name('admin.bestsell');


    //Harrison start
    Route::group(['prefix' => 'admin/flash/deal', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {

        Route::get('/', 'FlashDealController@index')->name('admin.flash.deal.index');
        Route::get('create', 'FlashDealController@create')->name('admin.flash.deal.create');
        Route::post('store', 'FlashDealController@insert')->name('admin.flash.deal.insert');
        Route::get('change/status/{flashDealId}', 'FlashDealController@changeStatus')->name('admin.flash.deal.change.status');
        Route::get('edit/{flashDealId}', 'FlashDealController@edit')->name('admin.flash.deal.edit');
        Route::post('update/{flashDealId}', 'FlashDealController@update')->name('admin.flash.deal.update');
        Route::get('soft/delete/{flashDealId}', 'FlashDealController@softDelete')->name('admin.flash.deal.soft.delete');
        Route::post('multiple.soft.delete', 'FlashDealController@multipleSoftDelete')->name('admin.flash.deal.multiple.soft.delete');
        Route::get('all/trash/view', 'FlashDealController@allFlashDealTrashView')->name('admin.flash.deal.trash.view');

        Route::get('single/refactor/{flashDealId}', 'FlashDealController@singleRefactor')->name('admin.flash.deal.single.refactor');
        Route::get('single/force/delete/{flashDealId}', 'FlashDealController@singleForceDelete')->name('admin.flash.deal.single.force.delete');
        Route::post('multiple/force/delete', 'FlashDealController@multipleForceDelete')->name('admin.flash.deal.multiple.force.delete');
        Route::get('deactive/all', 'FlashDealController@inactiveAll')->name('admin.flash.deal.all.decative');
        // Ajax call route
        Route::get('get/selected/products/by/ajax', 'FlashDealController@getProductsByAjax');
        Route::get('get/selected/previous/and/new/products/by/ajax', 'FlashDealController@getProductsPreviousAndNewByAjax');
        // Ajax call route end

    });


// qiuck view controller
    Route::get('/get/product/quickview/{p_id}', 'Frontend\QuickviewController@quick');












    Route::group(['prefix' => 'admin/subscriber/mail', 'namespace'=>'Admin','middleware' => 'auth:admin'], function () {
        Route::get('send/section', 'SubscriberController@mailSendSection')->name('admin.subscriber.send.section');
        Route::get('mail/details/{mailId}', 'SubscriberController@mailDetails')->name('admin.subscriber.mail.details');
        Route::get('/compose', 'SubscriberController@mailComposeSection')->name('admin.subscriber.mail.compose');
        Route::post('send', 'SubscriberController@mailSend')->name('admin.subscriber.send.mail');
        Route::post('multiple/delete', 'SubscriberController@multipleDelete')->name('contract.multiple.delete');
        Route::get('reply/{mailId}', 'SubscriberController@replyMail')->name('admin.contract.reply.mail');
        Route::post('reply/or/draft/{mailId}', 'SubscriberController@mailReplyOrDraft')->name('admin.mail.reply.or.draft');
        Route::get('all/draft', 'SubscriberController@allDraftMails')->name('admin.mail.all.draft');
        Route::post('delete/draft', 'SubscriberController@deleteDraft')->name('admin.delete.draft.mail');
        Route::get('trash', 'SubscriberController@trashMails')->name('admin.trash.mail');
        Route::post('force/delete/or/restore', 'SubscriberController@forceDeleteOrRestore')->name('admin.mail.delete.or.restore');
        Route::get('send/draft/mail/{draftId}', 'SubscriberController@sendDraftMailSection')->name('admin.send.draft.mail');
        Route::post('reply/or/draft/from/draft/mail{draftId}', 'SubscriberController@replyOrDraft')->name('admin.mail.reply.or.draft.from.draft');
    });
    //Harrison start ended


    Route::group(['prefix' => 'admin/courier', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

        Route::get('selected/show', 'CourierController@index')->name('courier.index');
        Route::get('sync', 'CourierController@couriersyncview')->name('courier.sync.view');
        Route::post('sync/insert', 'CourierController@couriersyncinsert')->name('courier.sync.insert');
        Route::get('sync/edit/{subDistrictId}', 'CourierController@couriersyncedit')->name('courier.sync.edit');
        Route::post('sync/sync/update/{subDistrictId}', 'CourierController@couriersyncupdate')->name('courier.sync.update');
        Route::get('sync/sync/delete/{subDistrictId}', 'CourierController@couriersyncdelete')->name('courier.sync.delete');
        Route::post('store', 'CourierController@courierstore')->name('courier.store');
        Route::get('allcurier', 'CourierController@allcurier')->name('courier.all');

        Route::get('/edit/{id}', 'CourierController@curieredit');
        Route::post('/update', 'CourierController@curierupdate');
        Route::get('/curierdelete/{id}', 'CourierController@curierdelete');

        // Ajax Route
        Route::get('get/district/by/division/id/{divisionId}', 'CourierController@getDistrictByAjax');
        Route::get('get/sub_district/by/district/id/{districtId}', 'CourierController@getSubDistrictByAjax');
        Route::get('get/couriers/by/courier_id', 'CourierController@getCouriersByAjax');
        Route::get('get/courier/for/update', 'CourierController@getCouriersForUpdateByAjax');
        // Ajax Route Ended
    });
    //Harrison start ended


    Route::group(['prefix' => 'admin/courier', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
        Route::get('selected/show', 'CourierController@index')->name('courier.index');
        Route::get('sync', 'CourierController@couriersyncview')->name('courier.sync.view');
        Route::post('sync/insert', 'CourierController@couriersyncinsert')->name('courier.sync.insert');
        Route::get('sync/edit/{subDistrictId}', 'CourierController@couriersyncedit')->name('courier.sync.edit');
        Route::post('sync/sync/update/{subDistrictId}', 'CourierController@couriersyncupdate')->name('courier.sync.update');
        Route::get('sync/sync/delete/{subDistrictId}', 'CourierController@couriersyncdelete')->name('courier.sync.delete');
        Route::post('store', 'CourierController@courierstore')->name('courier.store');
        Route::get('allcurier', 'CourierController@allcurier')->name('courier.all');

        Route::get('/edit/{id}', 'CourierController@curieredit');
        Route::post('/update', 'CourierController@curierupdate');
        Route::get('/curierdelete/{id}', 'CourierController@curierdelete');

        // Ajax Route
        Route::get('get/district/by/division/id/{divisionId}', 'CourierController@getDistrictByAjax');
        Route::get('get/sub_district/by/district/id/{districtId}', 'CourierController@getSubDistrictByAjax');
        Route::get('get/couriers/by/courier_id', 'CourierController@getCouriersByAjax');
        Route::get('get/courier/for/update', 'CourierController@getCouriersForUpdateByAjax');
        // Ajax Route Ended

    });


    // Search Route Created By asif

Route::get('mobile/product/search', 'Frontend\SearchController@searchmobile')->name('asif.mainproduct.search');
Route::get('search/new/by/all/', 'Frontend\SearchController@newsearch')->name('asif.product.ajaxsearchmain');
Route::get('search/new/by/allfilter/', 'Frontend\SearchController@subsearch')->name('foysal.product.ajaxsearchmain');
Route::get('search/all', 'Frontend\SearchController@searchall');
Route::get('search/mobile/product/ajax/{productName}', 'Frontend\SearchController@mobilesearchajax');
Route::get('product/page/search/mobile/product/ajax/{productName}', 'Frontend\SearchController@mobilesearchajax');
Route::get('search/mobile/product/ajax/theme9/{productName}', 'Frontend\SearchController@moajxthemnine');
Route::get('search/product/by/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductByAjax');
Route::get('product/page/search/product/by/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductByAjax');



    Route::get('search/product/by/sub/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductBySubCatByAjax');
    Route::get('search/product/by/re_sub/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductByResubCatByAjax');

    // Search Route Created


    // Payment Route Created

    Route::group(['prefix' => 'payment', 'namespace' => 'Frontend'], function () {

        Route::get('stripe/{payment_secure_id}', 'PaymentController@index')->name('stripe.index');

        Route::post('stripe/submit/', 'PaymentController@stripeSubmit')->name('payment.stripe.submit');
        Route::get('stripe/success/payment', 'PaymentController@successStripePaymentView')->name('payment.stripe.success.view');
        Route::get('paypal/success/payment', 'PaymentController@paypalsuccess')->name('payment.paypal.success');

        Route::post('ssl_commercez/success', 'PaymentController@sslSuccess');

        Route::post('ssl_commercez/fail', 'PaymentController@sslFail');
        Route::post('ssl_commercez/cancel', 'PaymentController@sslCancel');

        Route::get('order_payment/{paymentSecureId}', 'PaymentController@paymentPage')->name('order.payment');
        Route::post('make_payment/', 'PaymentController@makePayment')->name('payment.make.payment');

        //SSL COMMERCEZ
        Route::post('ssl_commercez/success', 'PaymentController@sslSuccess');
        Route::post('ssl_commercez/fail', 'PaymentController@sslFail');
        Route::post('ssl_commercez/cancel', 'PaymentController@sslCancel');
    });


    Route::get('/user/shipping/value/{id}', 'Frontend\CheckoutController@shippingChargeValue');
    Route::get('/user/shipping/value/to/insert/{id}', 'Frontend\CheckoutController@shippingChargeValueSend');



    Route::namespace('Admin')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/show/return/product/list','ProductController@returrnProduct')->name('admin.customar.return.product');
            Route::get('/delete/return/product/{orderid}','ProductController@deletedProduct')->name('admin.customar.deleted.product');
            Route::get('/show/return/product/{orderid}/{id}','ProductController@showProduct')->name('admin.customar.show.product');
            Route::get('/reject/return/product/{orderid}/{id}','ProductController@rejectReturnProduct')->name('admin.customar.reject.product');
            Route::get('/approve/return/product/{orderid}/{id}/{userid}','ProductController@approveReturnProduct')->name('admin.customar.approve.product');
            Route::get('/approve/return/product/list','ProductController@adminApproveReturnProduct')->name('admin.approved.return.product');
            Route::get('/approve/return/product/delete/{id}','ProductController@adminApproveReturnProductDelete')->name('admin.approved.return.product.delete');
        });
    });



    // customar login information start here

    Route::namespace('Frontend')->group(function () {

        Route::prefix('customar')->group(function(){
            Route::get('/login','AdminController@showLoginForm')->name('customar.login.form');
            Route::post('/login','AdminController@login')->name('customar.login');
            Route::post('/register','AdminController@register')->name('customar.register');
            Route::post('/register/mobile','AdminController@mobileregister')->name('customar.register.mobile');
            Route::post('/logout','AdminController@logout')->name('customar.logout');
            Route::get('/verification/{token}','AdminController@verificationPage')->name('customar.verification.page');
            Route::post('/verification','AdminController@accountVerification')->name('customar.verification');
            Route::get('/verify/email/{token}','AdminController@emailAccountVerification')->name('customar.email.verification');
            Route::get('/forgot/password','AdminController@emailForgotPasswordPage')->name('customar.email.forget.password');
            Route::post('/forgot/password','AdminController@forgotPassword')->name('customar.email.forgot.passwrod');
            Route::get('/forgot/password/reset/{token}','AdminController@passwordResetPageShow')->name('customar.password.reset.page');
            Route::post('/forgot/password/reset','AdminController@passwordReset')->name('customar.reset.password');
            Route::post('/forgot/password/verify','AdminController@forgotPhoneVerify')->name('customar.forgot.mobile.verify');
            Route::get('/password/reset','AdminController@cuspasswordreset')->name('customar.passwordreset');
            Route::post('/password/reset','AdminController@cuspassresetsubmit')->name('customar.changepass.submit');


            Route::middleware('auth:web')->group(function(){
                Route::get('/account','FrontendController@showAccountInfoPage')->name('customar.account.page');
                Route::get('/address','FrontendController@userAddress')->name('customar.address.page');
                Route::get('/wishlist','FrontendController@userwishlist')->name('customar.wishlist');
                Route::get('/customer/orderlist','FrontendController@orderlist')->name('customar.orderlist');
                Route::post('/create/address','FrontendController@createAddress')->name('customar.address.create');
                Route::get('/wallet','FrontendController@wallet')->name('customar.wallet');
            });
        });

        Route::prefix('product')->group(function(){
             Route::get('/cart/page', 'AddToCartController@productViewCart')->name('product.cart.data');
            Route::get('/get/cart/data', 'AddToCartController@getCartData')->name('get.cart.data');
            Route::get('/get/totalprice/data', 'AddToCartController@gettotalpriceData')->name('get.total_price.data');
            Route::post('cart/data/delete', 'AddToCartController@cartDataDelete')->name('cart.data.delete');
            Route::post('cart/header/delete', 'AddToCartController@carDeleteheader')->name('cart.header.delete');
            Route::post('/cart/update', 'AddToCartController@viewCartUpdate')->name('product.cart.update');
            Route::get(md5('/checkout/page/'), 'CheckoutController@checkoutPage')->name('product.checkout');
            Route::get('/checkout/page/two', 'CheckoutController@checkoutPagetwo')->name('product.checkouttwo');
            Route::post(md5('/customar/create'), 'CheckoutController@customarDataCreate')->name('checkout.data.create');
            Route::post('/customar/online/payment', 'CheckoutController@onlinepayment')->name('checkout.data.online');
            Route::post('/return', 'CheckoutController@productReturn')->name('customar.product.return');
            Route::get('/return/{userid}', 'CheckoutController@customarProductReturnShow')->name('customar.product.return.show');
            Route::get('/pricetotal/checkout/page', 'CheckoutController@gettotalprice')->name('get.cart.totalprice');
            Route::get('/payment/cashonsuccess/page/{order_id}', 'CheckoutController@cashonsuccess')->name('cashon.success');

            Route::get('get/prescrive/data', 'CheckoutController@prescrivedata')->name('get.prescrive.data');
        });





        Route::prefix('subscriber')->group(function(){

            Route::post('/create', 'SubscribeController@insert')->name('frontend.subscriber.insert');
        });

        Route::prefix('/coupon')->group(function(){

            Route::post('/used', 'CheckoutController@usedCupon')->name('customer.used.cupon');

            Route::post('/apply', 'CheckoutController@applyCupon')->name('customer.apply.cupon');
            Route::get('/value/{oderid}', 'CheckoutController@applyCuponValue');
            Route::get('/get/total', 'CheckoutController@getCartTotalAmount')->name('cart.total.amount');
        });

        Route::prefix('payment')->middleware('auth:web')->group(function(){
            Route::get('/{order_id}/{secure_id}','CheckoutController@onlinePaymentPage')->name('order.payment');
            Route::get('/offline/order','CheckoutController@offlinePaymentPage')->name('offline.order.payment');


            Route::get('customar/invoice/{userid}','CheckoutController@customarInvoiceShow')->name('customar.invoice.show');

            Route::get('/invoice/show/{order_id}','CheckoutController@invoiceShow')->name('customar.invoice.show.details');
            Route::get('/invoice/pay/now/{order_id}','CheckoutController@invoicePayNow')->name('invoice.pay.now');
            Route::get('/invoice/cancel/{order_id}','CheckoutController@invoiceCancel')->name('customar.invoice.cancal');


        });



        Route::prefix('product')->group(function(){
            Route::get('/{slug}/{id}', 'FrontendController@productDetails')->name('webiste.product.details');
            Route::get('/viewed', 'FrontendController@viewedProductPage')->name('customar.viewed.product');

        });

    });

    // mobile controller area show

    Route::namespace('Mobile')->group(function () {
        Route::prefix('mobile')->group(function(){
            Route::get('/cart/data','MobileController@getCartData')->name('get.mobile.cart.data');
            Route::get('/menu/cart/data','MobileController@mobileGetCartData')->name('get.menu.mobile.cart.data');
            Route::post('/cart/data/delete','MobileController@addToCartDelete')->name('mobile.cart.data.delete');
        });
    });


    Route::get('/get/coupon/value/{oderid}', 'Frontend\CheckoutController@applyCuponValue');

    Route::get('customar/wallet/recharge', 'Frontend\WalletController@recharge')->name('wallet.recharge');

    Route::post('customar/wallet/recharge/{invoice_id}', 'Frontend\WalletController@stripeSubmit')->name('wallet.recharge.insert');

    // wallet payment ssl


   Route::post('paypal/payment/done', 'Frontend\WalletController@getDone');
   Route::get('phonevarification/test', 'Frontend\FrontendController@varificationtest');


 // Route::get('checkout/test', 'FrontendCartManageController@checkoutpage');


   // cart manage
