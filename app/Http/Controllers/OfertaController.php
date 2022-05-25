<?php

namespace App\Http\Controllers;

use App\Models\Oferta;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Exceptions\EmptyException;
use App\Exceptions\InexistentException;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function index() : Response
    {
        $ofertas = Oferta::paginate(5);

        if($ofertas->isEmpty()) throw new EmptyException();

        return response($ofertas, 200);
    }

        /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws EmptyException
     */
    public function indexAll() : Response
    {
        $ofertas = Oferta::get();

        if($ofertas->isEmpty()) throw new EmptyException();

        return response($ofertas, 200);
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
            'oferta' => 'required|unique:oferta,oferta',
        ]);

        $oferta = Oferta::create($request->all());

        return response($oferta, 200);
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
        $oferta = Oferta::find($id);

        if(!$oferta) throw new InexistentException('La oferta solicitada no existe');

        return response($oferta, 200);
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
        $oferta = Oferta::find($id);

        if(!$oferta) throw new InexistentException('La oferta solicitada para editar no existe');

        $request->validate([
            'oferta' => 'required|unique:oferta,oferta'
        ]);

        $oferta->update($request->all());

        return response($oferta, 200);
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
        if(!(Oferta::find($id))) throw new InexistentException('La oferta solicitada no existe');

        return response(["deleted" => Oferta::destroy($id) == 1]);
    }
}
