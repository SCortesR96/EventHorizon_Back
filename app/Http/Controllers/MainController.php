<?php

namespace App\Http\Controllers;

use Exception;
use App\Enums\ApiStatusEnum;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\{JsonResponse, Response};

class MainController extends Controller
{
    public function response(ApiStatusEnum $status, string $message, $data = [], int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(
            [
                'status'    => $status,
                'message'   => $message,
                'data'      => $data
            ],
            $code,
            ['Content-Type' => 'application/json']
        );
    }

    public function success(string $message, $data = [], int $code = Response::HTTP_OK): JsonResponse
    {
        return $this->response(ApiStatusEnum::SUCCESS, $message, $data, $code);
    }

    public function warning(string $message, $data = [], int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return $this->response(ApiStatusEnum::WARNING, $message, $data, $code);
    }

    public function error($message): JsonResponse
    {
        return $this->response(
            ApiStatusEnum::ERROR,
            $message,
            [],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    // ERROR SECTION
    private function generateErrorCode(string $channel): string
    {
        return "$channel-" . now()->timestamp;
    }

    private function exceptionMessage(string $errorCode): string
    {
        return __('responses.error.catchError') . " " . __('responses.error.getCode') . " $errorCode";
    }

    private function logException(Exception $e, string $location, string $channel, string $errorCode)
    {
        $errorLogMessage = "$channel: ($location-" . $errorCode . ") :  \r\n" . $e->getMessage() . PHP_EOL;
        $log = Log::channel($channel)->error($errorLogMessage);
    }

    public function getErrorMessage(Exception $e, string $location, string $channel): string
    {
        $errorCode = $this->generateErrorCode($channel);
        $this->logException($e, $location, $channel, $errorCode);
        return $this->exceptionMessage($errorCode);
    }
}
