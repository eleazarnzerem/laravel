<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 
use OpenAI\Laravel\Facades\OpenAI;

class AvatarController extends Controller
{
    protected function update(UpdateAvatarRequest $request){


        // $path = $request->file('avater')->store('avatar', 'public');
        $path = storage::disk('public')->put('avatar',$request->file('avater'));

        if ($oldAvatar = $request->user()->avater ) {
            Storage::disk('public')->delete($oldAvatar);
        }
        
        auth()->user()->update(['avater' => $path]);
        
       

       
        return redirect(route('profile.edit'))->with('message', 'image is uploaded successfully');
    }

    protected function generated(Request $request){

        $result = OpenAI::images()->create([
                // 'model' => 'gpt-3.5-turbo',
                // 'messages' => [
                // ['role' => 'user', 'content' => 'Hello!'],
                "model" => "dall-e-3",
                "prompt" => "create animated tech avatar for user",
                "n" => 1,
                "size" => "1024x1024",
        ]);

        $contents = file_get_contents($result->data[0]->url);

        $filename = Str::random(25);
        Storage::disk('public')->put("avatar/$filename.jpg",$contents);

        if ($oldAvatar = $request->user()->avater ) {
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avater' => "avatar/$filename.jpg" ]);



         return redirect(route('profile.edit'))->with('message', 'generated successfully');


        // Route::get('/openai', function (){

        //     $result = OpenAI::images()->create([
        //             // 'model' => 'gpt-3.5-turbo',
        //             // 'messages' => [
        //             // ['role' => 'user', 'content' => 'Hello!'],
        //             "model" => "dall-e-3",
        //             "prompt" => "create animated tech avatar for user",
        //             "n" => 1,
        //             "size" => "1024x1024",
        //     ]);
        
        //     // dd($result->data[0]->url);
            
        //     echo $result->choices[0]->message->content;
        // });
      }

}
