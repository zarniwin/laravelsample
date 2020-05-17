<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MenuController extends Controller
{
    // get data and view index page
    public function index(){
        $page_limit = env('page_limit');
        $menus = Menu::withTrashed()->paginate($page_limit);
        return view('Admin.Menu.index',['menus'=>$menus,'page_limit'=>$page_limit]);
    }

    // view create page
    public function create(){
        return view('Admin.Menu.create');
    }

    // insert data to database
    public function store(Request $request){
        // create new model instance
        $menu = new Menu(); 
        // set attributes to model instance
        $menu->menu_name    = $request->menu_name;
        $menu->display_name = $request->display_name;
        $menu->rank         = $request->rank;
        // save
        if($menu->save()){
            //return page with flash session message
            return redirect()->back()->with('success','Menu Create Success!');
        }else{
            return redirect()->back()->with('error','Menu Create Fail!');
        }
    }

    // get data with id and view edit page
    // withTrashed => get softdelete rows
    // whereId  => where id = $id
    // firstOrFail => get data if exist or throw error
    public function edit($id){        
        $menu = Menu::withTrashed()->whereId($id)->firstOrFail();
        return view('Admin.Menu.edit',['menu' => $menu]);        
    }

    // update model instance
    public function update(Request $request,$id){
        // create model instance with id
        $menu = Menu::withTrashed()->whereId($id)->firstOrFail();

        $menu->menu_name    = $request->menu_name;
        $menu->display_name = $request->display_name;
        $menu->rank         = $request->rank;

        if($menu->update()){
            //return url=/menus (index page) with flash session message
            return redirect()->to('menus')->with('success','Menu Edit Success!');
        }else{
            return redirect()->back()->with('error','Menu Edit Fail!');
        }
    }

    // softdelete >> not actually remove row on database
    public function delete($id){
        // create model instance with id
        $menu = Menu::withTrashed()->whereId($id)->firstOrFail();
        // set deleted_at =  current datetime
        if($menu->delete()){
            return redirect()->back()->with('success','Menu Delete Success!');
        }else{
            return redirect()->back()->with('error','Menu Delete Fail!');
        }
    }

    // To restore a soft deleted model into an active state
    public function restore($id){
        // create model instance with id
        $menu = Menu::withTrashed()->whereId($id)->firstOrFail();
        // set deleted_at = null
        if($menu->restore()){
            return redirect()->back()->with('success','Menu Restore Success!');
        }else{
            return redirect()->back()->with('error','Menu Restore Fail!');
        }
    }

    // Permanently Deleting a single model instance
    public function forceDelete($id){
        // create model instance with id
        $menu = Menu::withTrashed()->whereId($id)->firstOrFail();
        if($menu->forceDelete()){
            return redirect()->back()->with('success','Menu Permanently Delete Success!');
        }else{
            return redirect()->back()->with('error','Menu Permanently Delete Fail!');
        }
    }
}
