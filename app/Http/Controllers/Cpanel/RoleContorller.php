<?php

namespace App\Http\Controllers\Cpanel;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PermissionRole;
use Alert;
use Validator;
use Yajra\DataTables\DataTables;

class RoleContorller extends Controller
{

    public function index(){
        return view('/cpanel/roles/index',compact('roles'));
    }

    public function datatable(){

        $role = Role::all();
        return DataTables::of($role)
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='/cpanel/roles/$model->id'><i class='flaticon-search-1'></i>الصلاحيات</a>
                                </div>
                        </span>";
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('/cpanel/roles/create',compact('permissions'));
    }

    public function store(Request $request){
        // return $request;
        $permission = $request->permission;
        unset($request->permission);
        $role = Role::create($request->all());
        foreach($permission as $_permission){
            PermissionRole::create([
                'permission_id' => $_permission,
                'role_id' => $role->id
            ]);
        }
        return redirect('/cpanel/roles');
    }

    public function show($id){
        $roles = Role::with('permission')->where('id', $id)->get();
        // $permissionRole = PermissionRole::where('role_id',$id)->get();
        $permissions = Permission::all();
        foreach($roles as $role){
            $permissionRole = $role['permission'];
        }
        return view('/cpanel/roles/show',compact('role','permissions','permissionRole'));
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }

}
