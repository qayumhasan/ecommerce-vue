<?php

namespace App\Providers;

use App\Category;
use App\Contract;
use App\ThemeSelector;
use App\Logo;
use App\wishlist;
use App\FooterOption;
use App\Social;
use App\Page;
use App\ThemeColor;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        Schema::defaultStringLength(191);

        $unseen_mail = Contract::where('is_seen', 0)->where('is_deleted', 0)->count();
         view()->share('unseen_mail', $unseen_mail);
        $color = ThemeColor::where('is_deleted', 0)->where('status', 1)->first();
        view()->share('color', $color);
        $allpage = Page::where('is_deleted',0)->where('page_status',1)->OrderBy('id','DESC')->get();
        view()->share('allpage', $allpage);

        $search_categories = Category::with('sub_categories')->where('cate_status', 1)->get();
        view()->share('search_categories', $search_categories);

        $seo= DB::table('seo')->first();
        $logos= Logo::where('id',1)->select(['front_logo', 'favicon'])->first();
        view()->share('seo', $seo);
        view()->share('logos', $logos);


         $themecheck = ThemeSelector::where('status', 1)->first();
         view()->share('themecheck', $themecheck);

         $allcategory=Category::where('is_deleted',0)->where('cate_status',1)->get();
         view()->share('allcategory', $allcategory);

          $allcategoryhome=Category::where('is_deleted',0)->where('cate_status',1)->limit(8)->get();
         view()->share('allcategoryhome', $allcategoryhome);

         $footer=FooterOption::first();
          view()->share('footer', $footer);

          $social=Social::first();
          view()->share('social', $social);

          $continfor = DB::table('sitesetting')->first();
          view()->share('continfor', $continfor);

    }
}
