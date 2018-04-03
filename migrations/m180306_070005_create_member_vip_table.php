<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member_vip`.
 */
class m180306_070005_create_member_vip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('member_vip', [
            'm_id' => $this->primaryKey(),
            'vip_fullname' => $this->string()->notNull(),
            'vip_id_card' => $this->string()->notNull(),
            'vip_birthdate' => $this->date()->notNull(),
            'vip_phone' => $this->string()->notNull(),
            'vip_email' => $this->string(),
            'customer_type' => $this->string(),
            'owner'  => $this->string(),
            'corporate' => $this->string(),
            'register_transfer' => $this->string(),
            'owner_name' => $this->string(),
            'related' => $this->string(),
            'register_fullname' => $this->string(),
            'register_id_card' => $this->string(),
            'register_birthdate' => $this->string(),
            'register_phone' => $this->string(),
            'register_email' => $this->string(),
            'verifyid' => $this->string(),
            'playfield' => $this->string()->notNull(),
            'create_date' => $this->dateTime(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('member_vip');
    }
}
