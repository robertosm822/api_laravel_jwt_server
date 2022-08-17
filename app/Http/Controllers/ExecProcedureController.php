<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ExecProcedureController extends Controller
{
     /**
     * Resgatar dados passados como parametro no JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function execProcedure(Request $request)
    {
        $json_response = $request->all();
        
        
        //executando a procedure no Sql Server Remoto
        $consulta_proc =[];
        try {
            //recuperar apenas array com os parametros
            $parameters = $json_response['parameters'];
            $arr_params = [];
            foreach ($parameters as $value) {
                array_push($arr_params, $value);
            }  
            //tratar os parametros para retornar apenas separados por virgula
            $josn_parametros =   json_encode($arr_params, JSON_PRETTY_PRINT);
            $str_string = str_replace("[", "", $josn_parametros);
            $str_params = str_replace("]", "", $str_string);
            $consulta_proc = DB::select("exec {$json_response['procName']} {$str_params};");
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th], 400);
        }
        
       
        return response()->json([
            "success" => true,
            "message" => "Consulta a procedure {$json_response['procName']} bem sucedida",
            "data" =>  $consulta_proc 
        ], Response::HTTP_OK);
    }
}
