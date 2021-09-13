<?php
/*
  * Template name: Home
  */
get_header();
$fields = get_fields();
$fieldsOpt = get_fields('options');
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
                <div class="intro__top_content_mobile">
                    <?php echo $fields['home_intro_content_mob'] ?>
                </div>
                <div class="intro__top_btn">
                    <?php echo getAcfBtn($fields['home_intro_button'], 'intro__btn btn btn-arrow') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="intro__social">
        <div class="social__title">
            <?php echo $fieldsOpt['social_title'] ?>
        </div>
        <div class="social__sep"></div>
        <?php if($fieldsOpt['social_list']): ?>
            <div class="social__list">
                <?php foreach($fieldsOpt['social_list'] as $item): ?>
                    <a href="<?php echo $item['link'] ?>"
                       class="social__item"
                       target="_blank">
                        <img src="<?php echo $item['img'] ?>" alt="social">
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
    </div>
</section>

<section class="home__auto-view">
    <div class="container">
        <div class="auto-view__wrap">
            <div class="auto-view__info">
                <?php get_template_part_var('pages/parts/card-view', ['car' => $fields['car_for_banner']]) ?>
            </div>
            <div class="auto-view__desc">
                <?php echo $fields['home_intro_desc'] ?>
                <div class="intro__arrow">
                    <img src="<?php echo getImage('arrow-right-white.svg'); ?>" alt="arrow-down">
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('pages/parts/output-categories'); ?>
<?php get_template_part('pages/parts/cta-section'); ?>
<?php get_template_part('pages/parts/output-most-popular'); ?>
<?php get_template_part('pages/parts/how-work'); ?>

<section class="why-dy section">
    <div class="container">
        <div class="why-dy__content">
            <h2 class="why-dy__title">
                <?php echo $fields['home_why_dy_title'] ?>
            </h2>
            <div class="why-dy__desc">
                <?php echo $fields['home_why_dy_text'] ?>
            </div>
            <div class="why-dy__btn">
                <?php echo getAcfBtn($fields['home_why_dy_btn'], 'btn'); ?>
            </div>
        </div>
        <div class="why-dy__img">
            <img src="<?php echo $fields['home_why_dy_img'] ?>"
                 alt="<?php echo $fields['home_why_dy_title'] ?>">
        </div>
    </div>
</section>

<?php
get_footer();