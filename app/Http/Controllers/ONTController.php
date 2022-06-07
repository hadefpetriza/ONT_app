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

    protected function ping($ip){
        exec("ping -n 1 $ip", $output);

        $response = strtolower(implode(' ', $output));
        $response = preg_match('/request timed out/', $response) || preg_match('/failure/i', $response) || preg_match('/host unreachable/i', $response) || preg_match('/could not find host/i', $response);

        return $response;
    }

    protected function updateStatusONT($id_ont, $status){
        
        $query = Ont::where('id_ont', $id_ont)->update(['status' => $status]);
        return $query;
    }

    public function index()
    {
        $data = Ont::get();
        if($data){
            return response()->json([
                'status'=>200,
                'data' => $data,
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
            ]);
        }
        
        // if(!empty($data)){
        //     foreach($data as $x){
        //         if($this->ping($x['id_ont'])){
        //             $status = 0;
        //             if($x['status'] != $status){
        //                 $this->updateStatusONT($x['id_ont'], $status);
        //             }
        //         }
        //         else{
        //             $status = 1;
        //             if($x['status'] != $status){
        //                 $this->updateStatusONT($x['id_ont'], $status);
        //             }
        //         }
        //     }
        // }
           
        // return view('index', ["data"=>$data]);
    }

    public function addONT(Request $request)
    {
        $ont = new Ont();
        $ont->ip_address_ont = trim($request->ip_address);
        $ont->sn_ont = trim($request->sn_ont);
        $ont->site_id = trim($request->site_id);
        $ont->type = trim($request->type);
        $ont->alamat = trim($request->alamat);
        $ont->modified_by = Auth::user()->id;
        $result = $ont->save();

        if($result == true){
            return response()->json([
                'status'=>200
            ]);
        }
        else{
            return response()->json([
                'status'=>400
            ]);
        }

    }

    public function deleteONT($id_ont)
    {
        $ont = Ont::where('id_ont', $id_ont);
        $result = $ont->delete();

        if($result == true){
            return response()->json([
                'status'=>200
            ]);
        }
        else{
            return response()->json([
                'status'=>400
            ]);
        }
    }

    public function showONT($id_ont)
    {
        $ont = Ont::where('id_ont', $id_ont)->get();
        return response()->json($ont);
    }

    public function updateONT(Request $request)
    {
        $ont = Ont::where('id_ont', $request->id_ont)
            ->update([
                    'ip_address_ont' => trim($request->ip_address),
                    'sn_ont' => trim($request->sn_ont),
                    'site_id' => trim($request->site_id),
                    'type' => trim($request->type),
                    'alamat' => trim($request->alamat),
        ]);
    
        if($ont == true){
            return response()->json([
                'status'=>200
            ]);
        }
        else{
            return response()->json([
                'status'=>400
            ]);
        }
    }
}
