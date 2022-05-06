<?php

namespace App\Http\Controllers;


use App\Models\Company;
use App\Models\User;
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
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $c = User::whereRelation('fields', 'user_id', $this->user->id);
        $res = new Company;
        $view =
            [
                'lists' => $res->simplePaginate(3)
            ];



        return view('home', ['lists' => $view['lists']]);

    }
}
