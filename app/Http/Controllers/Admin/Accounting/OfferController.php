<?php

namespace App\Http\Controllers\Admin\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('pages/accounting/offers', compact('offers'));
    }

    public function getActiveOffer($id)
    {
        $offers = Offer::where('id', $id)
          ->update(['status' => 0]);
        return back();
    }

    public function getUnactiveOffer($id)
    {
        $offers = Offer::where('id', $id)
          ->update(['status' => 1]);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->name = $request->name;
        $offer->amount = $request->amount;
        $offer->month_count = $request->month_count;
        $offer->type = $request->type;

        $offer->save();
        return back();
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
        //
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
        $offer = Offer::find($id);
        $offer->name = $request->upname;
        $offer->amount = $request->upamount;
        $offer->month_count = $request->upmonth_count;
        $offer->type = $request->uptype;

        $offer->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::find($id)->delete();
        return back();
    }
}
