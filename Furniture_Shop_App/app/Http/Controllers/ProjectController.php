<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\backend\Category;
use Illuminate\Support\Facades\View;

class ProjectController extends Controller {
    //

    function index() {
        $products = DB::table( 'products' )->limit( 6 )->get();
        $category = DB::table( 'categories' )
        ->join( 'products', 'categories.id', '=', 'products.category_id' )
        ->select( 'categories.category_name', 'categories.cat_image', 'products.*' )
        ->get();

        return view( 'index', [ 'products' => $products, 'category'=>$category ] );

    }

    public function single_product( Request $request, $id ) {
        $product_array = DB::table( 'products' )->where( 'id', $id )->get();
        return view( 'single_product', [ 'product_array'  => $product_array ] );
    }

    public function products() {
        $products = DB::table( 'products' )->get();
        $category = DB::table( 'categories' )
        ->join( 'products', 'categories.id', '=', 'products.category_id' )
        ->select( 'categories.category_name', 'categories.cat_image', 'products.*' )
        ->get();

        return view( 'products', [ 'products' => $products, 'category'=>$category ] );
    }

    public function category_products( $categoryId ) {
        $category = Category::with( 'products' )->findOrFail( $categoryId );
        return View::make( 'single_category', [
            'category' => $category
        ] );
    }

    public function process_search( Request $request ) {
        $keyword = $request->input( 'keyword' );
        $product = DB::table( 'products' )->where( 'product_name', 'like', '%'. $keyword.'%' )->get();
        return view( 'products', [ 'products' => $product ] );
    }

}
