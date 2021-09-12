<?php
wp_footer();
$fields = get_fields('options');
?>

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
                <?php
                footerWidgets();
                get_template_part('pages/parts/footer-social');
                ?>
            </div>
        </div>
    </div>
</footer>

</body>
</html>