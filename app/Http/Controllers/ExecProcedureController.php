<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExecProcedureController extends Controller
{
    public function execProcedure()
    {
        //DB::select('exec my_stored_procedure(?,?,..)',array($Param1,$param2));
    }
}
