<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Loopback extends Controller
{
    /**
     * Loopback received request.
     *
     * @param Request $request
     * @return Response
     */
    public function loopback(Request $request): Response
    {
        return response($request, 200);
    }
}
