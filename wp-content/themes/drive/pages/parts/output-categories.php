<?php

$posts = getCars('car_widget');
if ($posts): ?>
    <section class="categories">
        <div class="container">
            <div class="categories__wrap">
                <div class="categories__title">
                    <div class="title__part">
                        <?php _e('Vælg imellem', 'drive') ?>
                    </div>
                    <div class="title__part">
                        <?php echo count($posts) ?>
                    </div>
                    <div class="title__part">
                        <?php _e('kategorier', 'drive') ?>
                    </div>
                </div>
                <div class="categories__list owl-carousel">
                    <?php
                    $iteration = 1;
                    foreach ($posts as $post): setup_postdata($post);
                        get_template_part_var('pages/parts/card-category',
                            ['post' => $post, 'iteration' => $iteration]);
                        $iteration++;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata();