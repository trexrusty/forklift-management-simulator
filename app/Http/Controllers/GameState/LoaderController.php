<?php

namespace App\Http\Controllers\GameState;

use App\Http\Controllers\Controller;
use Native\Desktop\Facades\Window;
use Illuminate\Http\Request;
use App\Models\Save;
use Illuminate\Support\Facades\Session;

class LoaderController extends Controller
{
    public function index()
    {
        if (Session::has('save_id') && Save::find(Session::get('save_id'))) {
            return to_route('test');
        }
        else {
            Session::forget('save_id');
            $saves = Save::orderBy('created_at', 'desc')->get();
            return view('loader', compact('saves'));
        }
    }


    public function selectSave(Save $save)
    {
        Session::put('save_id', $save->id);
        return to_route('test');
    }
}
