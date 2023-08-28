<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicePop;

class ServicePopController extends Controller
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
        $services = ServicePop::orderBy('id', 'DESC')->get();
        return view('manager.servicePops.index', compact('services'));
    }

    public function showTypes()
    {
            return view('manager.servicePops.showTypes');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
            return view('manager.servicePops.create', compact('id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

            $service = new ServicePop([
                'type' => $id,
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'notes_en' => $request->notes_en,
                'notes_ar' => $request->notes_ar
            ]);

            if($request->hasFile('icon')){
                $request->validate([
                    'icon'=>['required', 'image']
                ]);

                $image = $request->file('icon');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $service->icon = $image_path;
            }
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

            return redirect('service-modals');

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
            $service = ServicePop::where('id', '=', $id)->first();
            return view('manager.servicePops.edit',compact('service'));

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

            $service = ServicePop::find($id);
            $service->title_en = $request->title_en;
            $service->title_ar = $request->title_ar;
            $service->description_en = $request->description_en;
            $service->description_ar = $request->description_ar;
            $service->notes_en = $request->notes_en;
            $service->notes_ar = $request->notes_ar;

            if($request->hasFile('icon')){
                $request->validate([
                    'icon'=>['required', 'image']
                ]);

                $image = $request->file('icon');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $service->icon = $image_path;
            }
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
            return redirect('service-modals');

    }

    public function isDeleted(Request $request, $id)
    {
            $service = ServicePop::find($id);
            $service->isDeleted = '1';

            $service->save();
            return redirect('service-modals');


    }

    public function restore(Request $request, $id)
    {
            $service = ServicePop::find($id);
            $service->isDeleted = '0';

            $service->save();
            return redirect('service-modals');


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
