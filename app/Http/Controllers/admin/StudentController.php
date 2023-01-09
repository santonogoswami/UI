<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students=DB::table('students')->join('class','students.class_id','class_id')->get();
        //dd($students);
    //   $students=DB::table('students')->orderBy('roll','ASC')->get();
     return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $class=DB::table('class')->get();
        //
         return view('admin.student.create',compact('class'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'class_id' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'roll' => 'required',

       ]);
       $data=array(
        'class_id' =>$request->class_id,
        'name' =>$request->name,
        'roll' =>$request->roll,
        'phone' =>$request->phone,
        'email' =>$request->email,
       );

       DB::table('students')->insert($data);
      return redirect()->back()->with('success',' data insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $students=DB::table('students')->find($id);
       return view('admin.student.view',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class=DB::table('class')->get();
        $students=DB::table('students')->where('id',$id)->first();
        return view('admin.student.edit',compact('class','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'roll' => 'required',]);
            $data=array(
                'class_id' =>$request->class_id,
                'name' =>$request->name,
                'roll' =>$request->roll,
                'phone' =>$request->phone,
                'email' =>$request->email,
               );
               DB::table('students')->where('id',$id)->update($data);
              return redirect()->route('students.index')->with('success',' data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     DB::table('students')->where('id',$id)->delete();
     return redirect()->back()->with('success',' data delete');
    }
}
