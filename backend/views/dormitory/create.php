<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dormitory */

$this->title = Yii::t('yii', 'Create Dormitory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Dormitories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dormitory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
