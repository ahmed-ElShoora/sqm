<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProjectPage;

class ProjectPageController extends Controller
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
        $slides = ProjectPage::where('isDeleted',0)->orderBy('id', 'DESC')->get();
        return view('manager.pages.projects.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('manager.pages.projects.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
            
            
            $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
            
            

                $photo = $request->file('photo');
                $photo_name = $photo->getClientOriginalName();
                $photo->move(public_path('/myImages'),$photo_name);
                $photo_path = "/myImages/" . $photo_name;
            

            ProjectPage::create([
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'color' => $request->color,
                'image' => $image_path,
                'image_phone' =>$photo_path,

                ]);

            return redirect('pages-projects');


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
            $slide = ProjectPage::where('id', '=', $id)->first();
            return view('manager.pages.projects.edit',compact('slide'));

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
            $slide = ProjectPage::find($id);
            $slide->description_en = $request->description_en;
            $slide->description_ar = $request->description_ar;
            $slide->color = $request->color;

            if($request->hasFile('image')){
                $request->validate([
                    'image'=>['required', 'image']
                ]);

                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $slide->image = $image_path;
            }
            
            if($request->hasFile('image_phone')){
                $request->validate([
                    'image_phone'=>['required', 'image']
                ]);

                $image_phone = $request->file('image_phone');
                $image_name_phone = $image_phone->getClientOriginalName();
                $image_phone->move(public_path('/myImages'),$image_name_phone);
                $image_path_phone = "/myImages/" . $image_name_phone;
                $slide->image_phone = $image_path_phone;
            }

            $slide->save();
            return redirect('pages-projects');


    }

    public function delete(Request $request, $id)
    {
            $slide = ProjectPage::find($id);
            $slide->isDeleted = '1';

            $slide->save();
            return redirect('pages-projects');


    }

    public function restore(Request $request, $id)
    {
            $slide = ProjectPage::find($id);
            $slide->isDeleted = '0';

            $slide->save();
            return redirect('pages-projects');


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
