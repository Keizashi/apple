<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property string $color цвет яблока
 * @property integer $appearance_timestamp  время появления
 * @property integer $fall_timestamp время падения
 * @property integer $integrity целостность яблока
 */
class Apple extends ActiveRecord
{
    /** @var array набор цветов константа */
    const COLORS = ['red', 'yellow', 'green'];

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

    public function attributeLabels()
    {
        return [
            'id' => "№ яблока",
            'color' => 'Цвет',
            'appearance_timestamp' => 'Время появления',
            'fall_timestamp' => 'Время падения',
            'integrity' => 'Целостность в %',
        ];
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
        if ($this->fall_timestamp !== null) {
            throw new RuntimeException ("Apple is not on the tree");

        }
        $this->fall_timestamp = time();

    }

    /**
     * съесть яблоко
     *
     * @return void
     */
    public function eat($piece): void
    {
        $start = $this->fall_timestamp;
        $end = time();
        $secondsDiff = $end - $start;
        $rotTime = round($secondsDiff / 3600);

        if ($this->fall_timestamp === null) {
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