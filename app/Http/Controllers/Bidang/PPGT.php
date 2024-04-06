<?php

namespace App\Http\Controllers\Bidang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PPGT extends Controller
{
    public function Index(){

        $ppgt = DB::table("bidang_ppgt")->get();
        return view("bidang.PPGT.index", [
            'ppgt' => $ppgt,
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

                $updated = DB::table("bidang_ppgt")
                    ->insert($requestData);

                if ($updated == 1){
                    return redirect("/bidang/PPGT")
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
                return view("bidang.PPGT.create",[
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
                $updated = DB::table("bidang_ppgt")
                    ->where('id',"=", $request->get("id"))
                    ->update($requestData);

                if ($updated === 1){
                    return redirect("/bidang/PPGT")
                        ->with("status", array(
                            'status' => true,
                            'code' => 200,
                            'msg' => "Berhasil Mengupdate data"
                        ));
                }else{
                    return redirect()
                        ->back()
                        ->with("status", array(
                            'status' => false,
                            'code' => 400,
                            'msg' => "Gagal Mengupdate data atau data tidak berubah"
                        ));
                }
            default :
                if ($request->has('id')) {
                    $id = $request->input('id');
                    $ppgt = DB::table("bidang_ppgt")->where('id',"=",$id)->first();
                    if (!is_null($ppgt)){
                        return response()->view("bidang.PPGT.edit",[
                            'ppgt' => $ppgt,
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
            $deletedAction = DB::table("bidang_ppgt")->delete($idData);
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
