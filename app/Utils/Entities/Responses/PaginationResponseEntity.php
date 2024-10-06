<?php

namespace App\Utils\Entities\Responses;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginationResponseEntity
{
    public int $perPage;
    public int $currentPage;
    public int $totalItems;
    public int $totalPages;
    public ResourceCollection $data;

    public function __construct(
        int $perPage        = 10,
        int $currentPage    = 1,
        int $totalItems,
        int $totalPages,
        ResourceCollection $data
    ) {
        $this->perPage      = $perPage;
        $this->currentPage  = $currentPage;
        $this->totalItems   = $totalItems;
        $this->totalPages   = $totalPages;
        $this->data   = $data;
    }
}
