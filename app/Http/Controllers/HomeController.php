<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $room_price = Room::select(DB::raw('min(price) as price'))->first();
        $get_price = $room_price->price;
        $yearly_price = 12 * $room_price->price * 7.64/100;
        return view('home', compact('get_price', 'yearly_price'));
    } 

    public function getfloor(Request $request){
        $floor_number = $request->getfloor;
        $rooms = Room::where([['floor_number', $floor_number], ['room_status', 'Ada']])->get();

        return json_encode($rooms);
    }


}
