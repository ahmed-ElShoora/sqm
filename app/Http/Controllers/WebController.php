<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\City;
use App\Models\Progres;
use App\Models\Type;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use \Illuminate\Support\Facades\DB;
use App\Models\HomeSlider;
use App\Models\HomePartner;
use App\Models\Service;
use App\Models\Offer;
use App\Models\Image;
use App\Models\ABout;
use App\Models\Link;
use App\Models\Contact;
use App\Models\ProjectPage;
use App\Models\Deal;
use App\Models\ServicePop;
use App\Models\Inbox;
use App\Models\Detail;
use App\Models\setting;



class WebController extends Controller
{
    
    public function detailProject(Request $request){
        Detail::create([
            'project_name'=>$request->project_name,
            'name'=>$request->name,
            'phone'=>$request->phone,
        ]);
        return redirect()->back();
    }

    public function home()
    {
        View::create([
            'ip'=>'127.0.0.1',
        ]);
        $popups = ServicePop::select(
            'id',
            'icon',
            'type',
            'description_'.App::getLocale().' as description',
            'title_'.App::getLocale().' as title',
            'notes_'.App::getLocale().' as notes',
            'image',
            'isDeleted'
        )->where('isDeleted', '0')->get();
        $partners = HomePartner::where('isDeleted', '=', '0')->orderBy('id', 'DESC')->get();
        $newOffers = Offer::select(
            'id',
            'user_id',
            'type_id_'.App::getLocale().' as type',
            'description_'.App::getLocale().' as description',
            'thumbnail',
            'title_'.App::getLocale().' as title',
            'price',
            'city_'.App::getLocale().' as city',
            'town_'.App::getLocale().' as town',
            'room',
            'bathroom',
            'facilities_'.App::getLocale().' as facilities',
            'services_'.App::getLocale().' as services',
            'offerStatus',
            'rentType',
            'latitude',
            'longitude',
            'isNew',
            'seller_name',
            'seller_phone',
            'seller_email',
            'seller_domain',
            'seller_image',
            'isDeleted',
            'nav_text_'.App::getLocale().' as textnav',
            'nav_color'
        )->where('isDeleted', '0')->where('isNew','1')->orderBy('id', 'DESC')->take(6)->get();
        $contact = Contact::select(
            'latitude','longitude','phone','mail','address_'.App::getLocale().' as address'
        )->first();
        $ads = Ad::where('isDeleted', '=', '0')->inRandomOrder()->first();
        $progress = Progres::select(
            'image',
            'num',
            'title_'.App::getLocale(). ' as title',
        )->where('isDeleted', '0')->orderBy('id', 'DESC')->get();
        $types = Type::orderBy('id', 'DESC')->get();
         $rooms = Offer::where('isDeleted', '=', '0')
         ->select(DB::raw('room'))
         ->groupBy('room')
         ->get();
         $bathRooms = Offer::where('isDeleted', '=', '0')
         ->select(DB::raw('bathroom'))
         ->groupBy('bathroom')
         ->get();
         $rentTypes = Offer::where('isDeleted', '=', '0')
         ->select(DB::raw('rentType'))
         ->groupBy('rentType')
         ->get();
        $div =  Link::select(
            'title_'.App::getLocale().'_home as title',
            'desc_'.App::getLocale().'_home as desc',
            'name_'.App::getLocale().'_home as name',
            'home_link as link',
            'image_home as image',
        )->first();
        $desc = setting::select(
            'project_desc_'.App::getLocale().' as descreption'
            )->where('id',1)->first();
        return view('front.index',compact('popups','newOffers','progress','partners','ads','types','rooms','bathRooms','rentTypes','div','contact','desc'));
    }

    public function about()
    {
        $about = ABout::select(
            'id',
            'description_'.App::getLocale().' as description',
            'vision_'.App::getLocale().' as vision',
            'mission_'.App::getLocale().' as mission',
            'image',
        )->first();
        $contact = Contact::select(
            'latitude','longitude','phone','mail','address_'.App::getLocale().' as address'
        )->first();
        $div =  Link::select(
            'title_'.App::getLocale().'_about as title',
            'desc_'.App::getLocale().'_about as desc',
            'name_'.App::getLocale().'_about as name',
            'about_link as link',
            'image_about as image',
        )->first();
        return view ('front.about', compact('about','div','contact'));
    }

    public function contact()
    {
        $contact = Contact::select(
            'latitude','longitude','phone','mail','address_'.App::getLocale().' as address'
        )->first();
        $div =  Link::select(
            'title_'.App::getLocale().'_contact as title',
            'desc_'.App::getLocale().'_contact as desc',
            'name_'.App::getLocale().'_contact as name',
            'contact_link as link',
            'image_contact as image',
        )->first();
        return view ('front.contact', compact('contact','div'));
    }

     public function storeMessage(Request $request)
    {
    
        Inbox::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);


        return redirect('/');
    }

    public function services()
    {
        $services = Service::select(
            'id',
            'image',
            'type',
            'description_'.App::getLocale().' as description',
            'title_'.App::getLocale().' as title',
            'notes_'.App::getLocale().' as notes',
            'image',
            'isDeleted'
        )->where('isDeleted', '0')->orderBy('id', 'DESC')->get();
$contact = Contact::select(
            'latitude','longitude','phone','mail','address_'.App::getLocale().' as address'
        )->first();
        $desc = setting::select(
            'project_desc_'.App::getLocale().' as descreption'
            )->where('id',1)->first();
        $popups = ServicePop::select(
            'id',
            'icon',
            'type',
            'description_'.App::getLocale().' as description',
            'title_'.App::getLocale().' as title',
            'notes_'.App::getLocale().' as notes',
            'image',
            'isDeleted'
        )->where('isDeleted', '0')->get();
        $div =  Link::select(
            'title_'.App::getLocale().'_service as title',
            'desc_'.App::getLocale().'_service as desc',
            'name_'.App::getLocale().'_service as name',
            'services_link as link',
            'image_service as image',
        )->first();
        return view('front.service', compact('services', 'popups','div','contact','desc'));
    }

    public function projects()
    {
        $projects = Offer::select(
            'id',
            'user_id',
            'type_id_'.App::getLocale().' as type',
            'description_'.App::getLocale().' as description',
            'thumbnail',
            'title_'.App::getLocale().' as title',
            'price',
            'city_'.App::getLocale().' as city',
            'town_'.App::getLocale().' as town',
            'room',
            'bathroom',
            'facilities_'.App::getLocale().' as facilities',
            'services_'.App::getLocale().' as services',
            'offerStatus',
            'rentType',
            'latitude',
            'longitude',
            'isNew',
            'seller_name',
            'seller_phone',
            'seller_email',
            'seller_domain',
            'seller_image',
            'isDeleted',
            'nav_text_'.App::getLocale().' as textnav',
            'nav_color',
            'comer',
            'size'
        )->where('isDeleted', '0')->orderBy('id', 'DESC')->orderBy('comer', 'ASC')->get();
        //for filter
        $contact = Contact::select(
            'latitude','longitude','phone','mail','address_'.App::getLocale().' as address'
        )->first();
        
        $types = Offer::select('type_id_'.App::getLocale().' as type')
            ->where('isDeleted',0)
            ->groupBy('type')
            ->get();
        $rooms = Offer::where('isDeleted', '=', '0')
            ->select(DB::raw('room'))
            ->groupBy('room')
            ->get();

            /*
            1 => 5
            2 => 5
            3 => 5
            4 => 5

            5 => 4

                {
                    5,4
                }

            */
        $bathRooms = Offer::where('isDeleted', '=', '0')
            ->select(DB::raw('bathroom'))
            ->groupBy('bathroom')
            ->get();
        //$rentTypes = Offer::where('isDeleted', '=', '0')
        //    ->select(DB::raw('rentType'))
        //    ->groupBy('rentType')
        //    ->get();
        $cities = City::select('name_'.App::getLocale().' as name')->get();
        $towns = Offer::where('isDeleted', '=', '0')
            ->select(DB::raw('town_'.App::getLocale().' as town'))
            ->groupBy('town_'.App::getLocale())
            ->get();
            $div =  Link::select(
            'title_'.App::getLocale().'_project as title',
            'desc_'.App::getLocale().'_project as desc',
            'name_'.App::getLocale().'_project as name',
            'projects_link as link',
            'image_project as image',
        )->first();
        return view('front.projects',compact('projects', 'types', 'rooms', 'bathRooms', 'cities', 'towns','div','contact'));
    }


    public function oneProject(Request $request, $id)
    {
        $offer = Offer::select(
            'id',
            'user_id',
            'views',
            'type_id_'.App::getLocale().' as type',
            'description_'.App::getLocale().' as description',
            'thumbnail',
            'title_'.App::getLocale().' as title',
            'price',
            'city_'.App::getLocale().' as city',
            'town_'.App::getLocale().' as town',
            'room',
            'bathroom',
            'facilities_'.App::getLocale().' as facilities',
            'services_'.App::getLocale().' as services',
            'offerStatus',
            'rentType',
            'latitude',
            'longitude',
            'isNew',
            'seller_name',
            'seller_phone',
            'seller_email',
            'seller_domain',
            'seller_image',
            'isDeleted',
            'nav_text_'.App::getLocale().' as textnav',
            'nav_color',
            'comer',
            'size'
        )->where('id', '=', $id)->first();
        $now = $offer->views + 1;
        $contact = Contact::select(
            'latitude','longitude','phone','mail','address_'.App::getLocale().' as address'
        )->first();
        $images = Image::where('offer_id', '=', $offer->id)->get();
        $view = Offer::find($id);
        $view->update([
            'views'=>$now,
            ]);
        return view('front.details',compact('offer', 'images','contact'));
    }

    public function projectFilter(Request $request){
        $projects = Offer::select(
            'id',
            'user_id',
            'type_id_'.App::getLocale().' as type',
            'description_'.App::getLocale().' as description',
            'thumbnail',
            'title_'.App::getLocale().' as title',
            'price',
            'city_'.App::getLocale().' as city',
            'town_'.App::getLocale().' as town',
            'room',
            'bathroom',
            'facilities_'.App::getLocale().' as facilities',
            'services_'.App::getLocale().' as services',
            'offerStatus',
            'rentType',
            'latitude',
            'longitude',
            'isNew',
            'seller_name',
            'seller_phone',
            'seller_email',
            'seller_domain',
            'seller_image',
            'isDeleted',
            'nav_text_'.App::getLocale().' as textnav',
            'nav_color',
            'size',
            'comer'
        )->where('isDeleted', '=', '0');
        if($request->searchText != ''){
            $projects->where('title_'.App::getLocale(),$request->searchText);
        }else{
             if($request->type_id != null  && $request->type_id != 'all'){
                 $projects->where('type_id_'.App::getLocale(),$request->type_id);
             }
             if($request->rentType != null  && $request->rentType != 'all'){
                 $projects->where('rentType',$request->rentType,'Sale');
             }
             if($request->room != null  && $request->room != 'all'){
                 $projects->where('room',$request->room);
             }
             if($request->bathroom != null  && $request->bathroom != 'all'){
                 $projects->where('bathroom',$request->bathroom);
             }
             if($request->city != null  && $request->city != 'all'){
                 $projects->where('city_'.App::getLocale(),$request->city);
             }
             if($request->town != null  && $request->town != 'all'){
                 $projects->where('town_'.App::getLocale(),$request->town);
             }
             if($request->min_price != null){
                 $projects->where('price','>',$request->min_price);
             }
             if($request->max_price != null){
                 $projects->where('price','<',$request->max_price);
             }
            
            
            
        }
        $projects->where('comer','1');
        $projects = $projects->get();
        //for filter
        $types = Offer::select('type_id_'.App::getLocale().' as type')
        ->where('isDeleted',0)
            ->groupBy('type')
            ->get();
        $rooms = Offer::where('isDeleted', '=', '0')
            ->select(DB::raw('room'))
            ->groupBy('room')
            ->get();
        $bathRooms = Offer::where('isDeleted', '=', '0')
            ->select(DB::raw('bathroom'))
            ->groupBy('bathroom')
            ->get();
        //$rentTypes = Offer::where('isDeleted', '=', '0')
        //    ->select(DB::raw('rentType'))
        //    ->groupBy('rentType')
        //    ->get();
        $contact = Contact::select(
            'latitude','longitude','phone','mail','address_'.App::getLocale().' as address'
        )->first();
        $cities = City::select('name_'.App::getLocale().' as name')->get();
        $towns = Offer::where('isDeleted', '=', '0')
            ->select(DB::raw('town_'.App::getLocale().' as town'))
            ->groupBy('town_'.App::getLocale())
            ->get();
            $div =  Link::select(
            'title_'.App::getLocale().'_project as title',
            'desc_'.App::getLocale().'_project as desc',
            'name_'.App::getLocale().'_project as name',
            'projects_link as link',
            'image_project as image',
        )->first();
        return view('front.projects',compact('projects', 'types', 'rooms', 'bathRooms','cities', 'towns','div','contact'));
    }

}
