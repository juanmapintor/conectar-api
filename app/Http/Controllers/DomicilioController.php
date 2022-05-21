<?php

namespace App\Http\Controllers;

use App\Models\Domicilio;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Exceptions\EmptyException;
use App\Exceptions\InexistentException;

class DomicilioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function index() : Response
    {
        $domicilios = Domicilio::get();

        if($domicilios->isEmpty()) throw new EmptyException('No hay domicilios para mostrar');

        return response($domicilios, 200);
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
            'provincia' => 'required|string',
            'departamento' => 'required|string',
            'cod_postal' => 'required|string',
            'calle' => 'required|string'
        ]);

        $domicilio = Domicilio::create($request->all());

        return response($domicilio, 200);
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
        $domicilio = Domicilio::find($id);

        if(!$domicilio) throw new InexistentException('El domicilio solicitado no existe');

        return response($domicilio, 200);
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
        $domicilio = Domicilio::find($id);

        if(!$domicilio) throw new InexistentException('El domicilio solicitado para editar no existe');

        $request->validate([
            'provincia' => 'required|string',
            'departamento' => 'required|string',
            'cod_postal' => 'required|string',
            'calle' => 'required|string'
        ]);

        $domicilio->update($request->all());

        return response($domicilio, 200);
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
        if(!(Domicilio::find($id))) throw new InexistentException('El domicilio solicitado no existe');

        return response(["deleted" => Domicilio::destroy($id) == 1]);
    }
}
