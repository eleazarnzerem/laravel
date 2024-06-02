<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    protected function update(UpdateAvatarRequest $request){
        
        $path = $request->file('avater')->store('avatar', 'public');

        if ($oldAvatar = $request->user()->avater ) {
            Storage::disk('public')->delete($oldAvatar);
        }
        
        auth()->user()->update(['avater' => $path]);
        
       

       
        return redirect(route('profile.edit'))->with('message', 'image is uploaded successfully');
    }

}
