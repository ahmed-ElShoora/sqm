<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Models\HomePartner;

class HomePageController extends Controller
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
        $slides = HomeSlider::where('isDeleted',0)->orderBy('id', 'DESC')->get();
        $partners = HomePartner::orderBy('id', 'DESC')->get();
        return view('manager.pages.home.index', compact('slides', 'partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSlide()
    {
            return view('manager.pages.home.createSlide');


    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPartner()
    {
            return view('manager.pages.home.createPartner');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSlide(Request $request)
    {
            

            

                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
            
            

                $photo = $request->file('photo');
                $photo_name = $photo->getClientOriginalName();
                $photo->move(public_path('/myImages'),$photo_name);
                $photo_path = "/myImages/" . $photo_name;
            

            HomeSlider::create([
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'color' => $request->color,
                'image' => $image_path,
                'image_phone' =>$photo_path,

                ]);

            return redirect('pages-home');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePartner(Request $request)
    {

            $request->validate([
                'logo'=>['required', 'image']
            ]);

            $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/myImages'),$image_name);
            $image_path = "/myImages/" . $image_name;
                $partner = new HomePartner([
                'logo' => $image_path
            ]);

            $partner->save();
            return redirect('pages-home');


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
    public function editSlide($id)
    {
            $slide = HomeSlider::where('id', '=', $id)->first();
            return view('manager.pages.home.editSlide',compact('slide'));


    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPartner($id)
    {
            $partner = HomePartner::where('id', '=', $id)->first();
            return view('manager.pages.home.editPartner',compact('partner'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSlide(Request $request, $id)
    {

            $slide = HomeSlider::find($id);
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
            return redirect('pages-home');



    }



     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePartner(Request $request, $id)
    {
            $request->validate([
                'logo'=>['required', 'image']
            ]);


            $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/myImages'),$image_name);
            $image_path = "/myImages/" . $image_name;

            $partner = HomePartner::find($id);
            $partner->logo = $image_path;

            $partner->save();
            return redirect('pages-home');


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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSlide(Request $request, $id)
    {
            $slide = HomeSlider::find($id);
            $slide->isDeleted = '1';

            $slide->save();
            return redirect('pages-home');


    }

    public function restoreSlide(Request $request, $id)
    {
            $slide = HomeSlider::find($id);
            $slide->isDeleted = '0';

            $slide->save();
            return redirect('pages-home');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePartner(Request $request, $id)
    {
            $partner = HomePartner::find($id);
            $partner->isDeleted = '1';

            $partner->save();
            return redirect('pages-home');


    }


    public function restorePartner(Request $request, $id)
    {
            $partner = HomePartner::find($id);
            $partner->isDeleted = '0';

            $partner->save();
            return redirect('pages-home');


    }


}
