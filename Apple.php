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
     * @return void
     */
    public function eatApple($piece): void
    {
        $start = $this->fallTimestamp;
        $end = time();
        $secondsDiff = $end - $start;
        $rotTime = round($secondsDiff / 3600);

        if ($this->fallTimestamp === null) {
            throw new RuntimeException ("Do not eat this apple, it is on the tree");
        } elseif ($piece > 100 || $this->integrityOfApple <= 0 || $this->integrityOfApple < $piece) {
            throw new RuntimeException ("You can not eat more than whole apple, or it is already eaten");
        } elseif ($rotTime > 5) {
            throw new RuntimeException ("Do not eat rotten apple");
        } else {
            $this->integrityOfApple -= $piece;
        }
    }
}

