<?php

namespace App\Utils\Entities\Responses;

class ResponseEntity
{
    public string   $response;
    public bool     $isSuccess;
    public ?int     $code;
    public mixed    $data;

    public function __construct(string $response, bool $isSuccess, ?int $code = 200, $data = null)
    {
        $this->code         = $code;
        $this->data         = $data;
        $this->response     = $response;
        $this->isSuccess    = $isSuccess;
    }
}
