<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Wishlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->paginate(9);
        return view('frontend.user.view_wishlist', compact('wishlists'));
    }

    public function viewWish()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->paginate(9);
        return view('testfrontend.user.view_wishlist', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
            if($wishlist == null){
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $request->id;
                $wishlist->save();
            }
            return view('frontend.partials.wishlist');
        }
        return 0;
    }

    //for test frontend wishstore
    public function wishStore(Request $request)
    {
        if(Auth::check()){
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
            if($wishlist == null){
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $request->id;
                $wishlist->save();
            }
            return back();
        }
        return 0;
    }

    public function remove(Request $request)
    {
        $wishlist = Wishlist::findOrFail($request->id);
        if($wishlist!=null){
            if(Wishlist::destroy($request->id)){
                return view('frontend.partials.wishlist');
            }
        }
    }
    public function wishDelete(Request $request)
    {
        $wishlist = Wishlist::findOrFail($request->id);
        if($wishlist!=null){
            if(Wishlist::destroy($request->id)){
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
