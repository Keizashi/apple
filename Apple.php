<?php

class Apple
{

    /** @var array набор цветов константа */
    const COLORS = ['red', 'yellow', 'green'];

    /** @var string цвет яблока */
    private $color;

    /** @var int время появления */
    private $appearanceTimestamp;

    /** @var int время падения */
    private $fallTimestamp = null;

    /** @var int целостность яблока */
    private $integrityOfApple = 100;

    public function __construct()
    {
        $this->color = self::COLORS[array_rand(self::COLORS, 1)];
        $this->appearanceTimestamp = time();
    }

}