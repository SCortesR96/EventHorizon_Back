<?php

namespace App\Models;

class ResponseModel
{
    protected string $status;
    protected string $message;
    protected array $data;

    public function __construct(string $status, string $message, $data = null)
    {
        $this->status  = $status;
        $this->message = $message;
        $this->data    = $data;
    }

    public function toArray(): array
    {
        return [
            'status'  => $this->status,
            'message' => $this->message,
            'data'    => $this->data,
        ];
    }
}
