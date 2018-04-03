<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playfield".
 *
 * @property int $id
 * @property string $name
 * @property string $province
 * @property string $details
 * @property string $date
 * @property string $status
 * @property string $register_date
 * @property string $end_date
 * @property string $match_date
 * @property string $create_date
 */
class Playfield extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'playfield';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'register_date', 'end_date', 'match_date', 'create_date'], 'safe'],
            [['name', 'province', 'details', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'province' => 'Province',
            'details' => 'Details',
            'date' => 'Date',
            'status' => 'Status',
            'register_date' => 'Register Date',
            'end_date' => 'End Date',
            'match_date' => 'Match Date',
            'create_date' => 'Create Date',
        ];
    }
}
