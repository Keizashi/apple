<?php

class Apple
{

    /** @var array Набор цветов константа */
    const COLORS = ['red', 'yellow', 'green'];

    /** @var string Цвет яблока */
    private $color;

    /** @var string время появления */
    private $appearanceTimestamp;

    /** @var string время падения */
    private $timeOfFall = null;

    /** @var int целостность яблока */
    private $integrityOfApple = 100;

    public function __construct()
    {
        $this->color = self::COLORS[array_rand(self::COLORS, 1)];

        $date = date_create();
        $this->appearanceTimestamp = date('m/d/Y H:i:s', date_timestamp_get($date));
    }

}
