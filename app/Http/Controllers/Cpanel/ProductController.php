<?php

namespace App\Http\Controllers\Cpanel;
use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use Illuminate\Http\Request;
use Alert;
use App\product;
use App\subCategory;
use App\category;
use App\currency;
use App\productImage;
use App\system;
use Validator;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{

    public function index()
    { 
        return view('cpanel.products.index');
    }

    public function datatable(){

        if(\Auth::user()->type == 1){
            $product = product::with(['subCategory','currency','user','system']);
        }else{
            $product = product::with(['subCategory','currency','user','system'])->where('record_by',\Auth::user()->id)->get();
        }
        return DataTables::of($product)
        
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='products/$model->id'><i class='flaticon-search-1'></i>عرض</a>
                                        <a class='dropdown-item' href='products/$model->id/edit'><i class='la la-edit'></i>تعديل</a>
                                        <a class='dropdown-item delete' href='' data-id=".$model->id."><i class='flaticon-delete-1'></i>حذف</a>
                                </div>
                        </span>";
            })

            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create(){
        $category = category::pluck('name_ar', 'id');
        $subCategory = subCategory::pluck('name_ar', 'id'); 
        $currency = currency::pluck('name', 'id');
        $system = system::pluck('name','id');
        return view('cpanel.products.create', compact(['category','subCategory','currency','system']));
    }

    public function store(productRequest $request){
        $images = explode(' ',$request['image']);
        unset($request['image']);
        $request['record_by'] = \Auth::user()->id;
        $product =  product::create($request->all());
        foreach($images as $image){
            if($image != 'undefined'){
                productImage::create([
                    'product_id' => $product->id,
                    'image' => $image
                ]);
            } 
        }
        \Notification::send(\App\User::where('type',1)->get(), new \App\Notifications\newproduct($product));
        return redirect('cpanel/products')->with('success', 'تمت الاضافه بنجاح');
    }

    public function show($id){

       $product = product::with('images')->find($id);
        if($product == null){
            return abort(404);
        }else{
            $category = category::pluck('name_ar', 'id'); 
            $currency = currency::pluck('name', 'id'); 
            $subCategory = subCategory::pluck('name_ar', 'id'); 
            return view('cpanel.products.show', compact(['product','category','subCategory']));
        }

    }

    public function edit($id){

        $product = product::with('images')->find($id);
        if($product == null){
            return abort(404);
        }else{
            $category = category::pluck('name_ar', 'id');
            $subCategory = subCategory::where('category_id',$product['category_id'])->pluck('name_ar', 'id');
            $currency = currency::pluck('name', 'id');   
            $system = system::pluck('name','id');
            return view('cpanel.products.edit', compact(['product','category','subCategory','currency','system']));
        }
    }

    public function update(productRequest $request, $id)
    {
        product::find($id)->update($request->all());
        return redirect('cpanel/products')->with('success', 'تمت التعديل بنجاح');
    }

    public function destroy(Request $request){

        $product = product::find($request['id']);
        if ($product == null){
            return abort(404);
        }
        $product->delete();
        return redirect()->back()->with('success',' تم الحذف بنجاح ');
    }

    public function upload(Request $request){
        $filenamewithext = $request['file']->getClientOriginalName();
        $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
        $extension = $request['file']->getClientOriginalExtension();
        $FileToStore = $filename.'_'.time().'.'.$extension;
        $request['file']->move(public_path().'/images/.', $FileToStore);  
        return $FileToStore;
    }
}