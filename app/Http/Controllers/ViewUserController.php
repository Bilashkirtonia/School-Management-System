<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ViewUserController extends Controller
{
    public function index(){

        $data['users'] = User::where('usertype','admin')->get();

        return view('admin.view.index',$data); 
    }

    public function add(){
        return view('admin.view.add'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'user_name'=>"required",
            'email'=>"required|unique:users,email"
         ]);

        $code = rand(0000 ,9999);
        $data = new User();
        $data->usertype = 'admin';
        $data->name = $request->user_name;
        $data->role = $request->role;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        
        $data->save();
        return redirect()->route('user.view')->with('success',"Data insert successfully!");
        
    }

    public function edit($id){
        $data['users'] = User::find($id);
        return view('admin.view.edit',$data); 
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'user_name'=>"required",
            'email'=>"required"
         ]);


        $data = User::find($id);
        $data->name = $request->user_name;
        $data->role = $request->role;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('user.view')->with('success',"Data update successfully!");
        
    }

    public function delete($id){
        $data = User::find($id);
        if(file_exists('upload/user_image/',$data->image) AND !empty($data->image)){
            unlink('upload/user_image/'.$data->image);
        }
        $data->delete();

        return redirect()->route('user.view')->with('success',"Delete successfully!");
    }
}
