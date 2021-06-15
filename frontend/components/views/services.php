<?php
/**@var int $applied*/
/**@var array $models*/

//card lar ning rangi xar xil chiqishligi uchun qilindi
$colors = ['blue', 'purple', 'red', 'green', 'orange', 'pink'];
?>

<section id="services" class="services">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Bizning yotoqxonalar</h2>
            <p>1986 o'rinli hozirda <?= $applied?> ta talaba qizlar istiqomat qilmoqda</p>
        </header>

        <div class="row gy-4">


            <?php
            foreach ($models as $model):
            ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-box <?= $colors[array_rand($colors)]?>">
                    <i class="bi bi-house-fill icon"></i>
                    <h3><?= $model->name?></h3>
                    <p><?= $model->place_count?> o'rinli <?=$model->stair?> qavatli bino</p>
                    <a href="<?=\yii\helpers\Url::to(['site/about?id='.$model->id])?>" class="read-more"><span>Ko'proq</span> <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <?php
            endforeach;
            ?>

        </div>

    </div>

</section>