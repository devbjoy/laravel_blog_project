<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::find(Auth::user()->id);
        // return $users;
        $data['user'] = $users;
        return view('admin.users.all_user',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'photo' => 'required|mimes:jpg,jpeg,png',
        // ]);

        // if($validate){
        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password,
        //     ]);

        //     $file = $request->file('photo');
        //     $newName = time().'-'.$file->getClientOriginalName();
        //     $image_path = $request->file('photo')->storeAs('user-images',$newName,'public');

        //     $user->getUserImage()->create([
        //         'url' => $image_path,
        //     ]);

        //     return redirect()->route('user.index')->with('success','User Added Successfully');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);
         
        $user = User::find($id);
        if(empty($user)){
            return redirect()->back();
        }
        
        if(empty($request->password) && empty($request->user_image)){

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->back()->with('success','Your Profile has been Updated successfull');

        }elseif(empty($request->password)){

            if(!empty($user->user_image)){
                $path = public_path('storage/').$user->user_image;
                if(file_exists($path)){
                    @unlink($path);
                }
            }
            
            $file = $request->file('user_image');
            $newName = time().'-'.$file->getClientOriginalName();
            $image_path = $request->file('user_image')->storeAs('user-images',$newName,'public');

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_image' => $image_path,
            ]);

            return redirect()->back()->with('success','Your Profile has been Updated successfull');

        }elseif(empty($request->user_image)){

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return redirect()->back()->with('success','Your Profile has been Updated successfull');

        }else{

            // delete old image path
            if(!empty($user->user_image)){
                $path = public_path('storage/').$user->user_image;
                if(file_exists($path)){
                    @unlink($path);
                }
            }


            $file = $request->file('user_image');
            $newName = time().'-'.$file->getClientOriginalName();
            $image_path = $request->file('user_image')->storeAs('user-images',$newName,'public');

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_image' => $image_path,
                'password' => $request->password,
            ]);

            return redirect()->back()->with('success','Your Profile has been Updated successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $user = User::with('getUserImage')->find($id);

    //     if(empty($user)){
    //         return redirect()->route('user.index')->with('error','User Not Found');
    //     }
    //     if(!empty($user->getUserImage->url)){
    //         $path = public_path('storage/').$user->getUserImage->url;
    //         if(file_exists($path)){
    //             @unlink($path);
    //         }
    //     }

    //     $user->delete();
    //     $user->getUserImage()->delete();


    //     return redirect()->route('user.index')->with('error','User has been deleted Successfully');
    // }
}
