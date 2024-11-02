<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{

    function __construct()
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

    }
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','ASC')->paginate(10);
        $permissions = Permission::get();
        return view('admin.pages.roles.index',compact('roles','permissions'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.pages.roles.create',compact('permissions'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(),
        [
            'role_name' => 'required|string|max:255',
            'permissions' => 'required|array', // Ensure permissions are passed as an array
            'permissions.*' => 'exists:permissions,id' // Validate each permission exists
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(array('message'=>$validator->errors()->first(),'type'=>'error'));
        }

        $role = Role::create(['name' => strtolower($request->role_name)]);

        // Attach permissions to the role
        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.index')->with([
            'message' => 'Role created successfully!',
            'type' => 'success'
        ]);
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.role.role-show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.pages.roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {

        $role = Role::find($id);
        $role->name = $request->input('role_name');
        $role->save();

        $permissionsID = array_map(
            function($value) { return (int)$value; },
            $request->input('permission',[])
        );

        $role->syncPermissions($permissionsID);
        return redirect()->route('roles.index')
                ->with(['message'=>'Role Update successfully','type'=>'success']);
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
            ->with(['message'=>'Role deleted successfully','type'=>'success']);
    }

    public function roleChangeStatus(Request $request)
    {
        $statusChange = Role::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Role status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Role status has not changed please try again','type'=>'error');
        }
    }
}
