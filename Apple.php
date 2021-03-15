<?php

class Apple
{

    /** @var array Набор цветов константа */
    const COLORS = ['red', 'yellow', 'green'];

    /**  @var string Цвет яблока */
    private $color;

    /**  @var DateTime время появления */
    private $timeOfAppearance;

    /**  @var DateTime время падения */
    private $timeOfFall = null;

    /**  @var int целостность яблока */
    private $integrityOfApple = 100;

    public function __construct()
    {
        $this->color = self::COLORS[array_rand(self::COLORS, 1)];
        $this->timeOfAppearance = date("Y-m-d H:i:s");
    }

}
