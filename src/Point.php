<?php

namespace GeoPHP;

class Point extends Geometry
{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->type = 'Point';
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function asText(): string
    {
        return sprintf('POINT(%F %F)', $this->x, $this->y);
    }

    public function asBinary(): string
    {
        $wkb = pack('cLdd', 1, 1, $this->x, $this->y);
        return $wkb;
    }

    public static function fromText(string $wkt): self
    {
        if (preg_match('/POINT\(([-\d\.]+) ([-\d\.]+)\)/', $wkt, $matches)) {
            return new self((float)$matches[1], (float)$matches[2]);
        }
        throw new \InvalidArgumentException('Invalid WKT for Point');
    }

    public static function fromBinary(string $wkb): self
    {
        $data = unpack('corder/Ltype/dx/dy', $wkb);
        if ($data && $data['type'] === 1) {
            return new self($data['x'], $data['y']);
        }
        throw new \InvalidArgumentException('Invalid WKB for Point');
    }
}
