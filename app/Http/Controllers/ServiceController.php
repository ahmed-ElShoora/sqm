<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
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
        $services = Service::orderBy('id', 'DESC')->get();
        return view('manager.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTypes()
    {
            return view('manager.pages.services.showTypes');
            return view('manager.errors.401');

    }

    public function create($id)
    {
            return view('manager.pages.services.create', compact('id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

            $service = new Service([
                'type' => $id,
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'notes_en' => $request->notes_en,
                'notes_ar' => $request->notes_ar
            ]);

            if($request->hasFile('image')){
                $request->validate([
                    'image'=>['required', 'image']
                ]);

                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $service->image = $image_path;
            }

            $service->save();

            return redirect('pages-services');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $service = Service::where('id', '=', $id)->first();
        // return view('manager.pages.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $service = Service::where('id', '=', $id)->first();
            return view('manager.pages.services.edit',compact('service'));

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

            $service = Service::find($id);
            $service->title_en = $request->title_en;
            $service->title_ar = $request->title_ar;
            $service->description_en = $request->description_en;
            $service->description_ar = $request->description_ar;
            $service->notes_en = $request->notes_en;
            $service->notes_ar = $request->notes_ar;

            if($request->hasFile('image')){
                $request->validate([
                    'image'=>['required', 'image']
                ]);

                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $service->image = $image_path;
            }

            $service->save();
            return redirect('pages-services');

    }



    public function isDeleted(Request $request, $id)
    {
            $service = Service::find($id);
            $service->isDeleted = '1';

            $service->save();
            return redirect('pages-services');

    }

    public function restore(Request $request, $id)
    {
            $service = Service::find($id);
            $service->isDeleted = '0';

            $service->save();
            return redirect('pages-services');

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
