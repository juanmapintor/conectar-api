<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Turno;
use App\Models\Zona;
use App\Models\Telefonoestablecimiento;
use App\Models\Sector;
use App\Models\Modalidad;
use App\Models\Ambito;
use App\Models\Nivel;
use App\Models\Domicilio;
use App\Models\Establecimiento;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Exception;
use App\Exceptions\EmptyException;
use App\Exceptions\InexistentException;
use Illuminate\Support\Arr;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function index(): Response
    {
        $establecimientos = Establecimiento::get();

        if ($establecimientos->isEmpty()) throw new EmptyException('No hay establecimientos para mostrar');

        return response($establecimientos, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     * @throws InexistentException
     */
    public function show(int $id): Response
    {
        $establecimiento = Establecimiento::find($id);

        if (!$establecimiento) throw new InexistentException('El establecimiento solicitado no existe');

        $establecimiento->ambito;
        $establecimiento->domicilio;
        $establecimiento->nivel;
        $establecimiento->sector;
        $establecimiento->modalidad;
        $establecimiento->zona;
        $establecimiento->ofertas;
        $establecimiento->turnos;
        $establecimiento->telefonoestablecimientos;

        return response($establecimiento, 200);
    }

    /**
     * Guarda una nueva instancia de un establecimiento.
     * El proceso para guardar una nueva instancia de un establecimiento es el siguiente:
     * 
     * IMPORTANTE: Ofertas, Turnos, Zonas, Sectores, Modalidades, Ambitos, Niveles YA DEBEN HABER SIDO CREADOS.
     * De estas entidades se recibira solamente su ID.
     * 
     * 1 - Se crea primeramente el domicilio, con los datos provistos. 
     * 2 - Se crea el establecimiento, asignando el domicilio anteriormente creado.
     * 3 - Se procede a crear los telefonos que llegaran en un arreglo llamado "telefonos".
     * 4 - Luego se repite lo mismo con ofertas y turnos.
     *
     * @param Request $request
     * @return Response
     * @throws InexistentException
     */
    public function store(Request $request): Response
    {
        //Validacion de la Request
        $request->validate([
            //Datos correspondientes a Domicilio
            'provincia' => 'required|string',
            'departamento' => 'required|string',
            'cod_postal' => 'required|string',
            'calle' => 'required|string',
            'localidad' => 'string',
            'barrio' => 'string',
            'numero' => 'string',
            'cardinalidad' => 'string',
            'observacion' => 'string',

            //Datos correspondientes a Establecimiento
            'cue' => 'required|string',
            'nombre' => 'required|string',
            'sectorID' => 'required|integer',
            'modalidadID' => 'required|integer',
            'ambitoID' => 'required|integer',
            'nivelID' => 'required|integer',
            'zonaID' => 'required|integer',
            'matricula' => 'integer',
            'mail' => 'string|email',
            'horario' => 'string',

            //Telefonos
            'telefonos' => 'array',

            //Ofertas y Turnos
            'ofertas' => 'required|array|min:1',
            'turnos' => 'required|array|min:1'

        ]);

        //Chequeamos que existan sector, modalidad, ambito y niveles especificados
        $sector = Sector::find($request['sectorID']);
        if (!$sector) throw new InexistentException('El sector solicitado para editar no existe');

        $modalidad = Modalidad::find($request['modalidadID']);
        if (!$modalidad) throw new InexistentException('La modalidad solicitada para editar no existe');

        $ambito = Ambito::find($request['ambitoID']);
        if (!$ambito) throw new InexistentException('El ambito solicitado para editar no existe');

        $nivel = Nivel::find($request['nivelID']);
        if (!$nivel) throw new InexistentException('El nivel solicitado para editar no existe');

        //Primeramente, creamos el Domicilio
        $fieldsDomicilio = [
            'provincia' => $request['provincia'],
            'departamento' => $request['departamento'],
            'cod_postal' => $request['cod_postal'],
            'calle' => $request['calle'],
            'localidad' => !$request['localidad'] ? null : $request['localidad'],
            'barrio' => !$request['barrio'] ? null : $request['barrio'],
            'numero' => !$request['numero'] ? null : $request['numero'],
            'cardinalidad' => !$request['cardinalidad'] ? null : $request['cardinalidad'],
            'observacion' => !$request['observacion'] ? null : $request['observacion'],
        ];

        $domicilio = Domicilio::create($fieldsDomicilio);

        if (!$domicilio) throw new Exception('No se pudo crear el domicilio');

        //Procedemos a crear el Establecimiento
        $fieldsEstablecimiento = [
            'cue' => $request['cue'],
            'nombre' => $request['nombre'],
            'sectorID' => $request['sectorID'],
            'modalidadID' => $request['modalidadID'],
            'ambitoID' => $request['ambitoID'],
            'nivelID' => $request['nivelID'],
            'zonaID' => $request['zonaID'],
            'domicilioID' => $domicilio['domicilioID'],
            'matricula' => !$request['matricula'] ? null : $request['matricula'],
            'mail' => !$request['mail'] ? null : $request['mail'],
            'horario' => !$request['horario'] ? null : $request['horario']
        ];

        $establecimiento = Establecimiento::create($fieldsEstablecimiento);

        if (!$establecimiento) {
            Domicilio::destroy($domicilio['domicilioID']);
            throw new Exception('No se pudo crear el establecimiento');
        }

        //Una vez creado el establecimiento, creamos los telefonos del establecimiento.
        $errores = [];
        foreach ($request['telefonos'] as $telefono) {
            if (Arr::has($telefono, ['telefono'])) {
                $fieldTelefono = [
                    'telefono' => $telefono['telefono'],
                    'establecimientoID' => $establecimiento['establecimientoID']
                ];
                if (Arr::has($telefono, ['tipo']) && ($telefono['tipo'] == 'fijo' || $telefono['tipo'] == 'movil')) {
                    $fieldTelefono['tipo'] = $telefono['tipo'];
                }
                $nuevoTelefono = Telefonoestablecimiento::create($fieldTelefono);

                if (!$nuevoTelefono) array_push($errores, 'Error al insertar el telefono: ' . $telefono['telefono']);
            } else {
                array_push($errores, 'Error al insertar un telefono: Elemento mal formado.');
            }
        }

        //Checkeamos los IDs de ofertas y de turnos
        $turnosIDs = $request['turnos'];
        $turnosAgregar = [];
        foreach ($turnosIDs as $turnoID) {
            if (!Turno::find($turnoID)) {
                array_push($errores, 'No existe el turno con ID: ' . $turnoID);
            } else {
                array_push($turnosAgregar, $turnoID);
            }
        }

        if (count($turnosAgregar) > 0) $establecimiento->turnos()->attach($turnosAgregar);

        $ofertasIDs = $request['ofertas'];
        $ofertasAgregar = [];
        foreach ($ofertasIDs as $ofertaID) {
            if (!Oferta::find($ofertaID)) {
                array_push($errores, 'No existe el oferta con ID: ' . $ofertaID);
            } else {
                array_push($ofertasAgregar, $ofertaID);
            }
        }

        if (count($ofertasAgregar) > 0) $establecimiento->ofertas()->attach($ofertasAgregar);

        //Completamos el establecimiento
        $establecimiento->ambito;
        $establecimiento->domicilio;
        $establecimiento->nivel;
        $establecimiento->sector;
        $establecimiento->modalidad;
        $establecimiento->zona;
        $establecimiento->ofertas;
        $establecimiento->turnos;
        $establecimiento->telefonoestablecimientos;

        if (count($errores) > 0) return response(['errores' => $errores, 'establecimiento' => $establecimiento], 200);

        return response($establecimiento, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param Request $request
     * @return Response
     * @throws InexistentException
     */
    public function update(int $id, Request $request): Response
    {
        $establecimiento = Establecimiento::find($id);

        if (!$establecimiento) throw new InexistentException('El establecimiento solicitado para editar no existe');

        $request->validate([
            //Datos correspondientes a Establecimiento
            'cue' => 'required|string',
            'nombre' => 'required|string',
            'sectorID' => 'required|integer',
            'modalidadID' => 'required|integer',
            'ambitoID' => 'required|integer',
            'nivelID' => 'required|integer',
            'zonaID' => 'required|integer',
            'matricula' => 'integer',
            'mail' => 'string|email',
            'horario' => 'string',

            //Telefonos
            'telefonos' => 'array',

            //Ofertas y Turnos
            'ofertas' => 'required|array|min:1',
            'turnos' => 'required|array|min:1'
        ]);

        //Chequeamos que existan sector, modalidad, ambito y niveles especificados
        $sector = Sector::find($request['sectorID']);
        if (!$sector) throw new InexistentException('El sector solicitado para editar no existe');

        $modalidad = Modalidad::find($request['modalidadID']);
        if (!$modalidad) throw new InexistentException('La modalidad solicitada para editar no existe');

        $ambito = Ambito::find($request['ambitoID']);
        if (!$ambito) throw new InexistentException('El ambito solicitado para editar no existe');

        $nivel = Nivel::find($request['nivelID']);
        if (!$nivel) throw new InexistentException('El nivel solicitado para editar no existe');

        //Procedemos a actualizar el Establecimiento
        $fieldsEstablecimiento = [
            'cue' => $request['cue'],
            'nombre' => $request['nombre'],
            'sectorID' => $request['sectorID'],
            'modalidadID' => $request['modalidadID'],
            'ambitoID' => $request['ambitoID'],
            'nivelID' => $request['nivelID'],
            'zonaID' => $request['zonaID'],
            'matricula' => !$request['matricula'] ? null : $request['matricula'],
            'mail' => !$request['mail'] ? null : $request['mail'],
            'horario' => !$request['horario'] ? null : $request['horario']
        ];

        $establecimiento->update($fieldsEstablecimiento);

        //Limpiamos los telefonos.
        Telefonoestablecimiento::where('establecimientoID', $establecimiento['establecimientoID'])->delete();

        //Una vez actualizado el establecimiento, creamos los telefonos del establecimiento.
        $errores = [];
        foreach ($request['telefonos'] as $telefono) {
            if (Arr::has($telefono, ['telefono'])) {
                $fieldTelefono = [
                    'telefono' => $telefono['telefono'],
                    'establecimientoID' => $establecimiento['establecimientoID']
                ];
                if (Arr::has($telefono, ['tipo']) && ($telefono['tipo'] == 'fijo' || $telefono['tipo'] == 'movil')) {
                    $fieldTelefono['tipo'] = $telefono['tipo'];
                }
                $nuevoTelefono = Telefonoestablecimiento::create($fieldTelefono);

                if (!$nuevoTelefono) array_push($errores, 'Error al insertar el telefono: ' . $telefono['telefono']);
            } else {
                array_push($errores, 'Error al insertar un telefono: Elemento mal formado.');
            }
        }

        //Limpiamos ofertas y turnos
        $establecimiento->turnos()->detach();
        $establecimiento->ofertas()->detach();

        //Checkeamos los IDs de ofertas y de turnos, y los agregamos. 
        $turnosIDs = $request['turnos'];
        $turnosAgregar = [];
        foreach ($turnosIDs as $turnoID) {
            if (!Turno::find($turnoID)) {
                array_push($errores, 'No existe el turno con ID: ' . $turnoID);
            } else {
                array_push($turnosAgregar, $turnoID);
            }
        }

        if (count($turnosAgregar) > 0) $establecimiento->turnos()->attach($turnosAgregar);

        $ofertasIDs = $request['ofertas'];
        $ofertasAgregar = [];
        foreach ($ofertasIDs as $ofertaID) {
            if (!Oferta::find($ofertaID)) {
                array_push($errores, 'No existe el oferta con ID: ' . $ofertaID);
            } else {
                array_push($ofertasAgregar, $ofertaID);
            }
        }

        if (count($ofertasAgregar) > 0) $establecimiento->ofertas()->attach($ofertasAgregar);

        //Completamos el establecimiento
        $establecimiento->ambito;
        $establecimiento->domicilio;
        $establecimiento->nivel;
        $establecimiento->sector;
        $establecimiento->modalidad;
        $establecimiento->zona;
        $establecimiento->ofertas;
        $establecimiento->turnos;
        $establecimiento->telefonoestablecimientos;

        if (count($errores) > 0) return response(['errores' => $errores, 'establecimiento' => $establecimiento], 200);

        return response($establecimiento, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response

     * @throws InexistentException
     */
    public function destroy(int $id): Response
    {
        $establecimiento = Establecimiento::find($id);
        if (!$establecimiento) throw new InexistentException('El establecimiento solicitado no existe');

        //Limpiamos telefonos, ofertas y turnos
        Telefonoestablecimiento::where('establecimientoID', $establecimiento['establecimientoID'])->delete();
        $establecimiento->turnos()->detach();
        $establecimiento->ofertas()->detach();

        //Eliminamos el establecimiento y luego su domicilio
        $deleted = Establecimiento::destroy($id);

        $deletedDom = 0;
        if($deleted == 1) $deletedDom = Domicilio::destroy($establecimiento['domicilioID']);
        
        return response(["deleted" =>  ($deleted == 1) && ($deletedDom == 1)]);
    }
}
