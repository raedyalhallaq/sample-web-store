<?php

namespace App\Http\Controllers\Cpanel;
use App\Http\Controllers\Controller;
use App\Http\Requests\subCategoryRequest;
use Illuminate\Http\Request;
use Alert;
use App\subCategory;
use App\category;
use App\subCategoryImage;
use Validator;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{

    public function index()
    {
        return view('cpanel.subCategory.index');
    }

    public function datatable(){

        $subCategory = subCategory::with('category');
        return DataTables::of($subCategory)
        
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='subCategory/$model->id'><i class='flaticon-search-1'></i>عرض</a>
                                        <a class='dropdown-item' href='subCategory/$model->id/edit'><i class='la la-edit'></i>تعديل</a>
                                        <a class='dropdown-item delete' href='' data-id=".$model->id."><i class='flaticon-delete-1'></i>حذف</a>
                                </div>
                        </span>";
            })

            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        $category = category::pluck('name_ar', 'id'); 
        return view('cpanel.subCategory.create', compact('category'));
    }

    public function store(subCategoryRequest $request)
    {
        $images = explode(' ',$request['image']);
        unset($request['image']);
        $subCategory =  subCategory::create($request->all());
        foreach($images as $image){
            if($image != 'undefined'){
                subCategoryImage::create([
                    'sub_category_id' => $subCategory->id,
                    'image' => $image
                ]);
            }
        }
        return redirect('cpanel/subCategory')->with('success', 'تمت الاضافه بنجاح');
    }

    public function show($id){

       $subCategory = subCategory::with('images')->find($id);
        if($subCategory == null){
            return abort(404);
        }else{
            $category = category::pluck('name_ar', 'id'); 
            return view('cpanel.subCategory.show', compact(['subCategory','category']));
        }

    }

    public function edit($id){

        $subCategory = subCategory::with('images')->find($id);
        if($subCategory == null){
            return abort(404);
        }else{
            $category = category::pluck('name_ar', 'id'); 
            return view('cpanel.subCategory.edit', compact(['subCategory','category']));
        }
    }

    public function update(subCategoryRequest $request, $id)
    {
        subCategory::find($id)->update($request->all());
        return redirect('cpanel/subCategory')->with('success', 'تمت التعديل بنجاح');
    }

    public function destroy(Request $request){

        $subCategory = subCategory::find($request['id']);
        if ($subCategory == null){
            return abort(404);
        }
        $subCategory->delete();
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

    public function getsubCategory($id){
        return subCategory::where('category_id',$id)->get();
        return 'hi';
    }
}