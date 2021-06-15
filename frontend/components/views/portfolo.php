<?php
/**@var \common\models\Gallery [] $gallery*/

?>
<section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Yotoq sharoitlari bilan tanishing</h2>
            <p>Eng so'ngi yangiliklar</p>
        </header>




        <?php
        foreach ($gallery as $model):
        ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <?= \yii\helpers\Html::img(\yii\helpers\Url::to([$model->pic_path]),['class' => 'img-fluid'])?>
                    <div class="portfolio-info">
                        <h4><?=$model->dormitory->name?></h4>
                        <p></p>

                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>


        </div>

    </div>

</section>