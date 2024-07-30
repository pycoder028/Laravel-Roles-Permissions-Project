<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //  This method will show permission page
    public function index(){

        return view('permissions.list');
    }   // Method ends here...

    //  This method will show create permission page
    public function create(){

        return view('permissions.create');
    }   // Method ends here...

    //  This method will insert a permission in DB
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:3'
        ]);

        if($validator->passes()){
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success','Permission added successfully.');

        }else{
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }

    }   // Method ends here...

    //  This method will show edit permission page
    public function edit(){

    }   // Method ends here...

    //  This method will update a permission
    public function update(){

    }   // Method ends here...
    
    //  This method will delete permission in DB
    public function destroy(){

    }   // Method ends here...


}
