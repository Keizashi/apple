<?php

use yii\db\Migration;

/**
 * Class m210329_144013_create_table_with_two_properties
 */
class m210329_144013_create_table_with_two_properties extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('apple',[
            'id' => $this->primaryKey(),
            'color' => $this->string(30),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safedown()
    {
        $this->dropTable('apple');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210329_144013_create_table_with_two_properties cannot be reverted.\n";

        return false;
    }
    */
}
