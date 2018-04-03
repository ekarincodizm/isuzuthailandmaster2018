<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_vip".
 *
 * @property int $m_id
 * @property string $vip_fullname
 * @property string $datamember_type
 * @property string $vip_number
 * @property string $vin_number
 * @property string $vip_id_card
 * @property string $vip_birthdate
 * @property string $vip_phone
 * @property string $vip_email
 * @property string $customer_type
 * @property string $owner
 * @property string $corporate
 * @property string $join_me
 * @property string $register_transfer
 * @property string $owner_name
 * @property string $related
 * @property string $register_fullname
 * @property string $register_id_card
 * @property string $register_birthdate
 * @property string $register_phone
 * @property string $register_email
 * @property string $verifyid
 * @property string $playfield
 * @property string $create_date
 */
class MemberVip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_vip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vip_fullname', 'vip_id_card', 'vip_birthdate', 'vip_phone', 'playfield'], 'required'],
            [['vip_birthdate', 'create_date'], 'safe'],
            [['vip_fullname', 'datamember_type', 'vip_number', 'vin_number', 'vip_id_card', 'vip_phone', 'vip_email', 'customer_type', 'owner', 'corporate', 'join_me', 'register_transfer', 'owner_name', 'related', 'register_fullname', 'register_id_card', 'register_birthdate', 'register_phone', 'register_email', 'verifyid', 'playfield'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'm_id' => 'M ID',
            'vip_fullname' => 'Vip Fullname',
            'datamember_type' => 'Datamember Type',
            'vip_number' => 'Vip Number',
            'vin_number' => 'Vin Number',
            'vip_id_card' => 'Vip Id Card',
            'vip_birthdate' => 'Vip Birthdate',
            'vip_phone' => 'Vip Phone',
            'vip_email' => 'Vip Email',
            'customer_type' => 'Customer Type',
            'owner' => 'Owner',
            'corporate' => 'Corporate',
            'join_me' => 'Join Me',
            'register_transfer' => 'Register Transfer',
            'owner_name' => 'Owner Name',
            'related' => 'Related',
            'register_fullname' => 'Register Fullname',
            'register_id_card' => 'Register Id Card',
            'register_birthdate' => 'Register Birthdate',
            'register_phone' => 'Register Phone',
            'register_email' => 'Register Email',
            'verifyid' => 'Verifyid',
            'playfield' => 'Playfield',
            'create_date' => 'Create Date',
        ];
    }
}
