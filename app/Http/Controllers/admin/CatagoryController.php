<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CatagoryController extends Controller
{
    //-contruct
    public function __construct()
    {
        $this->middleware('auth');

    }

    // index method for all class from database//
    public function index()
    {
    //    echo "done";
    $data = DB::table('class')->simplepaginate(4);
    return view('admin.class.index', compact('data'));
    }

    //create form page//
    public function create()
    {
      return view('admin.class.create');
    }
    // store class///
    public function store(Request $request)
    {
      $request->validate([
        'class_name'=> 'required|unique:class',
      ]);

      $data=array(
        'class_name' =>$request->class_name,
      );

      DB::table('class')->insert($data);
      return redirect()->back()->with('success',' data insert');
    }

   //__delete  method__//
   public function delete($id)
   {
      DB::table('class')->where('id', $id)->delete();
    return redirect()->back()->with('success',' data delete');
    }

    //__edit__//
    public function edit($id)
   {
      $data=DB::table('class')->where('id',$id)->first();
    return view('admin.class.edit',compact('data'));
    }


    //__update__//
    public function update(Request $request,$id)
    {
      $request->validate([
        'class_name'=> 'required',
      ]);

      $data=array(
        'class_name' =>$request->class_name,
      );
      DB::table('class')->where('id', $id)->update($data);
      return redirect()->back()->with('success',' data update');
    }

}
