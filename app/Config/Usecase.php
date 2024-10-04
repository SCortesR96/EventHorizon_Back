<?php

namespace App\Config;

abstract class Usecase
{
    abstract public function execute($params);
}
