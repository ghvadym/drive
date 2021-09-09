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
                <?php get_template_part_var('pages/parts/card-view', ['car' => $getCar]) ?>
            </div>
        </div>
    </div>
</section>

<?php getCarsCategories() ?>

<?php get_template_part('pages/parts/cta-section'); ?>

<div class="section">
    <div class="container">
        <div class="most-pop">
            <div class="most-pop__title title">
                <?php
                $args = [
                    'post_type'      => 'car',
                    'post_status'    => 'publish',
                    'meta_key'       => 'car_most_popular',
                    'orderby'        => 'menu_order',
                    'order'          => 'desc',
                ];
                $posts = get_posts($args); ?>

                <?php if($posts): ?>
                    <div class="most-pop__list">
                        <?php foreach($posts as $post): ?>
                            <?php get_template_part_var('pages/parts/card-view', ['car' => $post]) ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();