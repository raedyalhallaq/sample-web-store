<?php

namespace App\Http\Controllers\Cpanel;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use Illuminate\Http\Request;
use Alert;
use App\properties;
use App\category;
use App\categoryImage;
use App\categoryproperties;
use Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index()
    {
        return view('cpanel.category.index');
    }

    public function datatable(){

        $category = category::all();
        return DataTables::of($category)
        
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='category/$model->id'><i class='flaticon-search-1'></i>عرض</a>
                                        <a class='dropdown-item' href='category/$model->id/edit'><i class='la la-edit'></i>تعديل</a>
                                        <a class='dropdown-item delete' href='' data-id=".$model->id."><i class='flaticon-delete-1'></i>حذف</a>
                                </div>
                        </span>";
            })

            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        $properties = properties::all();
        return view('cpanel.category.create',compact('properties'));
    }

    public function store(categoryRequest $request){
        $images = explode(' ',$request['image']);
        $image = implode(" ",$images);
        $properties = $request['property_id'];
        unset($request['image']);
        unset($request['property_id']);
        $category = category::create($request->all());
        $ext_image = explode('.', $image);
        if ($ext_image[1] == 'png' || $ext_image[1] == 'jpg' || $ext_image[1] == 'jpeg'){
            categoryImage::create([
                'category_id' => $category->id,
                'image' => $image
            ]);
        }else{
            return '';
        }
            
        foreach($properties as $property){
            categoryproperties::create([
                'category_id' => $category->id,
                'property_id' => $property
            ]);
        }
        return redirect('cpanel/category')->with('success', 'تمت الاضافه بنجاح');
    }

    public function show($id){

       $category = category::with('images')->find($id);
        if($category == null){
            return abort(404);
        }else{
            return view('cpanel.category.show', compact('category'));
        }

    }

    public function edit($id){

        $category = category::with('images')->find($id);
        if($category == null){
            return abort(404);
        }else{
            return view('cpanel.category.edit', compact('category'));
        }
    }

    public function update(categoryRequest $request, $id)
    {
        category::find($id)->update($request->all());
        return redirect('cpanel/category')->with('success', 'تمت التعديل بنجاح');
    }

    public function destroy(Request $request){

        $category = category::find($request['id']);
        if ($category == null){
            return abort(404);
        }
        $category->delete();
        return redirect()->back()->with('success',' تم الحذف بنجاح ');
    }

    public function upload(Request $request){
        $filenamewithext = $request['file']->getClientOriginalName();
        $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
        $extension = $request['file']->getClientOriginalExtension();
        $FileToStore = $filename.'_'.time().'.'.$extension;
        $request['file']->move(public_path().'/images/.', $FileToStore);  
        return $FileToStore;
        // return response();
    }
}