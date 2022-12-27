<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        return view('pages.admin.kamar.index', [
            'rooms' => Room::all()
        ]);
    }
    public function create(Request $request){
        return view('pages.admin.kamar.create');
    }
    public function store(Request $request)
    { 
        $request->validate([
            'room_number' => 'required|max:255',
            'floor_number' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
            'room_status'=> 'required|max:255'

        ]);
        // dd($request->price);

        Room::create([
            'room_number' => $request->room_number,
            'floor_number' => $request->floor_number,
            'price' => $request->price,
            'description' => $request->description,
            'room_status'=> $request->room_status
        ]);
        return redirect()->route('kamar')->with('success', 'Room created succesfully.');
    }
    public function hapus($id)
    {
        $kamar = Room::find($id);
        $kamar->delete();

        return redirect()->route('kamar');
    }
    public function edit($id)
    {
        $room = Room::findOrfail($id);
        // dd($room);
        return view('pages.admin.kamar.edit', compact('room'));
        
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_number' => 'required|max:255',
            'floor_number' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
            'room_status'=> 'required|max:255'

        ]);
        // dd($request);
        Room::where('id', $id)
        ->update([
            'room_number' => $request->room_number,
            'floor_number' => $request->floor_number,
            'price' => $request->price,
            'description' => $request->description,
            'room_status'=> $request->room_status
        ]);
        return redirect()->route('kamar');
    }
}
