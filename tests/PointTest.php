<?php

use GeoPHP\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testAsText()
    {
        $point = new Point(1.5, 2.5);
        $this->assertEquals('POINT(1.500000 2.500000)', $point->asText());
    }

    public function testFromText()
    {
        $point = Point::fromText('POINT(1.5 2.5)');
        $this->assertEquals(1.5, $point->getX());
        $this->assertEquals(2.5, $point->getY());
    }
}
