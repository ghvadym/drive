<?php wp_footer();
$fields = get_fields('options')?>
</main>

<footer class="footer">
    <div class="container">
        <div class="footer__nav">
            <div class="row">
                <div class="footer-column col">
                    <a class="footer__logo" href="<?php echo home_url(); ?>">
                        <img src="<?php echo $fields['site_logo'] ?>" class="logo" alt="logo-header">
                    </a>
                    <div class="footer__title">
                        <?php echo $fields['site_title']; ?>
                    </div>
                </div>
                <?php footerWidgets() ?>
                <div class="footer-column col-md-4 col-lg-3">
                    <?php if(!empty($fields['footer_social_links'])): ?>
                        <div class="footer__social">
                            <?php foreach($fields['footer_social_links'] as $item): ?>
                                <div class="footer__social_row">
                                    <div class="social__title">
                                        <?php echo $item['title'] ?>
                                    </div>
                                    <div class="social__img">
                                        <img src="<?php echo $item['img'] ?>"
                                             alt="<?php echo $item['title'] ?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>