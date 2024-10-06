<?php

namespace App\Utils\Entities\Pagination;

use Illuminate\Http\Request;

class PaginationEntity
{
    public int $page;
    public ?string $search;
    public int $itemsPerPage;

    public function __construct(Request $request)
    {
        $this->search       = $request->input('search');
        $this->page         = $request->input('page', 1);
        $this->itemsPerPage = $request->input('per_page', 10);
    }
}
