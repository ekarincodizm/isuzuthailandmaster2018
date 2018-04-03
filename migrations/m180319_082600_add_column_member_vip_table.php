<?php

use yii\db\Migration;

/**
 * Class m180319_082600_add_column_member_vip_table
 */
class m180319_082600_add_column_member_vip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("member_vip", "vin_number", "VARCHAR( 255 ) NULL AFTER data_number");
        $this->renameColumn('member_vip', 'data_number', 'vip_number');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("member_vip", "vin_number");
        $this->renameColumn('member_vip', 'data_number', 'vip_number');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180319_082600_add_column_member_vip_table cannot be reverted.\n";

        return false;
    }
    */
}
