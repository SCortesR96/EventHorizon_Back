<?php

namespace App\Http\Controllers\Booking;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\MainController;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Http\Requests\Booking\PlanDetail\{
    PlanDetailStoreRequest,
    PlanDetailUpdateRequest
};
use App\Modules\Booking\Data\Entities\PlanDetail\{
    PlanDetailStoreEntity,
    PlanDetailUpdateEntity
};
use App\Modules\Booking\Domain\Usecases\PlanDetail\{
    PlanDetailShowUsecase,
    PlanDetailStoreUsecase,
    PlanDetailUpdateUsecase,
    PlanDetailDeleteUsecase,
    PlanDetailIndexUsecase
};

class PlanDetailController extends MainController
{
    private PlanDetailIndexUsecase $planDetailIndexUsecase;
    private PlanDetailStoreUsecase $planDetailStoreUsecase;
    private PlanDetailShowUsecase $planDetailShowUsecase;
    private PlanDetailUpdateUsecase $planDetailUpdateUsecase;
    private PlanDetailDeleteUsecase $planDetailDeleteUsecase;

    public function __construct(
        PlanDetailIndexUsecase $planDetailIndexUsecase,
        PlanDetailStoreUsecase $planDetailStoreUsecase,
        PlanDetailShowUsecase $planDetailShowUsecase,
        PlanDetailUpdateUsecase $planDetailUpdateUsecase,
        PlanDetailDeleteUsecase $planDetailDeleteUsecase,
    ) {
        $this->planDetailIndexUsecase = $planDetailIndexUsecase;
        $this->planDetailStoreUsecase = $planDetailStoreUsecase;
        $this->planDetailShowUsecase = $planDetailShowUsecase;
        $this->planDetailUpdateUsecase = $planDetailUpdateUsecase;
        $this->planDetailDeleteUsecase = $planDetailDeleteUsecase;
    }

    /**
     * PlanDetail | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $pagination = new PaginationEntity($request);

            $data = $this->planDetailIndexUsecase->execute($pagination);
            return $this->success(
                __('responses.success.load'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlanDetailController@index', 'Booking');
        }
    }

    /**
     * PlanDetail | Store
     *
     * Store a newly created resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function store(PlanDetailStoreRequest $request)
    {
        try {
            $planDetail = new PlanDetailStoreEntity($request);
            $data = $this->planDetailStoreUsecase->execute($planDetail);
            return $this->success(
                __('responses.success.saved'),
                $data,
                JsonResponse::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlanDetailController@store', 'Booking');
        }
    }

    /**
     * PlanDetail | Show
     *
     * Display the specified resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function show(string $id)
    {
        try {
            $data = $this->planDetailShowUsecase->execute($id);
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
            return $this->error($e, 'PlanDetailController@show', 'Booking');
        }
    }

    /**
     * PlanDetail | Update
     *
     * Update the specified resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function update(PlanDetailUpdateRequest $request, string $id)
    {
        try {
            $entity = new PlanDetailUpdateEntity($request);
            $data = $this->planDetailUpdateUsecase->execute($entity, $id);
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
            return $this->error($e, 'PlanDetailController@update', 'Booking');
        }
    }

    /**
     * PlanDetail | Delete
     *
     * Remove the specified resource from storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->planDetailDeleteUsecase->execute($id);
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
            return $this->error($e, 'PlanDetailController@destroy', 'Booking');
        }
    }
}
