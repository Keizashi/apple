<?php

class Apple
{
    /** @var array набор цветов константа COLORS */
    const COLORS = ['red', 'yellow', 'green'];
    
    /**  @var string color цвет яблока */
    private $color;

    public function __construct()
    {
        $this->color = self::COLORS[array_rand(self::COLORS, 1)];
    }


}