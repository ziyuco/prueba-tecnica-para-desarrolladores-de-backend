<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Iniciar sesión de usuario
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_phone' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        $user = User::where('mobile_phone', $request->mobile_phone)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['status' => 'error', 'message' => 'Credenciales inválidas'], 401);
        }

        $token = $user->createToken('token-name')->accessToken;

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    /**
     * Obtener todos los usuarios
     */
    public function getUsers()
    {
        $users = User::all();
        return response()->json(['status' => 'success', 'data' => $users]);
    }

    /**
     * Obtener un usuario por ID
     */
    public function getUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Usuario no encontrado'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $user]);
    }

    /**
     * Crear un nuevo usuario
     */
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_birth' => 'required|date',
            'mobile_phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'address' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_birth' => $request->date_birth,
            'mobile_phone' => $request->mobile_phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ]);

        return response()->json(['status' => 'success', 'data' => $user], 201);
    }

    /**
     * Actualizar un usuario existente
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Usuario no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_birth' => 'required|date',
            'mobile_phone' => 'required|unique:users,mobile_phone,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
            'address' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->date_birth = $request->date_birth;
        $user->mobile_phone = $request->mobile_phone;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->address = $request->address;
        $user->save();

        return response()->json(['status' => 'success', 'data' => $user]);
    }

    /**
     * Eliminar un usuario existente
     */
    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Usuario no encontrado'], 404);
        }

        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'Usuario eliminado correctamente']);
    }
}