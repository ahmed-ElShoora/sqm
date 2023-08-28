<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Type;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use App\Models\Offer;

class OfferController extends Controller
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

    public function index(){
        $offers = Offer::select(
            'id',
            'title_ar',
            'description_ar',
            'price',
            'city_ar',
            'town_ar',
            'offerStatus as offerOfferStatus',
            'rentType as offerRentType',
            'isDeleted as offerIsDeleted',
        )->where('isDeleted',0)->get();
        return view('manager.offers.index',compact('offers'));
    }

    public function create()
    {
            $types = Type::orderBy('id', 'DESC')->get();
            return view('manager.offers.create', compact('types'));
    }

    public function store(Request $request){
            $request->validate([
                'type_id_ar'=>'required',
                'type_id_en'=>'required',
                'price'=>'required',
                'city_ar'=>'required',
                'town_ar'=>'required',
                'city_en'=>'required',
                'town_en'=>'required'
            ]);

            $offer = new Offer([
                'user_id' => Auth()->user()->id,
                'type_id_ar' => $request->type_id_ar,
                'title_ar' => $request->title_ar,
                'description_ar' => $request->description_ar,
                'type_id_en' => $request->type_id_en,
                'title_en' => $request->title_en,
                'description_en' => $request->description_en,
                'price' => $request->price,
                'city_ar' => $request->city_ar,
                'town_ar' => $request->town_ar,
                'city_en' => $request->city_en,
                'town_en' => $request->town_en,
                'room' => $request->room,
                'bathroom' => $request->bathroom,
                'facilities_ar' => $request->facilities_ar,
                'services_ar' => $request->services_ar,
                'facilities_en' => $request->facilities_en,
                'services_en' => $request->services_en,
                'rentType' => $request->rentType,
                'isNew' => $request->isNew,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'seller_name' => $request->seller_name,
                'seller_phone' => $request->seller_phone,
                'seller_email' => $request->seller_email,
                'seller_domain' => $request->seller_domain,
                'nav_text_ar' => $request->nav_text_ar,
                'nav_text_en' => $request->nav_text_en,
                'nav_color' => $request->nav_color,
                'size' => $request->size,
            ]);

            if($request->hasFile('thumbnail')){
                $request->validate([
                    'thumbnail'=>['required', 'image']
                ]);

                $image = $request->file('thumbnail');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $offer->thumbnail = $image_path;
            }
            if($request->hasFile('seller_image')){
                $request->validate([
                    'seller_image'=>['required', 'image']
                ]);

                $image = $request->file('seller_image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $offer->seller_image = $image_path;
            }

            $offer->save();

            if($request->hasFile('image')){
                foreach($request->image as $image){
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path('/myImages'),$image_name);
                    $image_path = "/myImages/" . $image_name;
                    Image::create([
                        'offer_id' => $offer->id,
                        'image' => $image_path
                    ]);
                }
            }


            return redirect('offers');

    }

    public function isDeleted($id){
        $delete = Offer::find($id);
        $delete->update([
           'isDeleted'=>1
        ]);
        return redirect('offers');
    }



    public function makeAvailable($id)
    {
            $offer = Offer::find($id);
            $offer->offerStatus = 'available';
            $offer->rentType = '';

            $offer->save();
            return redirect('offers');


    }

    public function makeRented($id)
    {
            $offer = Offer::find($id);
            $offer->offerStatus = 'rented';

            $offer->save();
            return redirect('offers');


    }


    public function makeSoldOut($id)
    {
            $offer = Offer::find($id);
            $offer->offerStatus = 'soldout';

            $offer->save();
            return redirect('offers');


    }

    public function archive(){
        $offers = Offer::select(
            'id',
            'title_ar',
            'description_ar',
            'price',
            'city_ar',
            'town_ar',
        )->where('isDeleted',1)->get();
        return view('manager.offers.archive',compact('offers'));
    }

    public function restore($id){
        $restore = Offer::find($id);
        $restore->update([
            'isDeleted'=>0
        ]);
        return redirect('offers');
    }

    public function show($id){
        $offer = Offer::where('id', $id)->first();
        $images = Image::where('offer_id', $offer->id)->get();
        return view('manager.offers.show',compact('offer', 'images'));
    }

    public function edit($id){
        $offer = Offer::where('id', $id)->first();
        $types = Type::select('name')->get();
        return view('manager.offers.edit',compact('offer','types'));
    }

    public function updateOffer(Request $request){
        $id = $request->id;

            $request->validate([
                'type_id_ar'=>'required',
                'price'=>'required',
                'city_ar'=>'required',
                'town_ar'=>'required',
                'type_id_en'=>'required',
                'city_en'=>'required',
                'town_en'=>'required'
            ]);

            $offer = Offer::find($id);
            $offer->type_id_ar = $request->type_id_ar;
            $offer->title_ar = $request->title_ar;
            $offer->description_ar = $request->description_ar;
            $offer->type_id_en = $request->type_id_en;
            $offer->title_en = $request->title_en;
            $offer->description_en = $request->description_en;
            $offer->price = $request->price;
            $offer->city_ar = $request->city_ar;
            $offer->town_ar = $request->town_ar;
            $offer->city_en = $request->city_en;
            $offer->town_en = $request->town_en;
            $offer->room = $request->room;
            $offer->bathroom = $request->bathroom;
            $offer->facilities_ar = $request->facilities_ar;
            $offer->services_ar = $request->services_ar;
            $offer->facilities_en = $request->facilities_en;
            $offer->services_en = $request->services_en;
            $offer->rentType = $request->rentType;
            $offer->isNew = $request->isNew;
            $offer->latitude = $request->latitude;
            $offer->longitude = $request->longitude;
            $offer->seller_name = $request->seller_name;
            $offer->seller_phone = $request->seller_phone;
            $offer->seller_email = $request->seller_email;
            $offer->seller_domain = $request->seller_domain;
            $offer->nav_text_ar = $request->nav_text_ar;
            $offer->nav_text_en = $request->nav_text_en;
            $offer->nav_color = $request->nav_color;
            $offer->size = $request->size;
            $offer->comer = $request->comer;

            if($request->hasFile('thumbnail')){
                $request->validate([
                    'thumbnail'=>['required', 'image']
                ]);
                $image = $request->file('thumbnail');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $offer->thumbnail = $image_path;
            }
            if($request->hasFile('seller_image')){
                $request->validate([
                    'seller_image'=>['required', 'image']
                ]);

                $image = $request->file('seller_image');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/myImages'),$image_name);
                $image_path = "/myImages/" . $image_name;
                $offer->seller_image = $image_path;
            }
            $offer->save();
            if($request->hasFile('image')){
                $oldImages = Image::where('offer_id', $id)->delete();
                foreach($request->image as $image){
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path('/myImages'),$image_name);
                    $image_path = "/myImages/" . $image_name;
                    Image::create([
                        'offer_id' => $offer->id,
                        'image' => $image_path
                    ]);
                }
            }
            return redirect('offers');


    }
}
