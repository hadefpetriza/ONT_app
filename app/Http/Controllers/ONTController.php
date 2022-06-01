<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ont;

class ONTController extends Controller
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
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $data = Ont::get();

        return view('index', ["data"=>$data]);
    }

    public function addONT(Request $request)
    {
        $ont = new Ont();
        $ont->ip_address_ont = $request->ip_address;
        $ont->sn_ont = $request->sn_ont;
        $ont->site_id = $request->site_id;
        $ont->type = $request->type;
        $ont->alamat = $request->alamat;
        $ont->modified_by = Auth::user()->id;
        $ont->save();
    }

    public function deleteONT($id_ont){
        $ont = Ont::where('id_ont', $id_ont);
        $ont->delete();
    }
}
