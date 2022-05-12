<?php

namespace App\Http\Controllers;

use App\Models\Zona;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Exceptions\EmptyException;
use App\Exceptions\InexistentException;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function indexAll() : Response
    {
        $zonas = Zona::get();

        if($zonas->isEmpty()) throw new EmptyException();

        return response($zonas, 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function index() : Response
    {
        $zonas = Zona::paginate(5);

        if($zonas->isEmpty()) throw new EmptyException();

        return response($zonas, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) : Response
    {
        $request->validate([
            'nombre_zona' => 'required|string|unique:zona,nombre_zona',
            'apellido_supervisor' => 'required|string',
            'nombre_supervisor' => 'required|string',
            'mail_supervisor' => 'email',
            'telefono_supervisor' => 'string'
        ]);

        $zona = Zona::create($request->all());

        return response($zona, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     * @throws InexistentException
     */
    public function show(int $id) : Response
    {
        $zona = Zona::find($id);

        if(!$zona) throw new InexistentException('La zona solicitada no existe');

        return response($zona, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param Request $request
     * @return Response

     * @throws InexistentException
     */
    public function update(int $id, Request $request) : Response
    {
        $zona = Zona::find($id);

        if(!$zona) throw new InexistentException('La zona solicitada para editar no existe');

        $request->validate([
            'nombre_zona' => 'required|unique:zona,nombre_zona',
            'apellido_supervisor' => 'required',
            'nombre_supervisor' => 'required'
        ]);

        $zona->update($request->all());

        return response($zona, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response

     * @throws InexistentException
     */
    public function destroy(int $id) : Response
    {
        if(!(Zona::find($id))) throw new InexistentException('La zona solicitada no existe');

        return response(["deleted" => Zona::destroy($id) == 1]);
    }
}
