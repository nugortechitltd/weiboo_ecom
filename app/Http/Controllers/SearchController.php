<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Maincategory;
use App\Models\Product;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Searchbtn 
    // function search_btn(Request $request) {
    //     $categories = Category::all();
    //     $colors = Color::all();
    //     $brands = Brand::all();
    //     if($request->search) {
    //         $search_product = Product::where('product_name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(9);
    //         return view('frontend.shop.shop', [
    //             'search_product' => $search_product,
    //             'categories' => $categories,
    //             'colors' => $colors,
    //         'brands' => $brands,
    //         ]);
    //     } else {
    //         return redirect()->back()->withError('Empty search');
    //     }
    // }

    // blog search
    function blog_search(Request $request) {
        $recent_blog = Blog::latest()->take(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        if($request->query) {
            $query = $request->input('query');
            $blog_info = Blog::where('title', 'LIKE', "%$query%")->latest()->paginate(7);
            return view('frontend.blog.blog', [
                'blog_info' => $blog_info,
                'recent_blog' => $recent_blog,
                'categories' => $categories,
                'tags' => $tags,
            ]);
        } else {
            return redirect()->back()->withError('Empty search');
        }
    }

    // Tag search
    function tag_search($tag) {
        // $blog_info = Blog::all();
        // $after_explode = explode(',', $blog_info->$tag);
        // // Blog::find('tag_id', explode($))
        // foreach ($after_explode as $tag_id) {
        //     $blogs = Blog::where('id', $tag_id)->get();
        // }

        // print_r($blogs);
        // // return $tag = Blog::where('tag_id', $tag_id)->get();
        // // $recent_blog = Blog::latest()->take(4)->get();
        // // $categories = Category::all();
        // // $tags = Tag::all($tag);
        // // $search_product = Product::where('tag_id', 'LIKE', '%'.$tag.'%')->latest()->paginate(9);
        // // return view('frontend.shop.shop', [
        // //     'blog_info' => $search_product,
        // //     'recent_blog' => $recent_blog,
        // //     'categories' => $categories,
        // //     'tags' => $tags,
        // // ]);
        // // return view('frontend.blog.blog')->with('tag', $tag)->with('tag', Tag::all())
    }


    function blog_category_search($blog_id) {
        
    }


    //shop
    function shop(Request $request) {
        $categories = Category::all();
        $data = $request->all();
        $sorting = 'created_at';
        $type = 'DESC';
        if(!empty($data['sort']) && $data['sort'] != '' && $data['sort'] != 'undefined') {
            if($data['sort'] == 1) {
                $sorting = 'product_name';
                $type = 'ASC';
            } else if($data['sort'] == 2) {
                $sorting = 'product_name';
                $type = 'DESC';
            } else if($data['sort'] == 3) {
                $sorting = 'after_discount';
                $type = 'ASC';
            } else if($data['sort'] == 4) {
                $sorting = 'after_discount';
                $type = 'DESC';
            }
        }
        $search_product = Product::where(function($q) use ($data) {
            $min = 0;
            if(!empty($data['min']) && $data['min'] != '' && $data['min'] != 'undefined') {
                $min = $data['min'];
            } else {
                $min = 1;
            }

            if(!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined') {
                
                $q->where(function($q) use ($data) {
                    $q->where('product_name', 'like', '%'. $data['q'].'%');
                    $q->OrWhere('long_desc', 'like', '%'. $data['q'].'%');
                });
            };

            if(!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id'] != 'undefined') {
                $q->where('category_id', $data['category_id']);
            }
            if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined') {
                $q->whereHas('rel_to_inventories', function($q) use ($data) {
                    if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined') {
                        $q->whereHas('rel_to_color', function($q) use ($data) {
                            $q->where("colors.id", $data['color_id']);
                        });
                    }
                });
            }
            if(!empty($data['brand_id']) && $data['brand_id'] != '' && $data['brand_id'] != 'undefined') {
                $q->where('brand_id', $data['brand_id']);
            } 
            if(!empty($data['min']) && $data['min'] != '' && $data['min'] != 'undefined' || !empty($data['max']) && $data['max'] != '' && $data['max'] != 'undefined') {
                $q->whereBetween('after_discount', [$min, $data['max']]);
            } 
        })->orderBy($sorting, $type)->Paginate(9);


        $colors = Color::all();
        $brands = Brand::all();
        return view('frontend.shop.shop', [
            'categories' => $categories,
            'search_product' => $search_product,
            'colors' => $colors,
            'brands' => $brands,
        ]);
    }

    // function shop_search(Request $request) {
    //     $all_products = Product::whereBetween('after_discount', [$request->left_value, $request->right_value]);
    //     return view('frontend.shop.shop', compact('all_products'))->render();
    // }
    

    // getmaincategories
    // function getmaincategories(Request $request) {
    //     $str = '<option class="category"></option>';
    //     $category_info = Product::where('maincategory_id', $request->main_id)->get();
    //     foreach($category_info as $category) {
    //         $str .= '<option value="'.$category->id.'">'.$category->rel_to_category->category_name.'</option>';
    //     }
    //     echo $str;
    // }
}
