<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_register".
 *
 * @property int $c_id
 * @property string $fullname
 * @property string $id_card
 * @property string $birthdate
 * @property string $phone
 * @property string $email
 * @property string $customer_type
 * @property string $car_number
 * @property string $owner
 * @property string $corporate
 * @property string $register_me
 * @property string $register_transfer
 * @property string $owner_name
 * @property string $related
 * @property string $verifyid
 * @property string $playfield
 * @property string $create_date
 */
class CustomerRegister extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'id_card', 'birthdate', 'phone', 'playfield'], 'required'],
            [['birthdate', 'create_date'], 'safe'],
            [['fullname', 'id_card', 'phone', 'email', 'customer_type', 'car_number', 'owner', 'corporate', 'register_me', 'register_transfer', 'owner_name', 'related', 'verifyid', 'playfield'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'fullname' => 'Fullname',
            'id_card' => 'Id Card',
            'birthdate' => 'Birthdate',
            'phone' => 'Phone',
            'email' => 'Email',
            'customer_type' => 'Customer Type',
            'car_number' => 'Car Number',
            'owner' => 'Owner',
            'corporate' => 'Corporate',
            'register_me' => 'Register Me',
            'register_transfer' => 'Register Transfer',
            'owner_name' => 'Owner Name',
            'related' => 'Related',
            'verifyid' => 'Verifyid',
            'playfield' => 'Playfield',
            'create_date' => 'Create Date',
        ];
    }
}
