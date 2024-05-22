<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    protected function update(UpdateAvatarRequest $request){
        
     
        dd($request->file('avater')->store('avatar'));
       
        return redirect(route('profile.edit'))->with('message', 'image is uploaded successfully');
    }

}
