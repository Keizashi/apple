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
        $this->addColumn('apple', 'appearanceTimestamp', $this->integer(11));
        $this->addColumn('apple', 'fallTimestamp', $this->integer(11));
        $this->addColumn('apple', 'integrity', $this->tinyInteger(3));
    }

    /**
     * {@inheritdoc}
     */
    public function safedown()
    {
        $this->dropColumn('apple', 'appearanceTimestamp');
        $this->dropColumn('apple', 'fallTimestamp');
        $this->dropColumn('apple', 'integrity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210329_163821_create_table_with_all_properties cannot be reverted.\n";

        return false;
    }
    */
}
