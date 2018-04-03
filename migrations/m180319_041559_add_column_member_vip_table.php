<?php

use yii\db\Migration;

/**
 * Class m180319_041559_add_column_member_vip_table
 */
class m180319_041559_add_column_member_vip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("member_vip", "datamember_type", "VARCHAR( 255 ) NULL AFTER vip_fullname");
        $this->addColumn("member_vip", "data_number", "VARCHAR( 255 ) NULL AFTER datamember_type");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("member_vip", "datamember_type");
        $this->dropColumn("member_vip", "data_number");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180319_041559_add_column_member_vip_table cannot be reverted.\n";

        return false;
    }
    */
}
