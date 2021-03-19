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
     * @return bool
     */
    public function showAppleStateofHang(): bool
    {
        return $this->fallTimestamp === null;
    }

    /**
     * падение яблока с дерева
     */
    public function appleFall(): void
    {
        if ($this->fallTimestamp !== null) {
            throw new RuntimeException ("Apple is not on the tree");

        } else {
            $this->fallTimestamp = time();
        }
    }

    /**
     * съесть яблоко
     *
     * @return int
     */
    public function eatApple($piece): void
    {
        $start = $this->fallTimestamp;
        $end = time();
        $seconds_diff = $end - $start;
        $rotTime = round($seconds_diff / 3600);

        if ($this->fallTimestamp !== null && $piece <= 100 && $rotTime < 5) {
            $this->integrityOfApple -= $piece;
        } else {
            throw new RuntimeException ("Better do not eat it or you just can not");
        }
    }
}

$apple = new Apple();
$apple->appleFall();
$apple->eatApple(25);
var_export($apple);


