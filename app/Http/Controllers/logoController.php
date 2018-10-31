<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\logo;

class logoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $logo = logo::orderBy('created_at','desc')->get();
        return view('logo.upload',compact('logo'));
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
            // validation 
            $validator = Validator::make($request->all(), [
                'cover_image'=> 'required',
               
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->with('error',$validator->errors());          
            }
            // var_dump($request->file('cover_image'));
            // exit();
            // logo store 
            try{
            
                $file_name = time();
                $file_name .= rand();
                $file_name = sha1($file_name);
                if ($request->file('cover_image')) {
                    $ext = $request->file('cover_image')->getClientOriginalExtension();
                    $request->file('cover_image')->move(public_path() . "/uploads", $file_name . "." . $ext);
                    $local_url = $file_name . "." . $ext;
                    $s3_url = url('/').'/uploads/'.$local_url;
                    
                }
                
            
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' picture section input something wrong .');
            }

            $logo = logo::orderBy('created_at','desc')->get();
            foreach($logo as $te){
                $id = $te->id;
            }
            $logo = logo::find($id);
            $logo->cover_image = $s3_url;
            if($logo->save()){

                return redirect()->back()->with('success',' Logo is successfull added .');
            }
            else{
                return redirect()->back()->with('error',' Something wrong.');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
