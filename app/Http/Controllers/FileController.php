<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all files
        $files = \App\File::all();
        //
        return view('admin.admin_forms',['files'=>$files]);
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
        //get file size
        $size = $request->file->getClientSize();
        //get name of file
        $filename = $request->file->getClientOriginalName();
        //requests currently selected store in a file called 'files', save as actual file name
        $file = $request->file('file')->storeAs('files',$filename);

        //creates new file and stores file info in DB
        $file = new File;
        $file->name = $filename;
        $file->size = $size;
        $file->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($img)
    {
        
        
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
        //
    }
    public function download($file){

        //when clicked trigger download response, downloads from 'file path' and gets file
        return response()->download(storage_path('/app/files/'.$file));
    }
}
