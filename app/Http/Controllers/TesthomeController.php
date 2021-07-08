<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\Brand;
use App\Product;
use App\Category;
use App\FlashDeal;
use Illuminate\Http\Request;
use App\Utility\CategoryUtility;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\SearchController;

class TesthomeController extends Controller
{
    public function index()
    {
        $top_brands = Brand::limit(10)->get();
        $blogs = Blog::limit(3)->get();
        // dd($top_brands);
        return view('testfrontend.index', compact('top_brands', 'blogs'));
    }

    public function brands_all(Request $request)
    {
        $categories = Category::all();
        return view('testfrontend.all_brands', compact('categories'));
    }

    public function listingWithBrand(Request $request, $brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        if ($brand != null) {
            return view('testfrontend.all_product_listing', compact('brand'));
        }
        abort(404);
    }

    public function categories_all(Request $request)
    {
        $categories = Category::orderBy('order_level', 'desc')->get();
        return view('testfrontend.categories_all', compact('categories'));
    }
    public function listingWithCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return view('testfrontend.all_product_by_category', compact('category'));
        }
        abort(404);
    }

    public function productDetails(Request $request, $slug)
    {
        $detailedProduct  = Product::where('slug', $slug)->first();

        if ($detailedProduct != null && $detailedProduct->published) {
            //updateCartSetup();
            if (
                $request->has('product_referral_code') &&
                \App\Addon::where('unique_identifier', 'affiliate_system')->first() != null &&
                \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated
            ) {

                $affiliate_validation_time = \App\AffiliateConfig::where('type', 'validation_time')->first();
                $cookie_minute = 30 * 24;
                if ($affiliate_validation_time) {
                    $cookie_minute = $affiliate_validation_time->value * 60;
                }
                Cookie::queue('product_referral_code', $request->product_referral_code, $cookie_minute);
                Cookie::queue('referred_product_id', $detailedProduct->id, $cookie_minute);

                $referred_by_user = User::where('referral_code', $request->product_referral_code)->first();

                $affiliateController = new AffiliateController;
                $affiliateController->processAffiliateStats($referred_by_user->id, 1, 0, 0, 0);
            }
            if ($detailedProduct->digital == 1) {
                return view('frontend.digital_product_details', compact('detailedProduct'));
            } else {
                return view('testfrontend.product_details', compact('detailedProduct'));
            }
            // return view('frontend.product_details', compact('detailedProduct'));
        }
        abort(404);
    }

    public function flash_deals_all()
    {
        $today = strtotime(date('Y-m-d H:i:s'));

        $data['all_flash_deals'] = FlashDeal::where('status', 1)
            ->where('start_date', "<=", $today)
            ->where('end_date', ">", $today)
            ->orderBy('created_at', 'desc')
            ->get();

        return view("testfrontend.flash_deals.all_flash_deals", $data);
    }

    public function flashdeal_details($id)
    {
        $flash_deal = FlashDeal::where('id', decrypt($id))->first();
        if ($flash_deal != null) {

            return view('testfrontend.flashdeal_details', compact('flash_deal'));
        } else {
            abort(404);
        }
    }
}
