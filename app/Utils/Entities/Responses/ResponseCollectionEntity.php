<?php

namespace App\Utils\Entities\Responses;

class ResponseCollectionEntity
{
    public string   $response;
    public string   $pagination;
    public bool     $isSuccess;
    public ?int     $code;
    public mixed    $data;

    public function __construct(
        string $response,
        string $pagination,
        bool $isSuccess,
        ?int $code = 200,
        $data = null
    ) {
        $this->code         = $code;
        $this->data         = $data;
        $this->pagination   = $pagination;
        $this->response     = $response;
        $this->isSuccess    = $isSuccess;
    }
}
