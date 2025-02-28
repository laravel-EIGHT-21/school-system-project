<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserProfileController extends Controller
{
    


        
    
    public function destroy(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();
 
        $request->session()->invalidate(); 
     
        $request->session()->regenerateToken();

        return redirect('login');

    }





    public function profileAdmin()
    {
        $id = Auth::user()->id;
		$profileData = User::find($id);
        return view('admin.profile.profile_show',compact('profileData'));
   
    }




    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
		$updateData = User::find($id);
        $updateData->name = $request->name;
        $updateData->email = $request->email;
        $updateData->phone = $request->phone;

        $validatedData = $request->validate([

            'profile_photo_path' => 'required|mimes:jpg,png|max:4096',
    
           ]);


           if ($request->file('profile_photo_path')) {

            $manager = new ImageManager(new Driver());
            @unlink(public_path('upload/admin_images/'.$updateData->profile_photo_path));
            $image = $request->file('profile_photo_path');
            $name_gen = $image->hashName();
            $new_img = $manager->read($request->file('profile_photo_path'));
            $new_img = $new_img->resize(102,102);
            $new_img->toJpeg(80)->save(base_path('public/upload/admin_images/'.$name_gen));
            $save_url = $name_gen;
            $updateData['profile_photo_path'] = $save_url;
          }    
          
        $updateData->save();

        return back()->with('success','Profile Information Updated Successfully!');

    }


    
    public function Adminpassword()
    {
        $id = Auth::user()->id;
		$profileData = User::find($id);
        return view('admin.profile.password_change',compact('profileData'));
   
    }


   
    public function passUpdate(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'new_password' => 'required|confirmed', 
        
        ]);

        $hashedPassword = Auth::user()->password;
                // Match The Old Password
                if (!Hash::check($request->oldpassword, $hashedPassword)) {
                    return back()->with("error", "Invalid Old Password!!");
                }
        
                // Update The new password 
                User::whereId(Auth::user()->id)->update([
                     'password' => Hash::make($request->new_password)
        
                ]);

                return back()->with("success", "Password Updated Successfully!");



    }

    



}
