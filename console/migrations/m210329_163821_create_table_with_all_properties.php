<?php

use yii\db\Migration;

/**
 * Class m210329_163821_create_table_with_all_properties
 */
class m210329_163821_create_table_with_all_properties extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('apple', 'appearance_timestamp', $this->integer(11));
        $this->addColumn('apple', 'fall_timestamp', $this->integer(11));
        $this->addColumn('apple', 'integrity', $this->tinyInteger(3));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('apple', 'appearance_timestamp');
        $this->dropColumn('apple', 'fall_timestamp');
        $this->dropColumn('apple', 'integrity');
    }
}
