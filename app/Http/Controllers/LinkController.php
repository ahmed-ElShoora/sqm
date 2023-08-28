<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $link = Link::first();
        return view('manager.links.edit',compact('link'));
    }

    public function update(Request $request){
        $id = 1;
        /*if($request->image == null){
            $file = $request->image_name;
        }else{
            $file_exception = $request->image->getClientOriginalExtension();
            $file = time().'.'.$file_exception;
            $path = 'images/links';
            $request->image->move($path,$file);
        }*/
        $links_update = Link::find($id);
        $links_update->update($request->all());
        return redirect()->route('links');
    }
    public function updateImages(Request $request){
        $id = 1;
        if($request->image_home == null){
            $file_image_home = $request->image_home_old;
        }else{
            $file_exception = $request->image_home->getClientOriginalExtension();
            $file_image_home = time().'.'.$file_exception;
            $path = 'images/links';
            $request->image_home->move($path,$file_image_home);
        }
        
        if($request->image_service == null){
            $file_image_service = $request->image_service_old;
        }else{
            $file_exception = $request->image_service->getClientOriginalExtension();
            $file_image_service = time().'.'.$file_exception;
            $path = 'images/links';
            $request->image_service->move($path,$file_image_service);
        }
        
        if($request->image_about == null){
            $file_image_about = $request->image_about_old;
        }else{
            $file_exception = $request->image_about->getClientOriginalExtension();
            $file_image_about = time().'.'.$file_exception;
            $path = 'images/links';
            $request->image_about->move($path,$file_image_about);
        }
        
        if($request->image_project == null){
            $file_image_project = $request->image_project_old;
        }else{
            $file_exception = $request->image_project->getClientOriginalExtension();
            $file_image_project = time().'.'.$file_exception;
            $path = 'images/links';
            $request->image_project->move($path,$file_image_project);
        }
        
        if($request->image_contact == null){
            $file_image_contact = $request->image_contact_old;
        }else{
            $file_exception = $request->image_contact->getClientOriginalExtension();
            $file_image_contact = time().'.'.$file_exception;
            $path = 'images/links';
            $request->image_contact->move($path,$file_image_contact);
        }
        $links_update = Link::find($id);
        $links_update->update([
                'image_home'=>$file_image_home,
                'image_service'=>$file_image_service,
                'image_about'=>$file_image_about,
                'image_project'=>$file_image_project,
                'image_contact'=>$file_image_contact,
        ]);
        return redirect()->route('links');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
