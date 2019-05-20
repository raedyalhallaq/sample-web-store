<?php

namespace App\Http\Controllers\Cpanel;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\RoleUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Alert;
use Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index(){
        return view('cpanel.user.index');
    }

    public function datatable(){

        $user = User::get(['id','fname','lname','phone','email']);
        return DataTables::of($user)
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='/cpanel/users/$model->id/roles'><i class='flaticon-search-1'></i>الصلاحيات</a>
                                </div>
                        </span>";
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        $roles = Role::all();
        return view('cpanel.user.create',compact('roles'));
    }

    public function store(Request $request){

        $validator = \Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'password' => 'required',
            'role_id' => 'required',
        ]);
        if ($validator->passes()) {
            if($request['password'] === $request['confirm_password']){
                $user = User::create([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                    'type' => 2,
                ]);
                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => $request->role_id
                ]);

                return redirect('/cpanel/users/')->with('success', 'تمت الاضافه بنجاح');;
            }
        }    
            return redirect('/cpanel/users/create')->withErrors($validator->errors()->all())->withInput();
        
    }

    public function destroy(Request $request){
        $user = User::find($request['id']);
        if ($user == null){
            return abort(404);
        }
        $user->delete();
        return redirect()->back()->with('success',' تم الحذف بنجاح ');
    }

    public function profile(){
        return view('cpanel.user.profile.index');
    }

    public function edit_profile(){
        return view('cpanel.user.profile.edit');
    }

    public function update_profile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|unique:users,phone,' . Auth::user()->id,
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        if ($validator->passes()) {

            $UserData = User::find(Auth::user()->id);
            if($UserData != null){
                if($request['password'] === $request['password_confirmation'])
                $UserData->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password)
                ]);
            }          
            return redirect('cpanel/admin/profile');
        }
        return redirect('/cpanel/admin/profile/edit')->withErrors($validator->errors()->all())->withInput();
    }

    public function users_role($id){
        $roles = Role::all();
        $user_role = RoleUser::find($id);
        if ($roles == null){
            return abort(404);
        }
        return view('cpanel.user.roles',compact('roles','user_role','id'));
    }

    public function update_role(Request $request,$id){
        $user_role = RoleUser::find($id);
        if ($user_role == null){
            return abort(404);
        }
        $user_role->update([
            'role_id' => $request->role_id,
        ]);
        return redirect('/cpanel/users')->with('success',' تم التعديل بنجاح ');
    }

}