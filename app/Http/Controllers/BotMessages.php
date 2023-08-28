<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\Ad;
use App\Models\Setting;
use App\Models\HomeSlider;
use App\Models\ProjectPage;
use Illuminate\Http\Request;

class BotMessages extends Controller
{
    public function index(){
        $bot = Bot::select('id','question','answer')->get();
        return response()->json([
            'status'=>true,
            'msg'=>'api bot',
            'data'=>[
                'start-message'=>\App\Models\setting::getSetting()->bot_welcome_message,
                'messages'=>$bot,
                'end-message'=>\App\Models\setting::getSetting()->bot_closing_message
            ],
        ]);
    }
    
    public function ads(){
        $ads = Ad::get();
        return response()->json([
            'status'=>true,
            'msg'=>'api bot',
            'data'=>[
                'ads'=>$ads,
            ],
        ]);
    }
    
    public function sliders(){
        $home = HomeSlider::get();
        $project = ProjectPage::get();
        return response()->json([
            'status'=>true,
            'msg'=>'api bot',
            'home'=>$home,
            'project'=>$project,
        ]);
    }
}
