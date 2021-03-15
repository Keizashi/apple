<?php

class Apple
{
    /** @var string color цвет яблока
     *  @var array набор цветов константа COLORS
     *
     */
    const COLORS = ['red', 'yellow', 'green'];

    private $color;

    public function __construct()
    {
        $this->color = self::COLORS[array_rand(self::COLORS, 1)];
    }


}