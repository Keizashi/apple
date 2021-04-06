<?php

namespace common\models;

use yii\db\ActiveRecord;

class Apple extends ActiveRecord
{

    /** @var array набор цветов константа */
    const COLORS = ['red', 'yellow', 'green'];

    /** color @var string цвет яблока
     * appearanceTimestamp @var int время появления
     * fallTimestamp @var int время падения
     * integrity @var int целостность яблока
     */


    public function attributeLabels()
    {
        return [
            'appearanceTimestamp' => time(),
            'fallTimestamp' => 'null',
            'color' => self::COLORS[array_rand(self::COLORS, 1)],
            'integrity' => '100',
        ];
    }

    public function init()
    {
        parent::init();
        if ($this->isNewRecord) {
            $this->appearance_timestamp = time();
            $this->integrity = 100;
            $this->fall_timestamp = null;
            $this->color = self::COLORS[array_rand(self::COLORS, 1)];
        }
    }

    /**
     * вернуть цвет яблока
     *
     * @return string
     */
    public function showColor(): string
    {
        return $this->color;
    }

    /**
     * вернуть целостность яблока
     *
     * @return int
     */
    public function showIntegrity(): int
    {
        return $this->integrity;
    }

    /**
     * вернуть состояние яблока
     *
     * @return bool
     */
    public function showStateofHang(): bool
    {
        return $this->fallTimestamp === null;
    }

    /**
     * падение яблока с дерева
     */
    public function fall(): void
    {
        if ($this->fallTimestamp !== null) {
            throw new RuntimeException ("Apple is not on the tree");

        }
        $this->fallTimestamp = time();

    }

    /**
     * съесть яблоко
     *
     * @return void
     */
    public function eat($piece): void
    {
        $start = $this->fallTimestamp;
        $end = time();
        $secondsDiff = $end - $start;
        $rotTime = round($secondsDiff / 3600);

        if ($this->fallTimestamp === null) {
            throw new RuntimeException ("Do not eat this apple, it is on the tree");
        }
        if ($piece > 100 || $this->integrity <= 0 || $this->integrity < $piece) {
            throw new RuntimeException ("You can not eat more than whole apple, or it is already eaten");
        }
        if ($rotTime > 5) {
            throw new RuntimeException ("Do not eat rotten apple");
        }
        $this->integrity -= $piece;

    }
}