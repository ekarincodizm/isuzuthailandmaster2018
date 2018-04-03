<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_register`.
 */
class m180306_070725_create_customer_register_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer_register', [
            'c_id' => $this->primaryKey(),
            'fullname' => $this->string()->notNull(),
            'id_card' => $this->string()->notNull(),
            'birthdate' => $this->date()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string(),
            'customer_type' => $this->string(),
            'car_number' => $this->string(),
            'owner'  => $this->string(),
            'corporate' => $this->string(),
            'register_me' => $this->string(),
            'register_transfer' => $this->string(),
            'owner_name' => $this->string(),
            'related' => $this->string(),
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
        $this->dropTable('customer_register');
    }
}
