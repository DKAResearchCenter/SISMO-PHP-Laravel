<?php

namespace App\Http\Controllers\Bidang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PKBGT extends Controller
{
    public function Index(){

        $pkbgt = DB::table("bidang_pkbgt")->get();
        return view("bidang.PKBGT.index", [
            'pkbgt' => $pkbgt,
            'session' => request()->session()->get("auth_login")
        ]);
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

                $updated = DB::table("bidang_pkbgt")
                    ->insert($requestData);

                if ($updated == 1){
                    return redirect("/bidang/PKBGT")
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
                return view("bidang.PKBGT.create",[
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

                $updated = DB::table("bidang_pkbgt")
                    ->where('id',"=", $request->get("id"))
                    ->update($requestData);

                if ($updated === 1){
                    return redirect("/bidang/PKBGT")
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
                    $pkbgt = DB::table("bidang_pkbgt")->where('id',"=",$id)->first();
                    if (!is_null($pkbgt)){
                        return response()->view("bidang.PKBGT.edit",[
                            'SMGT' => $pkbgt,
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
            $deletedAction = DB::table("bidang_pkbgt")->delete($idData);
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
