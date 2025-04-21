<?php

namespace App\Http\Controllers;

use App\Article;
use App\Product;
use TCG\Voyager\Models\Category;

class FrontendController extends Controller
{
    /**
     * Method to load collectables
     */
    public function loadCollectables($category)
    {
        $category_detail = Category::where("slug", $category)->first();
        if ($category_detail) {
            $data = Product::selectRaw("id,featured_image,thumbnail_image")->where("category_id", $category_detail->id)->get();
            return view('collectables', compact('category_detail', 'data'));
        }
        return view('errors.404');
    }

    /*
     * Method to load articles
     */
    public function loadArticles()
    {
        $articles = Article::orderBy("short_title", "asc")->get();
        $all_articles = array();
        foreach (!$articles->isEmpty() ? $articles : array() as $a) {
            $s = strtoupper(substr($a->short_title, 0, 1));
            if (!isset($all_articles[$s])) {
                $all_articles[$s] = array();
            }
            array_push($all_articles[$s], array("id" => $a->id, "title" => $a->short_title, "url" => url("articles/" . $a->slug)));
        }
        return view('articles', compact('all_articles'));
    }

    /*
     * Method to load article detail
     */
    public function loadArticleDetail($slug)
    {
        $data = Article::where("slug", $slug)->first();
        if ($data) {
            $prev_record = Article::where('id', '<', $data->id)->orderBy('id', 'desc')->first();
            $next_record = Article::where('id', '>', $data->id)->orderBy('id')->first();
            return view('articleDetail', compact('data', 'prev_record', 'next_record'));
        }
        return view('errors.404');
    }

    /*
     * Method to load for sale
     */
    public function loadShowRoom()
    {
        $category_data = Category::where("slug", "cars")->first();
        if ($category_data) {
            $products = Product::where("category_id", $category_data->id)->get();
            return view('showRoom', compact('products'));
        }
        return view('errors.404');
    }

    /*
     * Method to load for sale
     */
    public function loadForSale()
    {
        $category_data = Category::where("slug", "for-sale")->first();
        if ($category_data) {
            $products = Product::where("category_id", $category_data->id)->get();
            return view('forSale', compact('products'));
        }
        return view('errors.404');
    }

    /*
     * Method to load for sale detail page
     */
    public function loadProductDetail($id)
    {
        $id = base64_decode($id);
        $product_data = Product::where("id", $id)->first();
        if ($product_data) {
            $other_products = Product::where("category_id", $product_data->category_id)->where("id", "!=", $product_data->id)->orderBy("id", "desc")->take(3)->get();
            if ($product_data->product_images != null) {
                $product_images = array_merge(array($product_data->featured_image), json_decode($product_data->product_images));
            } else {
                $product_images = array($product_data->featured_image);
            }
            return view('productDetail', compact("product_data", "other_products", "product_images"));
        }
        return view('errors.404');
    }
    
    public function loadPressRelease()
    {
        
        return view('pressRelease');
        
    }
}
