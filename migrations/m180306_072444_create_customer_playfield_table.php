<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_playfield`.
 */
class m180306_072444_create_customer_playfield_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('playfield', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'province' => $this->string(),
            'details' => $this->string(),
            'date' => $this->dateTime(),
            'status' => $this->string(),
            'register_date'=> $this->dateTime(),
            'end_date' => $this->dateTime(),
            'match_date' => $this->dateTime(),
            'create_date' => $this->dateTime(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('playfield');
    }
}
