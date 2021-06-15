<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string|null $name Rasm nomi
 * @property string|null $pic_path Rasm
 * @property int|null $dormitory_id Yotoq xonani tanlang
 *
 * @property Dormitory $dormitory
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dormitory_id'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['pic_path'], 'string', 'max' => 255],
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
            'pic_path' => Yii::t('yii', 'Pic Path'),
            'dormitory_id' => Yii::t('yii', 'Dormitory ID'),
        ];
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
