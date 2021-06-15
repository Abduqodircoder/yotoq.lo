<?php
namespace frontend\components;

/**@var int $applied*/
/**@var int $all*/
/**@var int $prosessing*/
?>

<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $applied?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Qabul qilingan arizalar </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $prosessing?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Ko'rib chiqilayotgan arizalar</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-headset" style="color: #15be56;"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $all?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Umumiy arizalar soni</p>
                    </div>
                </div>
            </div>

<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="count-box">-->
<!--                    <i class="bi bi-people" style="color: #bb0852;"></i>-->
<!--                    <div>-->
<!--                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>-->
<!--                        <p>Hard Workers</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>

    </div>
</section>