<?php

namespace App\Http\Controllers\Cpanel;
use App\elementsProperties;
use App\Properties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Validator;
use Yajra\DataTables\DataTables;

class ElementsPropertiesController extends Controller
{
    
    public function index(){
        return view('/cpanel/elementsProperties/index');
    }

    public function datatable(){

        $elementsProperties = elementsProperties::with('properties')->get();
        return DataTables::of($elementsProperties)
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='/cpanel/elementsProperties/$model->id'><i class='flaticon-search-1'></i>الصلاحيات</a>
                                </div>
                        </span>";
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        $properties = Properties::all();
        return view('/cpanel/elementsProperties/create',compact('properties'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'property_id' => 'required',
            'value' => 'required'
        ]);
        if($validator->passes()){
            elementsProperties::create($request->all());
            return redirect('/cpanel/elementsProperties'); 
        }    
            return redirect('/cpanel/elementsProperties/create')->withErrors($validator->errors()->all())->withInput();
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
