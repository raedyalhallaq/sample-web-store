<?php

namespace App\Http\Controllers\Cpanel;
use App\Properties;
use App\categoryproperties;
use App\elementsProperties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Validator;
use Yajra\DataTables\DataTables;

class PropertiesController extends Controller
{
    
    public function index(){
        return view('/cpanel/properties/index');
    }

    public function datatable(){

        $properties = Properties::all();
        return DataTables::of($properties)
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='/cpanel/properties/$model->id'><i class='flaticon-search-1'></i>الصلاحيات</a>
                                </div>
                        </span>";
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        return view('/cpanel/properties/create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required|unique:properties',
        ]);
        if($validator->passes()){
            properties::create($request->all());
            return redirect('/cpanel/properties'); 
        }    
            return redirect('/cpanel/properties/create')->withErrors($validator->errors()->all())->withInput();
    }

    public function getproperties($id){
        $cat_props = categoryproperties::with('property')->where('category_id',$id)->get();
        if($cat_props->count()){
            foreach($cat_props as $cat_prop){
                $elementProp[] = elementsProperties::where('property_id', $cat_prop['property_id'])->get();
            }
            return $elementProp;
        }
    }

    public function show($id){
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
