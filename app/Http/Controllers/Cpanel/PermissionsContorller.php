<?php

namespace App\Http\Controllers\Cpanel;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Validator;
use Yajra\DataTables\DataTables;

class PermissionsContorller extends Controller
{
    
    public function index(){
        return view('/cpanel/permissions/index');
    }

    public function datatable(){

        $permission = Permission::all();
        return DataTables::of($permission)
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='/cpanel/permissions/$model->id'><i class='flaticon-search-1'></i>الصلاحيات</a>
                                </div>
                        </span>";
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        return view('/cpanel/permissions/create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required|unique:permissions',
        ]);
        if($validator->passes()){
            Permission::create($request->all());
            return redirect('/cpanel/permissions'); 
        }    
            return redirect('/cpanel/permissions/create')->withErrors($validator->errors()->all())->withInput();
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
