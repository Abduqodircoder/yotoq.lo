<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dormitory".
 *
 * @property int $id
 * @property string|null $name Talabalar turar joyi nomi
 * @property string|null $description Talabalar turar joyi haqida ma'lumot
 * @property string|null $pic_path Turar joy rasmi
 * @property int|null $place_count Necha o'rinli 
 * @property int|null $stair Necha qavat
 *
 * @property Gallery[] $galleries
 * @property Room[] $rooms
 */
class Dormitory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dormitory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['place_count', 'stair'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['pic_path'], 'string', 'max' => 255],
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
            'description' => Yii::t('yii', 'Description'),
            'pic_path' => Yii::t('yii', 'Pic Path'),
            'place_count' => Yii::t('yii', 'Place Count'),
            'stair' => Yii::t('yii', 'Stair'),
        ];
    }

    /**
     * Gets query for [[Galleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['dormitory_id' => 'id']);
    }

    /**
     * Gets query for [[Rooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['dormitory_id' => 'id']);
    }
}
