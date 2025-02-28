<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\role_has_permissions;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionImport;


class RoleController extends Controller
{
    

     ///////////////////// All Roles ////////////////////



   public function AllRoles(){

    $roles = Role::all();
    return view('admin.pages.roles.index',compact('roles'));

} // End Method 




public function create()

{

    $permissions = Permission::all();

    return view('admin.pages.roles.create',compact('permissions'));

}



public function StoreRoles(Request $request){

     Role::create([
        'name' => $request->name, 

    ]);


    return back()->with('success','Roles Inserted Successfully'); 


}// End Method 


public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions;
    
        return view('admin.pages.roles.show',compact('role','rolePermissions'));
    }


public function EditRoles($id){
    $role = Role::find($id);

    $rolePermissions = $role->permissions->pluck('name')->toArray();
    
    $permissions = Permission::get();
    
    return view('admin.pages.roles.edit',compact('role','permissions','rolePermissions'));


}// End Method 


public function UpdateRoles(Request $request,$id){




    $role = Role::find($id);
 
    $role->name = $request->input('name');

    $role->save();

    $role->syncPermissions($request->input('permission'));

    
 $notification = array(
    'message' => 'Role Updated Successfully',
    'alert-type' => 'info'
);

    
return redirect()->route('user.roles.list')->with($notification); 

}// End Method 


public function DeleteRoles($id){

 Role::findOrFail($id)->delete();

 $notification = array(
    'message' => 'Role Info Deleted Successfully',
    'alert-type' => 'error'
);

    return redirect()->back()->with($notification); 
}// End Method 








public function AllPermission(){

    $permits = Permission::latest()->get();
    return view('admin.pages.permissions.index',compact('permits'));

} // End Method 



public function StorePermission(Request $request){


    Permission::create($request->only('name'));
  

    return back()->with('success','Permission Inserted Successfully'); 

}// End Method 


public function EditPermission($id){

   $permit = Permission::findOrFail($id);
   ////return view('admin.pages.permissions.edit',compact('permission'));

   return response()->json(array(
    'permit' => $permit,
));


}// End Method 



public function UpdatePermission(Request $request){
    $per_id = $request->input('id');

    $data = Permission::find($per_id);
     
    $validatedData = $request->validate([
           'name' => 'required|unique:permissions,name,'.$data->id
           
       ]);

       
       $data->name = $request->name;
       $data->save();



    return back()->with('info','Permission Updated Successfully'); 


}// End Method 


public function DeletePermission($id){

     Permission::findOrFail($id)->delete();

    return back()->with('info','Permission Deleted Successfully'); 
}// End Method 



public function ImportPermission(){
    return view('admin.pages.permissions.import_permission');
 }
   //End Method


 //End Method

public function Import(Request $request){

    Excel::import(new PermissionImport, $request->file('import_file'));

    $notification = array(
        'message' => 'Permission Imported Successfully',
        'alert-type' => 'success'
    ); 
    return redirect()->back()->with($notification);
}
//End Method





}
