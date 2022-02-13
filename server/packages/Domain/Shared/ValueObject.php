<?php

declare(strict_types=1);

namespace Packages\Domain\Shared;

abstract class ValueObject
{
    abstract public function equals($value): bool;
}
