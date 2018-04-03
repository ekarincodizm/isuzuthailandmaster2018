<?php

use yii\db\Migration;

/**
 * Class m180307_022501_add_clumn_member_vip_table
 */
class m180307_022501_add_clumn_member_vip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("member_vip", "join_me", "VARCHAR( 255 ) NULL AFTER corporate");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("member_vip", "join_me");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180307_022501_add_clumn_member_vip_table cannot be reverted.\n";

        return false;
    }
    */
}
