<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Setting;

class SettingController extends Controller
{
    // show all setting page
    public function show(){
        $data = Setting::get();
        return view('admin.settings.setting');
    }


    // store all setting data
    public function saveOrUpdate(Request $request) 
    {
        $datas = $request->except("_token");

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });
        
        foreach($datas as $key => $value){
            if ($value instanceof \Illuminate\Http\UploadedFile) {

                $image_path = Setting::where('meta_key',$key)->value('meta_value');
                
                if(!is_null($image_path) && file_exists(public_path('storage/').$image_path)){
                    @unlink(public_path('storage/').$image_path);
                }
                // dd($value);
                $file = $request->file($key);
                $newName = uniqid().'.'.$file->extension();
                $site_logo = $request->file($key)->storeAs('site_image',$newName,'public');

                $value = $site_logo;
            }
            
            Setting::updateOrCreate([
                'meta_key'  => $key
            ], [
                'meta_value' => $value
            ]);
        }

        return redirect()->back();
    }
}