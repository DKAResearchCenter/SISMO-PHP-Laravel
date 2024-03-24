<?php

namespace App\Http\Controllers\Bidang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SMGT extends Controller
{
    public function Index(){

        $smgt = DB::table("bidang_smgt")->get();
        return view("bidang.SMGT.index", [
            'smgt' => $smgt,
            'session' => request()->session()->get("auth_login")
        ]);
    }

    public function Create(Request $request){

        $method = request()->method();
        switch ($method) {
            case "POST" :
                $requestData = $request->all();
                unset($requestData['_token']);
                $updated = DB::table("bidang_smgt")
                    ->insert($requestData);

                if ($updated == 1){
                    return redirect("/bidang/SMGT")
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
                return view("bidang.SMGT.create",[
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
                $updated = DB::table("bidang_smgt")
                    ->where('id',"=", $request->get("id"))
                    ->update($requestData);

                if ($updated === 1){
                    return redirect("/bidang/SMGT")
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
                    $smgt = DB::table("bidang_smgt")->where('id',"=",$id)->first();
                    if (!is_null($smgt)){
                        return response()->view("bidang.SMGT.edit",[
                            'smgt' => $smgt,
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
            $deletedAction = DB::table("bidang_smgt")->delete($idData);
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
