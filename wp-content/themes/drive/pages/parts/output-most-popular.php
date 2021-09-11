<section class="most-pop section">
    <div class="container">
        <div class="most-pop__title title">
            <?php
            $posts = getCars('car_most_popular', 3);
            if($posts): ?>
                <div class="most-pop__list">
                    <?php foreach($posts as $post): ?>
                        <?php get_template_part_var('pages/parts/card-view', ['car' => $post]) ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>