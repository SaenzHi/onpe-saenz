<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnpeController extends Controller
{
    public function grupo_votacion($grupo_votacion)
    {
        $acta = DB::select("call sp_getGrupoVotacion(?)", [$grupo_votacion]);
        
        $success = isset($acta);
        $status = $success ? 200 : 404;

        $acta = [
            'success' => $success,
            'data' => $success ? $acta : null,
            'message' => $success ? 'Acta encontrada' : 'No existe esta acta',
            'status' => $status
        ];
        return response()->json($acta, $status);
    }
}
