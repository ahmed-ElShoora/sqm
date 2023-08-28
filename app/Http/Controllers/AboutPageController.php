<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ABout;

class AboutPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = ABout::first();
        return view ('manager.pages.about.index', compact('about'));
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
        //
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
            $about = ABout::where('id', '=', $id)->first();
            return view('manager.pages.about.edit',compact('about'));


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

            $about = ABout::find($id);
            $about->description_en = $request->description_en;
            $about->description_ar = $request->description_ar;
            $about->vision_en = $request->vision_en;
            $about->vision_ar = $request->vision_ar;
            $about->mission_en = $request->mission_en;
            $about->mission_ar = $request->mission_ar;

            if($request->hasFile('image')){
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $about->image = $image_path;
            }
            
            $about->save();
            return redirect('pages-about');



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
