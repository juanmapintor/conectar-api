<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Exceptions\InvalidCredentialsException;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Registra un nuevo usuario.
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request): Response
    {
        //Validar la entrada en la request
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);


        return response([
            'user' => User::find($user->id)
        ], 201);
    }
    /**
     * Loggea a un usuario.
     *
     * @param Request $request
     * @return Response
     * @throws InvalidCredentialsException
     */
    public function login(Request $request): Response
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) throw new InvalidCredentialsException('Las credenciales son invalidas', 3);

        $token = $user->createToken('conectarapp')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    /**
     * Desloggea el usuario actual.
     */
    public function logout(Request $request): Response
    {

        $request->user()->currentAccessToken()->delete();

        return response(['message' => 'Logged out'], 200);
    }
}
