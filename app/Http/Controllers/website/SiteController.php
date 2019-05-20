<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\categoryImage;
use App\subCategory;
use App\subCategoryImage;
use App\product;
use App\productImage;
use App\wishlist;
use App\cart;
use DB;
use App\sizePerson;
use App\systemproperty;

class SiteController extends Controller
{
    public function category(){
        $categories = category::with('images')->paginate(8);
        return view('website.category',compact('categories'));
    }

    public function subcategory($id){
        $subcategories = subCategory::with(['images'])->where('category_id',$id)->paginate(8);
        return view('website.subcategory',compact('subcategories'));
    }

    public function products($id,$sub_id){
        $products = product::with(['images','currency'])->where('sub_category_id',$sub_id)->paginate(8);
        return view('website.products',compact('products'));
    }

    public function product($id,$sub_id,$product_id){
        $product = product::with(['images','currency','category','subCategory'])->where('id',$product_id)->get();
        return view('website.singleProduct',compact('product'));
    }

    public function cart(){
        if(\auth::user()){
            $carts = cart::with(['user','product','product.category','product.images'])->where('user_id',\auth::user()->id)->get();
        }else{
            $carts = cart::with(['user','product','product.category','product.images'])->where('session_id',session()->getId())->get();
        }
        // return $carts;
        return view('website.cart',compact('carts'));
    }

    public function wishlist(){
        if(\auth::user()){
            $wishlists = wishlist::with(['user','product','product.category','product.images'])->where('user_id',\auth::user()->id)->get();
        }else{
            $wishlists = wishlist::with(['user','product','product.category','product.images'])->where('session_id',session()->getId())->get();
        }
        // return $wishlists;
        return view('website.wishlist',compact('wishlists'));
    }

    public function addwishlist(Request $request){
        if(!\auth::user()){
            $session_id = session()->getId();
            wishlist::create([
                'item_id' =>  $request->id,
                'session_id' => $session_id
            ]);
        }else{
            $session_id = session()->getId();
            wishlist::create([
                'item_id' =>  $request->id,
                'user_id' => $request->user
            ]);
        }
    }

    public function addcart(Request $request){
        if(!\auth::user()){
            $session_id = session()->getId();
            cart::create([
                'item_id' =>  $request->id,
                'session_id' => $session_id,
                'quantity' => $request->quantity,
            ]);
        }else{
            cart::create([
                'item_id' =>  $request->id,
                'user_id' => $request->user,
                'quantity' => $request->quantity,
            ]);
        }
    }

    public function shop(){
        $categories = category::get(['id','name_ar']);
        $subcategories = subCategory::get(['id','name_ar']);
        return view('website.shop',compact('categories','subcategories'));
    }

    public function shopProducts(){
        $products = product::with(['images','currency','category','subCategory'])->get();
        $output = '';
        foreach($products as $product){
      $output += "<div class='product-item col-grid-3 top-space'>
        <div class='product-item-wrapper zoom-effect-hover-container box-shadow-block'>
            <div class='product-thumb zoom-effect'>
            <a href='category/+ $product->category['id'] +/subcategory/+ data[i].sub_category_id +/products/+ data[i].id +' title='title'>;
            <img alt='product' src='images/+ data[i].images[j].image +'></a>;
		<div class='pruduct-buttons'>
                </div><!-- .product-buttons -->
                <!-- .product-ratings -->
            </div><!-- .product-thumb -->
            <div class='product-item-details'>
                <h3 class='product-title'><a href='category/+ data[i].category_id +/subcategory/+ data[i].sub_category_id +/products/+ data[i].id +' title='title'>+ data[i].name_ar  +</a></h3>
                <div class='product-price-container'>
                ;
              
                                </div>
                            </div>
                        </div>" ;
        }  
        return $output;              

    }

    public function shopProduct(Request $request){
        $query = product::with(['images','currency'])->get();
        
        if(trim($request->categoryId) !== ""){
            $query->where('category_id',trim($request->categoryId));              
        }

        if(trim($request->subId) !== ""){
            $query->where('sub_category_id',trim($request->subId));              
        }

        return $query;
    }

    public function subcategories($id){
        return $subcategories = subCategory::where('category_id',$id)->get();
    }

    public function addvalue(Request $request){
        $summation = $request['length'] + $request['bust'] + $request['shoulder'] + $request['sleeve'];
        $property = \DB::table('system_property')->selectRaw('element_id,( bust + length + shoulder + sleeve) as total')->get();
        $row = array();
        foreach($property as $prop){
            $row[$prop->element_id] = abs($summation - $prop->total) ;
        }
        asort($row);
        foreach($row as $x => $x_value){
            if($x == 1){
                $z = 'S';
            }elseif($x == 2){
                $z = 'M';
            }elseif($x == 3){
                $z  = 'L';
            }elseif($x == 4){
                $z = 'XL';
            }elseif($x == 5){
                $z = '2XL';
            }elseif($x == 6){
                $z ='3XL';
            }else{
                $z = '4XL';
            }
            $sizeprson = sizePerson::where('user_id',1);
            $sizeprson->update(['value' => $z]);
            return $z;
        }

    }

}
