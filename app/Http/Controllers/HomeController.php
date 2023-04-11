<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', [
            'user' => $user
        ]);
    }

    public function dataupdate(Request $request)
    {
        $editedUser = (array) json_decode($request->user);
        unset($editedUser['updated_at']);
        unset($editedUser['created_at']);
        $user = User::where('id', $editedUser['id'])->update((array) $editedUser);
        return $user;
    }
}
