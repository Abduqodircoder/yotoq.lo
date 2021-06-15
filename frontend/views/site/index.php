<?php

use frontend\components\AboutWidget;
use frontend\components\CommentWidget;
use frontend\components\ContactWidget;
use frontend\components\CountsWidget;
use frontend\components\FeaturesWidget;
use frontend\components\PortfoloWidget;
use frontend\components\PriceWidget;
use frontend\components\ServicesWidget;
use frontend\components\SliderWidget;
use frontend\components\ValuesWidget;

/**@var int $applied*/
/**@var int $all*/
/**@var int $prosessing*/
/**@var \common\models\Student $model*/
?>

<main id="main">

    <?= SliderWidget::widget()?>
    <?= AboutWidget::widget()?>
    <?= ValuesWidget::widget()?>
    <?= CountsWidget::widget(['applied' => $applied,'all' => $all,'prosessing' =>  $prosessing])?>
    <?= FeaturesWidget::widget()?>
    <?= ServicesWidget::widget(['applied' => $applied])?>
    <?= PriceWidget::widget()?>
    <?= PortfoloWidget::widget()?>
    <?= CommentWidget::widget()?>
    <?= ContactWidget::widget(['model' => $model])?>
</main><!-- End #main -->

<!-- ======= Footer ======= -->

