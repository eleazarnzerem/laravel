<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    // $users = DB::select( 'select * from users');

    // insert or create

    // $user =DB::insert('insert into users (name,email,password) value (?,?,?)', ['charles','elezarnze@gmail.com', 'pass1234'] );


    // $user = DB::scalar(
    //     "select count(case when name = 'Eleazar' then 1 end) as two from users"
    // );

    // update
    // $user = DB::update(
    //     "update users set name = 'kelvin' where id = ?", ['1']
    // );

    
    // delete
    // $user = DB::delete('delete from users where id in (?,?,?)', [2, 4, 6]);


            // QUARY BUILDER
    

    $users  = DB::table('users')->get();

    // $users  = DB::table('users')->where('id',1)->get();
    



    // $user = DB::table('users')->insert([
    //         [
    //             'name' => 'Blessing',
    //             'email' => 'blessing@gmail.com',
    //             'password' => 'pass1234',
    //         ],
    //         [
    //             'name' => 'kelvin2',
    //             'email' => 'kelvin2@gmail.com',
    //             'password' => 'pass1234',
    //         ],

    //  ]);

    // $user = DB::table('users')->first('name');

    // UPDATE
    

    dd($user);
    // dd($users);
    // return view('display',['users' => $users]);

    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
