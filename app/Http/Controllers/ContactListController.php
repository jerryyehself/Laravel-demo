<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ContactList;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ContactListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = new ContactList;
        $view = [
            'lists' => $res->all()
        ];

        return redirect()->route('home')->with(['lists' => $view['lists']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;

        $company->name = $request->companytitle;
        $company->contact_person = $request->companywindow;
        $company->site = $request->companysite;
        $company->email = $request->companyemail;
        $company->phone = $request->companyphone;

        $company->save();

        return redirect()
            ->route('home')
            ->with(
                [
                    'status' => $company->name . '新增成功'
                ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = new Company;

        $company->find($id)->update([
            'name' => $request->companytitleupdate,
            'contact_person' => $request->companywindowupdate,
            'site' => $request->companysiteupdate,
            'email' => $request->companyemailupdate,
            'phone' => $request->companyphoneupdate
        ]);

        return redirect()->route('home')->with(['status' => '已修改' . $company->find($id)->name . '的相關資料資料']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = new Company;
        $target = $company->find($id)->first()->name;
        $company->destroy($id);
        // dd($company->find($id)->first()->site);
        return redirect()->route('home')->with(['status' => '已刪除1筆資料：' . $target]);
    }
}
