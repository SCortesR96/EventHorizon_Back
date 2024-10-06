<?php

namespace App\Http\Controllers\Booking;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\MainController;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Http\Requests\Booking\Booking\{
    BookingStoreRequest,
    BookingUpdateRequest
};
use App\Modules\Booking\Data\Entities\Booking\{
    BookingStoreEntity,
    BookingUpdateEntity
};
use App\Modules\Booking\Domain\Usecases\Booking\{
    BookingIndexUsecase,
    BookingShowUsecase,
    BookingStoreUsecase,
    BookingUpdateUsecase,
    BookingDeleteUsecase
};

class BookingController extends MainController
{
    private BookingIndexUsecase $bookingIndexUsecase;
    private BookingStoreUsecase $bookingStoreUsecase;
    private BookingShowUsecase $bookingShowUsecase;
    private BookingUpdateUsecase $bookingUpdateUsecase;
    private BookingDeleteUsecase $bookingDeleteUsecase;

    public function __construct(
        BookingIndexUsecase $bookingIndexUsecase,
        BookingStoreUsecase $bookingStoreUsecase,
        BookingShowUsecase $bookingShowUsecase,
        BookingUpdateUsecase $bookingUpdateUsecase,
        BookingDeleteUsecase $bookingDeleteUsecase,
    ) {
        $this->bookingIndexUsecase = $bookingIndexUsecase;
        $this->bookingStoreUsecase = $bookingStoreUsecase;
        $this->bookingShowUsecase = $bookingShowUsecase;
        $this->bookingUpdateUsecase = $bookingUpdateUsecase;
        $this->bookingDeleteUsecase = $bookingDeleteUsecase;
    }

    /**
     * Booking | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $pagination = new PaginationEntity($request);

            $data = $this->bookingIndexUsecase->execute($pagination);
            return $this->success(
                __('responses.success.load'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'BookingController@index', 'Booking');
        }
    }

    /**
     * Booking | Store
     *
     * Store a newly created resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function store(BookingStoreRequest $request)
    {
        try {
            $booking = new BookingStoreEntity($request);
            $data = $this->bookingStoreUsecase->execute($booking);
            return $this->success(
                __('responses.success.saved'),
                $data,
                JsonResponse::HTTP_CREATED
            );
        } catch (Exception $e) {
            return $this->error($e, 'BookingController@store', 'Booking');
        }
    }

    /**
     * Booking | Show
     *
     * Display the specified resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function show(string $id)
    {
        try {
            $data = $this->bookingShowUsecase->execute($id);
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
            return $this->error($e, 'BookingController@show', 'Booking');
        }
    }

    /**
     * Booking | Update
     *
     * Update the specified resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function update(BookingUpdateRequest $request, string $id)
    {
        try {
            $entity = new BookingUpdateEntity($request);
            $data = $this->bookingUpdateUsecase->execute($entity, $id);
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
            return $this->error($e, 'BookingController@update', 'Booking');
        }
    }

    /**
     * Booking | Delete
     *
     * Remove the specified resource from storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->bookingDeleteUsecase->execute($id);
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
            return $this->error($e, 'BookingController@destroy', 'Booking');
        }
    }
}
