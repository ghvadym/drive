<?php
$fields = get_fields($post->ID);
$term = get_the_terms($post, 'categories')[0];
?>
<div class="category__item">
    <div class="category__numb"><?php echo __('Kategori', 'GMK') . ' ' . $iteration; ?></div>
    <div class="category__head">
        <div class="category__title">
            <?php echo $term->name ?>
        </div>
        <div class="category__img">
            <img src="<?php echo get_the_post_thumbnail_url($post); ?>"
                 alt="<?php echo $post->post_title ?>">
        </div>
    </div>
    <div class="category__desc">
        <div class="category__price">
            <small class="price__title"><?php _e('Fra', 'GMK') ?></small>
            <div class="price__item">
                <strong><?php echo $fields['car_price'] ?></strong>
                <span><?php _e('kr./md', 'GMK') ?></span>
            </div>
        </div>
        <div class="category__property">
            <?php echo $fields['car_property'] ?>
        </div>
        <div class="category__text">
            <?php echo textLimiter($post->post_excerpt, 120) ?>
        </div>
        <div class="category__btn">
            <a href="/vaelg-en-bil/" class="btn">
                <?php _e('Se kategorien her', 'drive') ?>
            </a>
        </div>
    </div>
</div>