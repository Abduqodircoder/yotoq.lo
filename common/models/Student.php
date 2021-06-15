<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string|null $f_name Ism
 * @property string|null $m_name Familya
 * @property string|null $l_name Sharif
 * @property int|null $course Kurs
 * @property string|null $application_path Yotoqxona uchun ariza(pdf)
 * @property int|null $department_id Yo'nalish
 * @property int|null $district_id Tuman
 * @property string|null $group_name Guruh nomeri
 * @property string|null $phone Telefon raqam
 * @property string|null $passport Passport serya va raqam
 * @property string|null $pas_pic Passport rasm
 * @property string|null $self_pic Shaxsni tasdiqlovchi rasm
 * @property int|null $social_protection Ijtimoiy himoya
 * @property string|null $basis_path Ijtimoiy himoya asosi (hujjat)
 * @property int|null $status Ariza qabul qilinganligi (Ha, Yo'q)
 *
 * @property Booking[] $bookings
 * @property Department $department
 * @property-read string $faculty
 * @property-read string $fullName
 * @property District $district
 */
class Student extends \yii\db\ActiveRecord
{

    public $faculty_id;
    public $region_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_path', 'passport', 'pas_pic',
              'region_id', 'district_id', 'department_id',
              'faculty_id', 'course', 'f_name', 'l_name', 'phone'], 'required'],
            ['status', 'default', 'value' => 0],
            [['faculty_id', 'region_id', 'course', 'department_id', 'district_id', 'social_protection', 'status'], 'integer'],
            [['group_name'], 'string', 'max' => 20],
            [['f_name', 'm_name', 'l_name'], 'string', 'max' => 45],
            [['application_path', 'pas_pic', 'self_pic', 'basis_path'], 'safe'],
            [['phone'], 'string', 'max' => 13],
            [['passport'], 'string', 'max' => 9],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'f_name' => Yii::t('yii', 'Ismingiz'),
            'm_name' => Yii::t('yii', 'Sharifingiz'),
            'l_name' => Yii::t('yii', 'Familyangiz'),
            'course' => Yii::t('yii', 'Kursingiz'),
            'faculty_id' => Yii::t('yii', 'Fakultetingiz'),
            'department_id' => Yii::t('yii', 'Yo\'nalishingiz'),
            'region_id' => Yii::t('yii', 'Viloyatingiz'),
            'district_id' => Yii::t('yii', 'Tumaningiz'),
            'group_name' => Yii::t('yii', 'Guruhingiz'),
            'phone' => Yii::t('yii', 'Telefon raqamingiz'),
            'passport' => Yii::t('yii', 'Passport serya va raqamnigiz'),
            'social_protection' => Yii::t('yii', 'Ijtimoiy himoya uchun'),
            'status' => Yii::t('yii', 'Status'),
            'pas_pic' => Yii::t('yii', 'Passport rasmingiz'),
            'self_pic' => Yii::t('yii', 'O\'zingizni rasmingiz (3x4)'),
            'basis_path' => Yii::t('yii', 'Ijtimoiy himoya asosingiz (hujjat)'),
            'application_path' => Yii::t('yii', 'Yotoqxona uchun arizangiz'),
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function upload()
    {
        if ($this->validate()) {

            if(!empty($this->pas_pic) && $this->pas_pic instanceof \yii\web\UploadedFile){
                $this->pas_pic->saveAs('pictures/'. $this->passport . '.' . $this->pas_pic->extension);
                $this->pas_pic = 'pictures/'.$this->passport. '.' . $this->pas_pic->extension;
            }
            if(!empty($this->self_pic) && $this->self_pic instanceof \yii\web\UploadedFile){
                $this->self_pic->saveAs('pictures/'. $this->passport . 'self.' . $this->self_pic->extension);
                $this->self_pic = 'pictures/'.$this->passport. 'self.' . $this->self_pic->extension;
            }
            if(!empty($this->basis_path) && $this->basis_path instanceof \yii\web\UploadedFile){
                $this->pas_pic->saveAs('pictures/'. $this->passport . 'basis.' . $this->basis_path->extension);
                $this->pas_pic = 'pictures/'.$this->passport. 'basis.' . $this->basis_path->extension;
            }
            if(!empty($this->application_path) && $this->application_path instanceof \yii\web\UploadedFile){
                $this->application_path->saveAs('pictures/'. $this->passport . 'app.' . $this->application_path->extension);
                $this->application_path = 'pictures/'.$this->passport. 'app.' . $this->application_path->extension;
            }


            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    public  function getFullName()
    {
        return $this->f_name.' '.$this->l_name.' '.$this->m_name;
    }

    public function getFaculty(){
        return $this->department->faculty->name.' '. $this->department->name." yo'nalish ".$this->course." kurs talabasi";
    }
}
