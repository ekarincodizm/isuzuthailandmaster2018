<?php

use yii\db\Migration;

/**
 * Class m180322_091731_add_column_cutomer_register_table
 */
class m180322_091731_add_column_cutomer_register_table extends Migration
{
    /**
     * {@inheritdoc}
     */
      public function safeUp()
    {
        $this->addColumn("customer_register", "status", "VARCHAR( 255 ) NULL AFTER playfield");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("customer_register", "status");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180322_091731_add_column_cutomer_register_table cannot be reverted.\n";

        return false;
    }
    */
}
