<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $dormitory_id
 * @property string|null $description
 * @property int|null $capacity Necha kishilik xona
 *
 * @property Booking[] $bookings
 * @property Dormitory $dormitory
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dormitory_id', 'capacity'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 80],
            [['dormitory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dormitory::className(), 'targetAttribute' => ['dormitory_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name' => Yii::t('yii', 'Name'),
            'dormitory_id' => Yii::t('yii', 'Dormitory ID'),
            'description' => Yii::t('yii', 'Description'),
            'capacity' => Yii::t('yii', 'Capacity'),
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['room_id' => 'id']);
    }

    /**
     * Gets query for [[Dormitory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDormitory()
    {
        return $this->hasOne(Dormitory::className(), ['id' => 'dormitory_id']);
    }
}
