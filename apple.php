<?php

class Apple
{
    /** @var private color цвет яблока */
    const COLORS = array('red', 'yellow', 'green');

    private $color;

    public function __construct()
    {
        $this->color = self::COLORS[array_rand(self::COLORS, 1)];
    }


}