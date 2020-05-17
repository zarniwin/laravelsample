<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // get data and view index page
    public function index(){
        $page_limit = env('page_limit');
        $users = User::withTrashed()->paginate($page_limit);
        return view('Admin.User.index',['users'=>$users,'page_limit'=>$page_limit]);
    }

    // get data with id and view edit page
    // withTrashed => get softdelete rows
    // whereId  => where id = $id
    // firstOrFail => get data if exist or throw error
    public function edit($id){   
        $roles = Role::all();     
        $user  = User::whereId($id)->firstOrFail();
        return view('Admin.User.edit',['user' => $user,'roles'=> $roles]);        
    }

    // update model instance
    public function update(Request $request,$id){
        // create model instance with id
        $user = User::whereId($id)->firstOrFail();

        if($request->roles){  
            $up_arr = [];
            foreach($request->roles as $role){
                if($role != 3){// if not user Role
                    $up_arr[$role] = ['model_type'=>'App\User'];// for additonal column of pivot table
                }                
            }
            
            if($user->roles()->sync($up_arr)){ // remove and assign roles of user
                //return url=/users (index page) with flash session message
                return redirect()->to('users')->with('success','User Edit Success!');
            }else{
                return redirect()->back()->with('error','User Edit Fail!');
            }            
        }      
    }

    // softdelete >> not actually remove row on database
    public function delete($id){
        // create model instance with id
        $user = User::withTrashed()->whereId($id)->firstOrFail();
        // set deleted_at =  current datetime
        if($user->delete()){
            return redirect()->back()->with('success','User Delete Success!');
        }else{
            return redirect()->back()->with('error','User Delete Fail!');
        }
    }

    // To restore a soft deleted model into an active state
    public function restore($id){
        // create model instance with id
        $user = User::withTrashed()->whereId($id)->firstOrFail();
        // set deleted_at = null
        if($user->restore()){
            return redirect()->back()->with('success','User Restore Success!');
        }else{
            return redirect()->back()->with('error','User Restore Fail!');
        }
    }

    // Permanently Deleting a single model instance
    public function forceDelete($id){
        // create model instance with id
        $user = User::withTrashed()->whereId($id)->firstOrFail();
        if($user->forceDelete()){
            return redirect()->back()->with('success','User Permanently Delete Success!');
        }else{
            return redirect()->back()->with('error','User Permanently Delete Fail!');
        }
    }
}
