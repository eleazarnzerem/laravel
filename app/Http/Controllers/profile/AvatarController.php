<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    protected function update(Request $request){
        // $request->validate([
        //     'avater' => 'required | image'
        // ]);
        // return response()->redirectTo(route('profile.edit'));
        return back()->with(['message','Avatar is changed']);
    }

}
