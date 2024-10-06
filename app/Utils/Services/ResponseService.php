<?php

namespace App\Utils\Services;

use App\Utils\Entities\Responses\ResponseEntity;

class ResponseService
{
    public static function load(mixed $data = null): ResponseEntity
    {
        return new ResponseEntity(
            __('responses.success.load'),
            true,
            200,
            $data,
        );
    }

    public static function created(mixed $data = null): ResponseEntity
    {
        return new ResponseEntity(
            __('responses.success.created'),
            true,
            201,
            $data,
        );
    }

    public static function updated(mixed $data = null): ResponseEntity
    {
        return new ResponseEntity(
            __('responses.success.updated'),
            true,
            200,
            $data,
        );
    }

    public static function deleted(mixed $data = null): ResponseEntity
    {
        return new ResponseEntity(
            __('responses.success.deleted'),
            true,
            200,
            $data,
        );
    }

    public static function notFound(): ResponseEntity
    {
        return new ResponseEntity(
            __('responses.error.notFound'),
            false,
            404,
        );
    }

    public static function error(): ResponseEntity
    {
        return  new ResponseEntity(
            __('responses.error.catchError'),
            false,
            500
        );
    }

    public static function errorSaved(): ResponseEntity
    {
        return  new ResponseEntity(
            __('responses.error.saved'),
            false,
            500
        );
    }
}
