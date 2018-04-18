<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distro;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DistroController extends Controller
{
    public function index()
    {
        return view('distro.index');
    }

    public function getAll()
    {
        $distros = Distro::paginate(2);
        return view('distro.all', ['distros' => $distros]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image'
        ]);

        $distro = new Distro();
        $distro->name = $request->name;
        $user = Auth::user();

        DB::transaction(function() use($distro,$user) {
            $distro->user()->associate($user);
            $distro->save();
        });
        $image = $request->file('image');


        if ($image){
            $name = $distro->id.'.'.$image->getClientOriginalExtension();
            $path= 'public/images';
            $distro->image_path = 'images/'.$name;
            $distro->save();
            $image->storeAs($path, $name);
        }


        return response()->json([
            'message' => 'La distro '.$distro->name.' fue agregada.'
        ]);
    }

    public function list()
    {
        $distros = Auth::user()->distro;
        return view('distro.list', ['distros' => $distros]);
    }

    public function show(Distro $distro)
    {
        return response()->json($distro);
    }

    public function update(Request $request)
    {

        $distro = Distro::find($request->id);
        $distro->name = $request->name;
        $distro->save();
        $image = $request->file('image');

        if ($image){
            $name = $distro->id.'.'.$image->getClientOriginalExtension();
            $path= 'public/images';
            $image->storeAs($path, $name);
            if ($distro->image_path == null){
                $distro->image_path = 'images/'.$name;
                $distro->save();
            }
        }

        return response()->json([
            'message' => 'La distro fue actualizada.'
        ]);
    }

    public function delete(Distro $distro)
    {
        if ($distro->image_path){
            Storage::delete('public/'.$distro->image_path);
        }
        $distro->delete();
        return response()->json([
            'message' => 'La distro se elimino.'
        ]);
    }
}
