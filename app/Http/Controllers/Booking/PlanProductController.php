<?php

namespace App\Http\Controllers\Booking;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\MainController;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Http\Requests\Booking\PlanProduct\{
    PlanProductStoreRequest,
    PlanProductUpdateRequest
};
use App\Modules\Booking\Data\Entities\PlanProduct\{
    PlanProductStoreEntity,
    PlanProductUpdateEntity
};
use App\Modules\Booking\Domain\Usecases\PlanProduct\{
    PlanProductShowUsecase,
    PlanProductStoreUsecase,
    PlanProductUpdateUsecase,
    PlanProductDeleteUsecase,
    PlanProductIndexUsecase
};

class PlanProductController extends MainController
{
    private PlanProductIndexUsecase $planProductIndexUsecase;
    private PlanProductStoreUsecase $planProductStoreUsecase;
    private PlanProductShowUsecase $planProductShowUsecase;
    private PlanProductUpdateUsecase $planProductUpdateUsecase;
    private PlanProductDeleteUsecase $planProductDeleteUsecase;

    public function __construct(
        PlanProductIndexUsecase $planProductIndexUsecase,
        PlanProductStoreUsecase $planProductStoreUsecase,
        PlanProductShowUsecase $planProductShowUsecase,
        PlanProductUpdateUsecase $planProductUpdateUsecase,
        PlanProductDeleteUsecase $planProductDeleteUsecase,
    ) {
        $this->planProductIndexUsecase = $planProductIndexUsecase;
        $this->planProductStoreUsecase = $planProductStoreUsecase;
        $this->planProductShowUsecase = $planProductShowUsecase;
        $this->planProductUpdateUsecase = $planProductUpdateUsecase;
        $this->planProductDeleteUsecase = $planProductDeleteUsecase;
    }

    /**
     * PlanProduct | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $pagination = new PaginationEntity($request);

            $data = $this->planProductIndexUsecase->execute($pagination);
            return $this->success(
                __('responses.success.load'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlanProductController@index', 'Booking');
        }
    }

    /**
     * PlanProduct | Store
     *
     * Store a newly created resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function store(PlanProductStoreRequest $request)
    {
        try {
            $planProduct = new PlanProductStoreEntity($request);
            $data = $this->planProductStoreUsecase->execute($planProduct);
            return $this->success(
                __('responses.success.saved'),
                $data,
                JsonResponse::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlanProductController@store', 'Booking');
        }
    }

    /**
     * PlanProduct | Show
     *
     * Display the specified resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function show(string $id)
    {
        try {
            $data = $this->planProductShowUsecase->execute($id);
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
            return $this->error($e, 'PlanProductController@show', 'Booking');
        }
    }

    /**
     * PlanProduct | Update
     *
     * Update the specified resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function update(PlanProductUpdateRequest $request, string $id)
    {
        try {
            $entity = new PlanProductUpdateEntity($request);
            $data = $this->planProductUpdateUsecase->execute($entity, $id);
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
            return $this->error($e, 'PlanProductController@update', 'Booking');
        }
    }

    /**
     * PlanProduct | Delete
     *
     * Remove the specified resource from storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->planProductDeleteUsecase->execute($id);
            if ($data) {
                return $this->success(
                    $data->response,
                    $data->isSuccess,
                    $data->code
                );
            }
            return $this->warning(
                $data->response,
                $data->isSuccess,
                $data->code
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlanProductController@destroy', 'Booking');
        }
    }
}
