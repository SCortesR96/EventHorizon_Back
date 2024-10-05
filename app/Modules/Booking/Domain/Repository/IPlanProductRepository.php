<?php

namespace App\Modules\Booking\Domain\Repository;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class IPlanProductRepository
{
    public abstract function index();
    public abstract function show(int $id);
    public abstract function store(array $data);
    public abstract function update(int $id, array $data);
    public abstract function delete(int $id);
}
