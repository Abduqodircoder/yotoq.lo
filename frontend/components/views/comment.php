<?php
/**@var \common\models\Comment [] $comment*/

use yii\helpers\Html;
use yii\helpers\Url;

?>

<section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
<!--            <h2>Biz haqimizda talabalar nima deydi</h2>-->
            <p>Biz haqimizda talabalar nima deydi</p>
        </header>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
            <?php
            foreach ($comment as $model):
            ?>
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                       <?= $model->description?>
                        </p>
                        <div class="profile mt-auto">
                            <?= Html::img(Url::to([$model->student->self_pic]),["class" => "testimonial-img"])?>
                            <h3><?= $model->student->getFullName()?></h3>
                            <h4><?= $model->student->getFaculty()?></h4>
                        </div>
                    </div>
                </div><!-- End testimonial item -->
                <?php
            endforeach;
            ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>