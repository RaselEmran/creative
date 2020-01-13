<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
     if ($request->isMethod('get')) {
      return view('admin.profile.profile');
  	  }
  	  else
  	  {
  	  	 if ($request->ajax()) {
			$validator = Validator::make($request->all(),[
				'name' => ['sometimes', 'nullable','string'],
				'mobile' => ['sometimes', 'nullable','string'],
			]);
			$id =Auth::user()->id;
        	$model =User::findOrFail($id);
			$model->name =$request->name;
			$model->designation =$request->designation;
			$model->mobile =$request->mobile;
			$model->about =$request->about;

		 if ($request->hasFile('image')) {
		 	if ($model->image) {
				$file_path = "public/user/" . $model->image;
				Storage::delete($file_path);
			}
			$storagepath = $request->file('image')->store('public/user');
			$fileName = basename($storagepath);
			$model->image = $fileName;
		
		  } 
		  else {
			 $fileName= $model->image;
			 $model->image = $fileName;
		  }

			$model->save();

		   $log['user_id'] = auth()->user()->id;
	       $log['work'] = 'Update Profile';
	       Log::create($log);
			return response()->json(['message' => _lang('Profile Update.')]);
		}
  	  }
    }

  public function password_change(Request $request)
   {
   	if ($request->isMethod('get')) {
      return view('admin.profile.password');
  	  }
    else{
	   if ($request->ajax()) {
				$validator = $request->validate([
			     'password' => ['required', 'string', 'min:6', 'confirmed'],
				]);

				$id =Auth::user()->id;
	        	$model =User::findOrFail($id);
	        	$model->password=Hash::make($request->password);
	        	$model->save();

        	    $log['user_id'] = auth()->user()->id;
		        $log['work'] = 'Change Password';
		        Log::create($log);
	        	return response()->json(['message' => _lang('Password Change.')]);
			}
		}
    }

    public function user_logs()
    {
    	$id =Auth::user()->id;
    	$logs =Log::where('user_id',$id)->orderBy('id','DESC')->get();
    	return view('admin.profile.user_logs',compact('logs'));
    }
}
