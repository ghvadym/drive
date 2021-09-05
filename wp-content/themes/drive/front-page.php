<?php
/*
  * Template name: Home
  */
get_header();
$fields = get_fields();
$fieldsOpt = get_fields('options');
$getCar = get_field('car_for_banner');
?>

<section class="home__intro" style="<?php echo getAcfImage($fields['home_intro_bg']) ?>">
    <div class="container">
        <div class="intro__body">
            <div class="intro__top">
                <div class="intro__top_logo">
                    <img src="<?php echo $fieldsOpt['site_logo'] ?>" class="intro-logo" alt="intro-logo">
                </div>
                <div class="intro__top_content">
                    <?php echo $fields['home_intro_content'] ?>
                </div>
                <div class="intro__top_btn">
                    <?php echo getAcfBtn($fields['home_intro_button'], 'intro__btn btn btn-arrow') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home__auto-view">
    <div class="container">
        <div class="auto-view__wrap">
            <div class="auto-view__desc">
                <?php echo $fields['home_intro_desc'] ?>
            </div>
            <div class="auto-view__info">
                <?php getInfoCar($getCar) ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();