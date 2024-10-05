<?php

namespace App\Http\Controllers\Booking;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\MainController;
use App\Http\Requests\Booking\{
    PlanStoreRequest,
    PlanUpdateRequest
};
use App\Modules\Booking\Data\Entities\{
    PlanStoreEntity,
    PlanUpdateEntity
};
use App\Modules\Booking\Domain\Usecases\Plan\{
    PlanIndexUsecase,
    PlanShowUsecase,
    PlanStoreUsecase,
    PlanUpdateUsecase,
    PlanDeleteUsecase
};

class PlanController extends MainController
{
    private PlanIndexUsecase $planIndexUsecase;
    private PlanStoreUsecase $planStoreUsecase;
    private PlanShowUsecase $planShowUsecase;
    private PlanUpdateUsecase $planUpdateUsecase;
    private PlanDeleteUsecase $planDeleteUsecase;

    public function __construct(
        PlanIndexUsecase $planIndexUsecase,
        PlanStoreUsecase $planStoreUsecase,
        PlanShowUsecase $planShowUsecase,
        PlanUpdateUsecase $planUpdateUsecase,
        PlanDeleteUsecase $planDeleteUsecase,
    ) {
        $this->planIndexUsecase = $planIndexUsecase;
        $this->planStoreUsecase = $planStoreUsecase;
        $this->planShowUsecase = $planShowUsecase;
        $this->planUpdateUsecase = $planUpdateUsecase;
        $this->planDeleteUsecase = $planDeleteUsecase;
    }

    /**
     * Plan | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index(): JsonResponse
    {
        try {
            $data = $this->planIndexUsecase->execute();
            return $this->success(
                __('responses.success.load'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlanController@index', 'Booking');
        }
    }

    /**
     * Plan | Store
     *
     * Store a newly created resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function store(PlanStoreRequest $request)
    {
        try {
            $plan = new PlanStoreEntity($request);
            $data = $this->planStoreUsecase->execute($plan);
            return $this->success(
                __('responses.success.saved'),
                $data,
                JsonResponse::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlanController@store', 'Booking');
        }
    }

    /**
     * Plan | Show
     *
     * Display the specified resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function show(string $id)
    {
        try {
            $data = $this->planShowUsecase->execute($id);
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
            return $this->error($e, 'PlanController@show', 'Booking');
        }
    }

    /**
     * Plan | Update
     *
     * Update the specified resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function update(PlanUpdateRequest $request, string $id)
    {
        try {
            $entity = new PlanUpdateEntity($request);
            $data = $this->planUpdateUsecase->execute($entity, $id);
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
            return $this->error($e, 'PlanController@update', 'Booking');
        }
    }

    /**
     * Plan | Delete
     *
     * Remove the specified resource from storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->planDeleteUsecase->execute($id);
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
            return $this->error($e, 'PlanController@destroy', 'Booking');
        }
    }
}
