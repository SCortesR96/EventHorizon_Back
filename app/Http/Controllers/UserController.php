<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\User\{
    UserUpdateRequest,
    UserStoreRequest
};
use App\Modules\User\Data\Entities\{
    UserUpdateEntity,
    UserStoreEntity
};
use App\Modules\User\Domain\Usecases\{
    UpdateUserUsecase,
    DeleteUserUsecase,
    IndexUserUsecase,
    ShowUserUsecase,
    StoreUserUsecase
};

class UserController extends MainController
{
    private ShowUserUsecase $showUserUsecase;
    private IndexUserUsecase $indexUserUsecase;
    private StoreUserUsecase $storeUserUsecase;
    private DeleteUserUsecase $deleteUserUsecase;
    private UpdateUserUsecase $updateUserUsecase;

    public function __construct(
        ShowUserUsecase $showUserUsecase,
        IndexUserUsecase $indexUserUsecase,
        StoreUserUsecase $storeUsersUsecase,
        UpdateUserUsecase $updateUsersUsecase,
        DeleteUserUsecase $deleteUserUsecase,
    ) {
        $this->indexUserUsecase     = $indexUserUsecase;
        $this->showUserUsecase      = $showUserUsecase;
        $this->storeUserUsecase     = $storeUsersUsecase;
        $this->deleteUserUsecase    = $deleteUserUsecase;
        $this->updateUserUsecase    = $updateUsersUsecase;
    }

    /**
     * User | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index(): JsonResponse
    {
        try {
            $data = $this->indexUserUsecase->execute();
            return $this->success(
                __('responses.success.load'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'UserController@index', 'User');
        }
    }

    /**
     * User | Store
     *
     * Store a newly created resource in storage.
     *
     * @param  mixed $request
     * @response array{"status": "success", "message": "Saved successfully.", "data": any }
     */
    public function store(UserStoreRequest $request): JsonResponse
    {
        try {
            $user = new UserStoreEntity($request);
            $data = $this->storeUserUsecase->execute($user);
            return $this->success(
                __('responses.success.saved'),
                $data,
                JsonResponse::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->error($e, 'UserController@store', 'User');
        }
    }

    /**
     * User | Show
     *
     * Display the specified resource.
     *
     * @param  mixed $id
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function show(int $id): JsonResponse
    {
        try {
            $data = $this->showUserUsecase->execute($id);
            if ($data->isSuccess) {
                return $this->success(
                    $data->response,
                    $data->data,
                    JsonResponse::HTTP_OK
                );
            }
            return $this->warning(
                $data->response,
                $data->data,
                $data->code
            );
        } catch (Exception $e) {
            return $this->error($e, 'UserController@show', 'User');
        }
    }

    /**
     * User | Update
     *
     * Update the specified resource in storage.
     *
     * @param  mixed $request
     * @param  mixed $id
     * @response array{"status": "success", "message": "Updated successfully.", "data": any }
     */
    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        try {
            $user = new UserUpdateEntity($request);
            $data = $this->updateUserUsecase->execute([$user, $id]);
            if ($data->isSuccess) {
                return $this->success(
                    $data->response,
                    $data->isSuccess,
                    JsonResponse::HTTP_OK
                );
            }
            return $this->warning(
                $data->response,
                $data->isSuccess,
                $data->code
            );
        } catch (Exception $e) {
            return $this->error($e, 'UserController@update', 'User');
        }
    }

    /**
     * User | Delete
     *
     * Remove the specified resource from storage.
     *
     * @param  mixed $id
     * @response array{"status": "success", "message": "User deleted successfully.", "data": any }
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $data = $this->deleteUserUsecase->execute($id);
            if ($data->isSuccess) {
                return $this->success(
                    $data->response,
                    $data->isSuccess,
                    JsonResponse::HTTP_OK
                );
            }
            return $this->warning(
                $data->response,
                $data->isSuccess,
                $data->code
            );
        } catch (Exception $e) {
            return $this->error($e, 'UserController@destroy', 'User');
        }
    }
}
