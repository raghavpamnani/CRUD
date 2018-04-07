<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Imageupload;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $view_participants = Imageupload::all();
        return view('/viewparticipant')->with('view_participants', $view_participants);
    }

    public function addparticipant()
    {
        return view('participant');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
    $this->validate($request, array(
        'firstname' => 'required|max:255',
        'filename'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ));

    // if ($request->hasFile('filename')) {
    //     $image = $request->file('filename');
    //     $name = time().'.'.$image->getClientOriginalExtension();
    //     $destinationPath = public_path('/images');
    //     $image->move($destinationPath, $name);
    // }

    // if ($request->has('filename')) {
    //         $files = $request->file('filename');
    //         $destinationPath = storage_path() . '/app/public/';
    //         $fileName = $files->getClientOriginalName();
    //         $extension = $files->getClientOriginalExtension();
    //         $storeName = $fileName . '.' . $extension;
    //         $files->move($destinationPath, $storeName);
    // }

    // store in the database
    $student = Imageupload::create($request->all());
    $student->save();
    Session::flash('Success', 'The Data was successfully saved!');
    return redirect('/addparticipant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    { 
         
          return $usersview = Imageupload::find($id);
          return view('viewuser',compact('usersview'));
    //    return View::make('viewuser')
    //                 ->with(compact('$usersview'));
          //return view('/viewparticipant')->with('usersview', $usersview);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskdelete = Imageupload::findOrFail($id);

        $taskdelete->delete();

        Session::flash('flash_message', 'Task successfully deleted!');

        return redirect('/viewparticipant');
    }
}
