<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Sector;
use App\Models\Nivel;
use App\Models\Modalidad;
use App\Models\Ambito;

use Illuminate\Http\Response;

use App\Exceptions\EmptyException;


class OpcionesEstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function indexTurno() : Response
    {
        $Turnos = Turno::get();

        if($Turnos->isEmpty()) throw new EmptyException();

        return response($Turnos, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function indexSector() : Response
    {
        $Sectors = Sector::get();

        if($Sectors->isEmpty()) throw new EmptyException();

        return response($Sectors, 200);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function indexNivel() : Response
    {
        $Nivels = Nivel::get();

        if($Nivels->isEmpty()) throw new EmptyException();

        return response($Nivels, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function indexModalidad() : Response
    {
        $Modalidads = Modalidad::get();

        if($Modalidads->isEmpty()) throw new EmptyException();

        return response($Modalidads, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function indexAmbito() : Response
    {
        $Ambitos = Ambito::get();

        if($Ambitos->isEmpty()) throw new EmptyException();

        return response($Ambitos, 200);
    }

}
