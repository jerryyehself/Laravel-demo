<?php

namespace App\Http\Controllers;


use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactList;
use Illuminate\Support\Facades\DB;


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
        
        $response_companies = DB::table('contact_lists')
        ->select('contact_lists.id AS list_id','companies.*','companies.name AS company_name','fields.name AS field_name')
        ->join('companies', 'companies.id', 'contact_lists.company_id')
        ->join('users', 'users.id',  'contact_lists.user_id')
        ->join('fields', 'fields.id', 'contact_lists.field_id')
        ->where('user_id', $this->user->id)
        ->where('contact_lists.deleted_at','=',null)
        ->get();
       
        $view =
            [
                // 'lists' => $res->simplePaginate(3)
                'lists' => $response_companies
            ];

        // dd( $response_companies[0]);

        return view('home', ['lists' => $view['lists']]);

    }
}
