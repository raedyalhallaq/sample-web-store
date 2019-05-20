<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table = 'roles';
    public $fillable = [
        "name",
        "display_name",
        "description"
    ];

    // public static function create(array $data){
    //     $instance = new self;
    //     $data['name']              = $data['name'];
    //     $data['display_name']    =  $data['display_name'];
    //     $data['description']    =  $data['description'];
    //     $instance->fill($data);
    //     $instance->save();
    //     if ($data['permission'] != null){

    //         foreach ($data['permission'] as $k => $permission)
    //         {
    //             $permission_role = new PermissionRole();
    //             $permission_role->permission_id = $permission;
    //             $permission_role->role_id    = $instance->id;;
    //             $permission_role->save();
    //         }



    //     }

    //     return $instance;
    // }

    public static function update_role(  array $data ,$id ){
       $role =  Role::find($id);
        $role->name  = $data['name'];
        $role->display_name  = $data['display_name'];
        $role->description  = $data['description'];
        $role->save();

        $collection = PermissionRole::where('role_id',$id)->get();
        foreach ($collection as $item){
            $item->delete();
        }
        if ($data['permission'] != null){

            foreach ($data['permission'] as $k => $permission)
            {

                $permission_role = new PermissionRole();
                $permission_role->permission_id = $permission;
                $permission_role->role_id    = $role->id;
                $permission_role->save();
            }
        }

        return $role;
    }

    public function permission(){
        return $this->belongsToMany(Permission::class)->select(['role_id', 'permission_id']);
    }
}