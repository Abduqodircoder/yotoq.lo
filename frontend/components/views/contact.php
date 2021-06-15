<?php
/**@var \common\models\Student $model*/

use common\models\Department;
use common\models\District;
use common\models\Faculty;
use yii\helpers\ArrayHelper;

?>
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Bog'lanish</h2>
            <p>Ariza yuboruvchilar uchun</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Manzil</h3>
                            <p>Andijon Shahar,<br>Universitet ko'cha 129-uy</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Telefon raqamlari</h3>
                            <p>+998742238814</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>E-Pochta</h3>
                            <p>agsu_info@edu.uz</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-clock"></i>
                            <h3>Ish vaqti</h3>
                            <p>Dushanba - Shanba<br>8:30 - 16:00</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <?php
                $form = \yii\bootstrap4\ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data','class' => 'php-email-form']]);
                ?>
                <div class="row gy-4">
                <?= $form->field($model, 'f_name',['options' =>['class' => 'col-md-6']])->textInput(['placeholder' => 'Ism'])?>
                <?= $form->field($model, 'l_name',['options' =>['class' => 'col-md-6']])->textInput(['placeholder' => 'Familya'])?>
                <?= $form->field($model, 'm_name',['options' =>['class' => 'col-md-12']])->textInput(['placeholder' => 'Sharif'])?>

                <?= $form->field($model, 'region_id',['options' =>['class' => 'col-md-6']])->dropdownList(ArrayHelper::map(\common\models\Region::find()->all(),'id','name'),
                    [
                        'prompt' =>'tanlang',
                        'onchange' => '$.post("'.\yii\helpers\Url::to(['site/districtlists?id=']).'"+$(this).val(),function(data){
    $("select#student-district_id").html(data)});'
                    ])?>
                <?= $form->field($model, 'district_id',['options' =>['class' => 'col-md-6']])->dropdownList(ArrayHelper::map(District::find()->all(),'id', 'name'),['prompt' =>'tanlang'])?>
                <?= $form->field($model, 'faculty_id',['options' =>['class' => 'col-md-6']])->dropdownList(ArrayHelper::map(Faculty::find()->all(),'id','name'),
                    [
                        'prompt' =>'tanlang',
                        'onchange' => '$.post("'.\yii\helpers\Url::to(['site/departmentlists?id=']).'"+$(this).val(),function(data){
    $("select#student-department_id").html(data)});'
                    ])?>
                <?= $form->field($model, 'department_id',['options' =>['class' => 'col-md-6']])->dropdownList(ArrayHelper::map(Department::find()->all(),'id','name'),['prompt' =>'tanlang'])?>
                <?= $form->field($model, 'course',['options' =>['class' => 'col-md-6']])->dropdownList([1,2,3,4],['prompt' =>'tanlang'])?>
                <?= $form->field($model, 'group_name',['options' =>['class' => 'col-md-6']])->textInput(['placeholder' => 'Guruh nomi'])?>
                <?= $form->field($model, 'phone',['options' =>['class' => 'col-md-12']])->textInput(['placeholder' => '+998901234567'])?>
                <?= $form->field($model, 'passport',['options' =>['class' => 'col-md-6']])->textInput(['placeholder' =>'AA7300561'])?>
                <?= $form->field($model, 'pas_pic',['options' =>['class' => 'col-md-6']])->fileInput()?>
                <?= $form->field($model, 'social_protection',['options' =>['class' => 'col-md-6']])->dropdownList([1,2,3,4],['prompt' =>'tanlang'])?>
                <?= $form->field($model, 'basis_path',['options' =>['class' => 'col-md-6']])->fileInput()?>
                <?= $form->field($model, 'application_path',['options' =>['class' => 'col-md-6']])->fileInput()?>
                <?= $form->field($model, 'self_pic',['options' =>['class' => 'col-md-6']])->fileInput()?>
                </div>
                <?= \yii\helpers\Html::submitButton('Yuborish',['class' => 'col-md-12']) ?>
                </div>
                <?php
                \yii\bootstrap4\ActiveForm::end();
                ?>

            </div>

        </div>

    </div>

</section>