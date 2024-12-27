<?php

namespace GeoPHP;

abstract class Geometry
{
    protected string $type;

    public function getType(): string
    {
        return $this->type;
    }

    abstract public function asText(): string;
    abstract public function asBinary(): string;
}
