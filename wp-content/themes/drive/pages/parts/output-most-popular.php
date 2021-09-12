<section class="most-pop section">
    <div class="container">
        <h2 class="most-pop__title">
            <?php _e('Mest populære', 'drive') ?>
        </h2>
        <div class="most-pop__content">
            <?php
            $posts = getCars('car_most_popular', 3);
            if($posts): ?>
                <div class="most-pop__list owl-carousel">
                    <?php foreach($posts as $post): ?>
                        <?php get_template_part_var('pages/parts/card-view', ['car' => $post]) ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>