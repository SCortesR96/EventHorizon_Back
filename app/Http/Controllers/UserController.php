<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Modules\User\Domain\Usecases\IndexUsersUsecase;

class UserController extends MainController
{
    private IndexUsersUsecase $indexUserUsecase;

    public function __construct(IndexUsersUsecase $indexUserUsecase)
    {
        $this->indexUserUsecase = $indexUserUsecase;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = $this->indexUserUsecase->execute();
            return $this->success('Inicio de sesión exitoso.', $data, JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
