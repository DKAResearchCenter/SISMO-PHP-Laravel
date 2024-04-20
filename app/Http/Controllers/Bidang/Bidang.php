<?php

namespace App\Http\Controllers\Bidang;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class Bidang extends Controller
{
    public function Index(){

        $session = request()->session()->get("auth_login");
        if ($session->level_access === "ADMIN"){
            $bidang = DB::table("bidang")->get();
            return view("bidang.index", [
                'bidang' => $bidang,
                'session' => request()->session()->get("auth_login"),
                'title' => 'Data Program Kerja'
            ]);
        }else{
            $bidang = DB::table("bidang")->where(
                "bidang", $session->bidang
            )->get();
            return view("bidang.index", [
                'bidang' => $bidang,
                'session' => request()->session()->get("auth_login"),
                'title' => "Data Program Kerja ".$session->bidang
            ]);
        }
    }

    public function Create(Request $request){

        $method = request()->method();
        switch ($method) {
            case "POST" :
                $requestData = $request->all();
                unset($requestData['_token']);
                $session = request()->session()->get("auth_login");
                $requestData = array_merge($requestData, array(
                    'id_user' => $session->id,
                    'created_at' => date("Y-m-d H:i:s"),
                ));

                $updated = DB::table("bidang")
                    ->insert($requestData);

                if ($updated == 1){
                    return redirect("/bidang")
                        ->with("status", array(
                            'status' => true,
                            'code' => 200,
                            'msg' => "Berhasil menyimpan data"
                        ));
                }else{
                    return redirect()
                        ->back()
                        ->with("status", array(
                            'status' => false,
                            'code' => 400,
                            'msg' => $requestData
                        ));
                }
            default :
                return view("bidang.create",[
                    'session' => request()->session()->get("auth_login"),
                    'status' => session()->has("status") ? session()->get("status") : null
                ]);
        }
    }

    public function Edit(Request $request){
        $method = request()->method();
        switch ($method){
            case "POST" :

                $requestData = $request->all();
                unset($requestData['_token']);
                $session = request()->session()->get("auth_login");
                $requestData = array_merge($requestData, array(
                    'id_user' => $session->id,
                    'created_at' => date("Y-m-d H:i:s"),
                ));

                $updated = DB::table("bidang")
                    ->where('id',"=", $request->get("id"))
                    ->update($requestData);

                if ($updated === 1){
                    return redirect("/bidang")
                        ->with("status", array(
                            'status' => true,
                            'code' => 200,
                            'msg' => "Berhasil Mengupdate data"
                        ));
                }else{
                    //return response()->json($requestAll);
                    return redirect()
                        ->back()
                        ->with("status", array(
                            'status' => false,
                            'code' => 400,
                            'msg' => "Gagal mengupdate Data"
                        ));
                }
            default :
                if ($request->has('id')) {
                    $id = $request->input('id');
                    $bidang = DB::table("bidang")->where('id',"=",$id)->first();
                    if (!is_null($bidang)){
                        return response()->view("bidang.edit",[
                            'bidang' => $bidang,
                            'session' => request()->session()->get("auth_login"),
                            'status' => session()->has("status") ? session()->get("status") : null
                        ]);
                    }else{
                        abort(404, "ID Data Tidak Ditemukan");
                    }
                }else{
                    abort(400, "Metode Tidak Diperbolehkan");
                }
        }
    }

    public function Delete(Request $request){
        if ($request->has("id")){
            $idData = $request->input("id");
            $deletedAction = DB::table("bidang")->delete($idData);
            if ($deletedAction !== null){
                return response()->json(
                    array(
                        'status' => true,
                        'code' => 200,
                        'msg' => 'Berhasil Menghapus Data'
                    )
                );
            }else{
                return response()->json(
                    array(
                        'status' => false,
                        'code' => 404,
                        'msg' => 'Gagal Menghapus Data'
                    )
                );
            }
        }else{
            return response()->json(
                array(
                    'status' => false,
                    'code' => 400,
                    'msg' => 'require id data'
                )
            );
        }
    }
}
