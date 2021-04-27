<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property string $color цвет яблока
 * @property integer $appearance_timestamp  время появления
 * @property integer $fall_timestamp время падения
 * @property integer $amount целостность яблока
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
            $this->amount = 100;
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
            'amount' => 'Целостность в %',
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
        return $this->amount;
    }

    /**
     * вернуть состояние яблока
     *
     * @return bool
     */
    public function showStateofHang(): bool
    {
        return $this->fall_timestamp === null;
    }

    /**
     * падение яблока с дерева
     */
    public function fall(): void
    {
        if ($this->fall_timestamp !== null) {
            throw new \RuntimeException ("Apple is not on the tree");

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
            throw new \RuntimeException ("Do not eat this apple, it is on the tree");
        }
        if ($piece > 100 || $this->amount <= 0 || $this->amount < $piece) {
            throw new \RuntimeException ("You can not eat more than whole apple, or it is already eaten");
        }
        if ($rotTime > 5) {
            throw new \RuntimeException ("Do not eat rotten apple");
        }
        $this->amount -= $piece;

    }

    /**
     * удалить съеденное яблоко
     * @inheritDoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($this->amount < 1) {
            $this->delete();
        }
    }
}