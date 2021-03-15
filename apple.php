<?php

class Apple
{
    /** @var private color цвет яблока
     *  @array константа COLORS
     *
     */
    const COLORS = ['red', 'yellow', 'green'];

    private $color;

    public function __construct()
    {
        $this->color = self::COLORS[array_rand(self::COLORS, 1)];
    }


}