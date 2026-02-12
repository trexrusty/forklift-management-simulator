<?php

namespace App\Http\Controllers\GameState;

use App\Http\Controllers\Controller;
use Native\Desktop\Facades\Window;
use Illuminate\Http\Request;
use App\Models\Save;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

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
            return Inertia::render('loader', ['saves' => $saves]);
        }
    }


    public function selectSave(Request $request)
    {
        Session::put('save_id', $request->save_id);
        return to_route('test');
    }


    public function goHome()
    {
        Session::forget('save_id');

        return to_route('index');
    }
}
