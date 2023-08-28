<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\BestHouse;
use App\Models\Bot;
use App\Models\City;
use App\Models\Deal;
use App\Models\Inbox;
use App\Models\Offer;
use App\Models\Permutation;
use App\Models\Progres;
use App\Models\setting;
use App\Models\Type;
use App\Models\User;
use App\Models\Detail;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Details(){
        $types = Detail::get();
        return view('detail',compact('types'));
    }
     
    public function index()
    {
        
        $count = View::count();
        $count_ofers = Offer::count();
        $count_deal = Deal::count();
        $users_count = User::count();
        $inboxes = Inbox::count();
        $inboxes_process = Inbox::where('inProgress',1)->count();
        $inboxes_end = Inbox::where('isDone',1)->count();
        $inboxes_process_mat = $inboxes_process - $inboxes_end;
        return view('home',compact('count','users_count','inboxes','inboxes_process_mat','inboxes_end','count_ofers','count_deal'));
    }

    public function users(){
        $users = User::select('id','name','email','password','permition','userStatus')->get();
        return view('admin.show-users',compact('users'));
    }

    public function createUser(){
        $groups = Permutation::select('id','title')->get();
        return view('admin.create.admin',compact('groups'));
    }

    public function createUserReq(Request $request){
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'password'=>'required'

            ]);

            $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'status' => $request->get('status'),
                'password' => $request->get('password'),
                'group_id' => $request->get('group_id')
            ];

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'status' => $data['status'],
                'group_id' => $data['group_id'],
                'password' => Hash::make($data['password']),
            ]);

            return redirect()->route('users');

    }

    public function deleteUsers(Request $request,$id){
        $delete_user = User::find($id);
        $delete_user->delete();
        return redirect()->route('users');
    }

    public function editeUsers(Request $request){
        $groups = Permutation::select('id','title')->get();
        $user = User::select('id','name','email','password','userStatus','permition')->where('id',$request->id)->first();
        return view('admin.edit-user',compact('user','groups'));
    }

    public function editeUsersForm(Request $request){
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = $request->oldpassword;
        $group_id = $request->group_id;
        $status = $request->status;
        if($request->password != ''){
            $password = Hash::make($request->password);
        }
        $user = User::find($id);
        $user->update([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'permition'=>$group_id,
            'userStatus'=>$status,
        ]);
        return redirect()->route('users');
    }

    public function showPermeation(){
        $groups = Permutation::select('id','title','canCreate','canEdit','canDelete','seeMessages')->get();
        return view('permation.index',compact('groups'));
    }

    public function createPermeation(){
        return view('permation.create');
    }

    public function createPermeationForm(Request $request){
        $request->validate([
            'title'=>'required'
        ]);

        $group = new Permutation([
            'title' => $request->title,
            'canCreate' => $request->canCreate,
            'canEdit' => $request->canEdit,
            'canDelete' => $request->canDelete,
            'seeMessages' => $request->seeMessages,
        ]);

        $group->save();

        return redirect()->route('show.permeation');
    }

    public function editPermeation($id){
        $group = Permutation::select('id','title','canCreate','canEdit','canDelete','seeMessages')->where('id',$id)->first();
        return view('permation.edite',compact('group'));
    }

    public function editPermeationForm(Request $request){
        $update_permation = Permutation::find($request->id);
        $update_permation->update($request->all());

        return redirect()->route('show.permeation');
    }

    public function types(){
        $types = Type::select('id','name')->get();
        return view('type.index',compact('types'));
    }

    public function createType(){
        return view('type.create');
    }

    public function createTypeForm(Request $request){
        Type::create([
           'name'=>$request->name,
        ]);
        return redirect()->route('types');
    }

    public function deleteType(Request $request){
        $delete_type = Type::find($request->id);
        $delete_type->delete();
        return redirect()->route('types');
    }

    public function editeType($id){
        $type = Type::select('id','name')->where('id',$id)->first();
        return view('type.edite',compact('type'));
    }

    public function editeTypeForm(Request $request){
        $id = $request->id;
        $name = $request->name;

        $update_type = Type::find($id);
        $update_type->update([
            'name'=>$name,
        ]);
        return redirect()->route('types');
    }

    public function ads(){
        $ads = Ad::select('id','image','isDeleted')->get();
        return view('ads.index',compact('ads'));
    }

    public function createAd(){
        return view('ads.create');
    }

    public function createAdForm(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'images/ads';
        $request->image->move($path,$file_name);

        Ad::create([
            'image'=>$file_name,
            'isDeleted'=>0
        ]);

        return redirect()->route('ads');
    }

    public function delReAd(Request $request){
        $isdeleted = $request->isdeleted;
        if ($isdeleted == 0){
            $num = 1;
        }else{
            $num = 0;
        }
        $update_ad = Ad::find($request->id);
        $update_ad->update([
            'isDeleted'=>$num,
        ]);
        return redirect()->route('ads');
    }

    public function editeAd($id){
        return view('ads.edite',compact('id'));
    }

    public function editeAdForm(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'images/ads';
        $request->image->move($path,$file_name);

        $update_ad = Ad::find($request->id);
        $update_ad->update([
            'image'=>$file_name,
        ]);

        return redirect()->route('ads');
    }

    public function createBot(){
        return view('bot.create');
    }

    public function createBotForm(Request $request){
        Bot::create([
            'question'=>$request->question,
            'answer'=>$request->answer,
            'isDeleted'=>0,
        ]);
        return redirect()->route('bots');
    }

    public function bots(){
        $bots = Bot::select('id','question','answer','isDeleted')->get();
        return view('bot.index',compact('bots'));
    }

    public function deleteBotForm(Request $request){
        $isdeleted = $request->isdeleted;
        if ($isdeleted == 0){
            $num = 1;
        }else{
            $num = 0;
        }
        $update_ad = Bot::find($request->id);
        $update_ad->update([
            'isDeleted'=>$num,
        ]);
        return redirect()->route('bots');
    }

    public function editeBot($id){
        $bot = Bot::select('id','question','answer')->where('id',$id)->first();
        return view('bot.edite',compact('bot'));
    }

    public function editeBotForm(Request $request){
        $id = $request->id;
        $question = $request->question;
        $answer = $request->answer;

        $update_bot = Bot::find($id);
        $update_bot->update([
            'question'=>$question,
            'answer'=>$answer,
        ]);
        return redirect()->route('bots');
    }

    public function bestHouse(){
        $best = BestHouse::select('id','title_ar','title_en','desc_ar','desc_en')->first();
        return view('best-house.index',compact('best'));
    }

    public function editeBestHouse(){
        $bests_new = BestHouse::select('id','title_ar','title_en','desc_ar','desc_en')->where('id',1)->get();
        return view('best-house.edite',compact('bests_new'));
    }

    public function editeBestHouseForm(Request $request){
        $id = $request->id;
        $title_ar = $request->title_ar;
        $title_en = $request->title_en;
        $desc_ar = $request->desc_ar;
        $desc_en = $request->desc_en;

        $update_best = BestHouse::find($id);
        $update_best->update([
            'title_ar'=>$title_ar,
            'title_en'=>$title_en,
            'desc_ar'=>$desc_ar,
            'desc_en'=>$desc_en,
        ]);

        return redirect()->route('best.house');
    }

    public function createProgress(){
        return view('progress.create');
    }

    public function createProgressForm(Request $request){
        $file_extension = $request->file('image')->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'images/icons';
        $request->image->move($path,$file_name);

        Progres::create([
            'title_ar'=>$request->title_ar,
            'title_en'=>$request->title_en,
            'num'=>$request->number,
            'image'=>$file_name,
            'isDeleted'=>0,
        ]);

        return redirect()->route('progress');
    }

    public function progress(){
        $progress = Progres::select('id','title_ar','title_en','num','image','isDeleted')->get();
        return view('progress.index', compact('progress'));
    }

    public function deleteProgressForm(Request $request){
        $isdeleted = $request->isdeleted;
        if ($isdeleted == 0){
            $num = 1;
        }else{
            $num = 0;
        }
        $update_progress = Progres::find($request->id);
        $update_progress->update([
            'isDeleted'=>$num,
        ]);
        return redirect()->route('progress');
    }

    public function editProgress($id){
        $progress = Progres::select('id','title_ar','title_en','num','image')->where('id',$id)->first();
        return view('progress.edit',compact('progress'));
    }

    public function editProgressForm(Request $request){
        $id = $request->id;
        $title_ar = $request->title_ar;
        $title_en = $request->title_en;
        $num = $request->num;
        $image = $request->old_image;
        if ($request->image != null ) {
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $path = 'images/icons';
            $request->image->move($path,$file_name);
            $image = $file_name;
        }
        $update_progress = Progres::find($id);
        $update_progress->update([
            'title_ar'=>$title_ar,
            'title_en'=>$title_en,
            'num'=>$num,
            'image'=>$image,
        ]);
        return redirect()->route('progress');
    }

    public function indexSetting(){
        $settings = setting::select(
            'id',
            'title',
            'whats_app_phone',
            'logo',
            'footer_description_en',
            'footer_description_ar',
            'meta_keywords',
            'fav_icon',
            'footer_copyRights_en',
            'footer_copyRights_ar',
            'footer_facebook',
            'footer_instagram',
            'footer_linkedin',
            'footer_snapchat',
            'bot_header_question_en',
            'bot_header_question_ar',
            'bot_footer_question_en',
            'bot_footer_question_ar' ,
            'bot_search_part_en',
            'bot_search_part_ar',
            'bot_welcome_message',
            'bot_closing_message'
        )->where('id',1)->get();
        return view('setting.index',compact('settings'));
    }

    public function editSetting()
    {
            $setting = Setting::find(1);
            return view('setting.edit', compact('setting'));
    }

    public function updateSetting(Request $request)
    {
            $setting = Setting::find(1);
            if($request->hasFile('logo')){
                $file_extension = $request->logo->getClientOriginalExtension();
                $file_name_logo = time().'.'.$file_extension;
                $path = 'images/logos';
                $request->logo->move($path,$file_name_logo);
                $setting->logo = $file_name_logo;
            }
            if($request->hasFile('fav_icon')){
                $file_extension = $request->fav_icon->getClientOriginalExtension();
                $file_name_fav_icon = time().'.'.$file_extension;
                $path = 'images/fav_icon';
                $request->fav_icon->move($path,$file_name_fav_icon);
                $setting->fav_icon = $file_name_fav_icon;
            }
            $setting->title = $request->title;
            $setting->email = $request->email;
            $setting->whats_app_phone = $request->whats_app_phone;
            $setting->footer_description_en = $request->footer_description_en;
            $setting->footer_description_ar = $request->footer_description_ar;
            $setting->footer_copyRights_en = $request->footer_copyRights_en;
            $setting->footer_copyRights_ar = $request->footer_copyRights_ar;
            $setting->footer_facebook = $request->footer_facebook;
            $setting->footer_instagram = $request->footer_instagram;
            $setting->footer_linkedin = $request->footer_linkedin;
            $setting->footer_snapchat = $request->footer_snapchat;
            //$setting->meta_keywords =  $request->meta_keywords;
            //$setting->meta_description =  $request->meta_description;
            $setting->bot_header_question_en =  $request->bot_header_question_en;
            $setting->bot_header_question_ar =  $request->bot_header_question_ar;
            $setting->bot_footer_question_en =  $request->bot_footer_question_en;
            $setting->bot_footer_question_ar =  $request->bot_footer_question_ar;
            $setting->bot_search_part_en =  $request->bot_search_part_en;
            $setting->bot_search_part_ar =  $request->bot_search_part_ar;
            $setting->bot_welcome_message =  $request->bot_welcome_message;
            $setting->bot_closing_message =  $request->bot_closing_message;
            $setting->show_bot =  $request->show_bot;
            $setting->show_ads =  $request->show_ads;
            $setting->show_filter =  $request->show_filter;
            $setting->project_desc_ar = $request->project_desc_ar;
            $setting->project_desc_en = $request->project_desc_en;
            $setting->save();
            return redirect()->route('setting');
    }

    public function showCity(){
        $citys = City::get();
        return view('city.index',compact('citys'));
    }

    public function deleteCity($id){
        $delete = City::find($id);
        $delete->delete();
        return redirect('/city');
    }

    public function createCity(){
        return view('city.create');
    }

    public function createCityForm(Request $request){
        City::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
        ]);
        return redirect('/city');
    }
}
