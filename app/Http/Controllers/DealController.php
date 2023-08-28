<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use App\Models\Deal;
use App\Models\Offer;

class DealController extends Controller
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
        $deals = DB::table('deals')
        ->Join('users', 'users.id', '=', 'deals.user_id')
        ->Join('offers', 'offers.id', 'deals.offer_id')
        ->select(
            'deals.id as dealID',
            'deals.client_name as dealClientName',
            'deals.client_email as dealClientEmail',
            'deals.client_phone as dealClientPhone',
            'users.name as userName',
            'offers.title_ar as offerTitle',
            'offers.price as offerPrice'
            )
        ->orderBy('dealID', 'DESC')->get();
        return view('deals.index',compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $offers = Offer::where('isDeleted', 0)->get();
            return view('deals.create', compact('offers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'client_name'=>'required',
                'client_email'=>'required',
                'client_phone'=>'required',
                'offer_id'=>'required'
            ]);

            $deal = new Deal([
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'offer_id' => $request->offer_id,
                'user_id' => Auth::user()->id
            ]);
            $deal->save();
            return redirect('deals');

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
            $deal = Deal::where('id', '=', $id)->first();
            $offers = Offer::orderBy('id', 'DESC')->get();
            return view('deals.edit',compact('deal', 'offers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
            $request->validate([
                'client_name'=>'required',
                'client_email'=>'required',
                'client_phone'=>'required',
                'offer_id'=>'required'
            ]);

            $deal = Deal::find($id);
            $deal->client_name = $request->client_name;
            $deal->client_email = $request->client_email;
            $deal->client_phone = $request->client_phone;
            $deal->offer_id = $request->offer_id;
            $deal->save();
            return redirect('deals');

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
