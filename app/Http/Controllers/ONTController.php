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

        if(!isset($output[2])){
            $out['info'] = $output[0];
        }
        else{
            $out['info'] = $output[2];
        }

        $response = strtolower(implode(' ', $output));
        $out['response'] = preg_match('/request timed out/', $response) || preg_match('/failure/i', $response) || preg_match('/host unreachable/i', $response) || preg_match('/could not find host/i', $response);
        return $out;
    }

    protected function updateStatusONT($id_ont, $status){
        $query = Ont::where('id_ont', $id_ont)->update(['status' => $status]);
        return $query;
    }

    protected function sendMessage($pesan){
        $id_bot = "1085134261";
        $id_channel = "-1001400850240";
        file_get_contents("https://api.telegram.org/bot5602074181:AAHrnXCUT45NmjOoatMmLEakhdVHtDkLV7U/sendMessage?chat_id=$id_channel&text=$pesan");
    }

    public function index(){
        $data = Ont::get();

        if(!empty($data)){
            $info = array();
            foreach($data as $ont){
                $id_ont = $ont['id_ont'];
                $ip_ont = $ont['ip_address_ont'];
                $sn_ont = $ont['sn_ont'];
                $site_id = $ont['site_id'];
                $type = $ont['type'];
                $status_ont = $ont['status'];
                $alamat = $ont['alamat'];
                $last = $ont['updated_at'];

                $output = $this->ping($ip_ont);
                if($output['response'] == true){
                    $status = 0;
                    if($this->updateStatusONT($id_ont, $status) > 0){
                        $text = <<<EOT
                        INFORMASI ONT UP%0AIP Address : %0A$ip_ont%0ASerial Number : %0A$sn_ont%0ASite ID : %0A$site_id%0ATipe Layanan : %0A$type%0ALokasi ONT : %0A$alamat%0AStatus : %0ATo be Offline🛑%0ALast Update : %0A$last
                        EOT;
                        $this->sendMessage($text);
                    }
                }
                else{
                    $status = 1;
                    if($status_ont != $status){
                        if($this->updateStatusONT($id_ont, $status) > 0){
                            $text = <<<EOT
                            INFORMASI ONT UP%0AIP Address : %0A$ip_ont%0ASerial Number : %0A$sn_ont%0ASite ID : %0A$site_id%0ATipe Layanan : %0A$type%0ALokasi ONT : %0A$alamat%0AStatus : %0ATo be Online🟢%0ALast Update : %0A$last
                            EOT;
                            $this->sendMessage($text);
                        }
                    }
                }
                array_push($info, $output['info']); 
            }  
        }
        return view('index', ['info'=>$info]);
    }

    public function getONT()
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
