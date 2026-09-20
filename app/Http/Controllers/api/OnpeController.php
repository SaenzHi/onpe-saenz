<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnpeController extends Controller
{
    private function generarRespuesta($data, $clave, $msjExito, $msjError) {
        $success = !empty($data);
        $status = $success ? 200 : 404;

        return response()->json([
            "success" => $success,
            $clave => $success ? $data : null,
            "message" => $success ? $msjExito : $msjError,
            "status" => $status
        ], $status);
    }

    public function getGrupoVotacion($grupoVotacion) {
        $acta = DB::select("call sp_getGrupoVotacion(?)", [$grupoVotacion]);
        return $this->generarRespuesta($acta, 'acta', 'Acta encontrada', 'No existe esta acta');
    }

    public function isDepartamento($detalle) { 
        $departamento = DB::select("call sp_isDepartamento(?)", [$detalle]); 
        return $this->generarRespuesta($departamento, 'departamento', 'Departamento encontrado', 'No existe el departamento');
    }

    public function isProvincia($detalle) { 
        $provincia = DB::select("call sp_isProvincia(?)", [$detalle]); 
        return $this->generarRespuesta($provincia, 'provincia', 'Provincia encontrada', 'No existe la provincia');
    }

    public function getDepartamentos($inicio, $fin) { 
        $departamentos = DB::select("call sp_getDepartamentos(?, ?)", [$inicio, $fin]); 
        return $this->generarRespuesta($departamentos, 'departamentos', 'Departamentos encontrados', 'No existen los departamentos');
    }

    public function getProvincias($idDepartamento) { 
        $provincias = DB::select("call sp_getProvincias(?)", [$idDepartamento]); 
        return $this->generarRespuesta($provincias, 'provincias', 'Provincias encontradas', 'No existen las provincias');
    }

    public function getProvinciasByDepartamento($departamento) { 
        $provincias = DB::select("call sp_getProvinciasbyDepartamento(?)", [$departamento]); 
        return $this->generarRespuesta($provincias, 'provincias', 'Provincias encontradas', 'No existen las provincias');
    }

    public function getDistritos($idProvincia) { 
        $distritos = DB::select("call sp_getDistritos(?)", [$idProvincia]); 
        return $this->generarRespuesta($distritos, 'distritos', 'Distritos encontrados', 'No existen los distritos');
    }

    public function getDistritosByProvincia($provincia) { 
        $distritos = DB::select("call sp_getDistritosByProvincia(?)", [$provincia]); 
        return $this->generarRespuesta($distritos, 'distritos', 'Distritos encontrados', 'No existen los distritos');
    }

    public function getLocalesVotacion($idDistrito) { 
        $locales = DB::select("call sp_getLocalesVotacion(?)", [$idDistrito]); 
        return $this->generarRespuesta($locales, 'locales', 'Locales encontrados', 'No existen los locales');
    }

    public function getLocalesVotacionByDistrito($provincia, $distrito) { 
        $locales = DB::select("call sp_getLocalesVotacionByDistrito(?, ?)", [$provincia, $distrito]); 
        return $this->generarRespuesta($locales, 'locales', 'Locales encontrados', 'No existen los locales');
    }

    public function getGruposVotacion($idLocalVotacion) { 
        $grupos = DB::select("call sp_getGruposVotacion(?)", [$idLocalVotacion]); 
        return $this->generarRespuesta($grupos, 'grupos', 'Grupos encontrados', 'No existen los grupos');
    }

    public function getGruposVotacionByUbicacion($provincia, $distrito, $local) { 
        $grupos = DB::select("call sp_getGruposVotacionByProvinciaDistritoLocal(?, ?, ?)", [$provincia, $distrito, $local]); 
        return $this->generarRespuesta($grupos, 'grupos', 'Grupos encontrados', 'No existen los grupos');
    }

    public function getGrupoVotacionDetalle($departamento, $provincia, $distrito, $local, $grupo) { 
        $acta = DB::select("call sp_getGrupoVotacionByProvinciaDistritoLocalGrupo(?, ?, ?, ?, ?)", [$departamento, $provincia, $distrito, $local, $grupo]); 
        return $this->generarRespuesta($acta, 'acta', 'Acta encontrada', 'No existe esta acta');
    }

    public function getVotos($inicio, $fin) { 
        $votos = DB::select("call sp_getVotos(?, ?)", [$inicio, $fin]); 
        return $this->generarRespuesta($votos, 'votos', 'Votos encontrados', 'No existen votos');
    }

    public function getVotosByDepartamento($departamento) { 
        $votos = DB::select("call sp_getVotosDepartamento(?)", [$departamento]); 
        return $this->generarRespuesta($votos, 'votos', 'Votos encontrados', 'No existen votos');
    }

    public function getVotosByProvincia($provincia) { 
        $votos = DB::select("call sp_getVotosProvincia(?)", [$provincia]); 
        return $this->generarRespuesta($votos, 'votos', 'Votos encontrados', 'No existen votos');
    }

    public function getDistritosByDepartamento($departamento) { 
        $distritos = DB::select("call sp_getDistritosDepartamento(?)", [$departamento]); 
        return $this->generarRespuesta($distritos, 'distritos', 'Distritos encontrados', 'No existen los distritos');
    }

    public function getLocalesVotacionByDepartamento($departamento) { 
        $locales = DB::select("call sp_getLocalesVotacionDepartamento(?)", [$departamento]); 
        return $this->generarRespuesta($locales, 'locales', 'Locales encontrados', 'No existen los locales');
    }
    
}