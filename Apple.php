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

    /**
     * вернуть цвет яблока
     *
     * @return string
     */

    public function showAppleColor(): string
    {
        return $this->color;
    }

    /**
     * вернуть целостность яблока
     *
     * @return int
     */

    public function showAppleIntegrity(): int
    {
        return $this->integrityOfApple;
    }

    /**
     * вернуть состояние яблока
     *
     * @return string
     */

    public function showAppleState(): string
    {
        if ($fallTimestamp === null) {
            $currentState = "яблоко висит на дереве\n";
        } else {
            $currentState = "яблоко лежит на земле\n";
        }
        return $currentState;
    }
}