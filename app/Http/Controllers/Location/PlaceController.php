<?php

namespace App\Http\Controllers\Location;

use Exception;
use App\Http\Controllers\MainController;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Http\Requests\Location\{
    PlaceStoreRequest,
    PlaceUpdateRequest
};
use App\Modules\Location\Data\Entities\{
    PlaceStoreEntity,
    PlaceUpdateEntity
};
use Illuminate\Http\{
    JsonResponse,
    Request
};
use App\Modules\Location\Domain\Usecases\{
    PlaceDeleteUsecase,
    PlaceIndexUsecase,
    PlaceShowUsecase,
    PlaceStoreUsecase,
    PlaceUpdateUsecase,
};

class PlaceController extends MainController
{
    private PlaceIndexUsecase $placeIndexUsecase;
    private PlaceStoreUsecase $placeStoreUsecase;
    private PlaceShowUsecase $placeShowUsecase;
    private PlaceUpdateUsecase $placeUpdateUsecase;
    private PlaceDeleteUsecase $placeDeleteUsecase;

    public function __construct(
        PlaceIndexUsecase $placeIndexUsecase,
        PlaceStoreUsecase $placeStoreUsecase,
        PlaceShowUsecase $placeShowUsecase,
        PlaceUpdateUsecase $placeUpdateUsecase,
        PlaceDeleteUsecase $placeDeleteUsecase,
    ) {
        $this->placeIndexUsecase    = $placeIndexUsecase;
        $this->placeStoreUsecase    = $placeStoreUsecase;
        $this->placeShowUsecase     = $placeShowUsecase;
        $this->placeUpdateUsecase   = $placeUpdateUsecase;
        $this->placeDeleteUsecase   = $placeDeleteUsecase;
    }

    /**
     * Place | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $pagination = new PaginationEntity($request);

            $data = $this->placeIndexUsecase->execute($pagination);
            return $this->success(
                __('responses.success.load'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlaceController@index', 'Location');
        }
    }

    /**
     * Place | Store
     *
     * Store a newly created resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function store(PlaceStoreRequest $request)
    {
        try {
            $place = new PlaceStoreEntity($request);
            $data = $this->placeStoreUsecase->execute($place);
            return $this->success(
                __('responses.success.saved'),
                $data,
                JsonResponse::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->error($e, 'PlaceController@store', 'Location');
        }
    }

    /**
     * Place | Show
     *
     * Display the specified resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function show(string $id)
    {
        try {
            $data = $this->placeShowUsecase->execute($id);
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
            return $this->error($e, 'PlaceController@show', 'Location');
        }
    }

    /**
     * Place | Update
     *
     * Update the specified resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function update(PlaceUpdateRequest $request, string $id)
    {
        try {
            $entity = new PlaceUpdateEntity($request);
            $data = $this->placeUpdateUsecase->execute($entity, $id);
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
            return $this->error($e, 'PlaceController@update', 'Location');
        }
    }

    /**
     * Place | Delete
     *
     * Remove the specified resource from storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->placeDeleteUsecase->execute($id);
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
            return $this->error($e, 'PlaceController@destroy', 'Location');
        }
    }
}
