<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php the_title() ?></title>
    <?php wp_head(); ?>
</head>
<?php $fields = get_fields('options') ?>
<body <?php body_class(); ?>>
<header class="header">
    <div class="header__row">
        <div class="header__logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo $fields['site_logo'] ?>" class="logo" alt="logo-header">
            </a>
        </div>
        <div class="header__nav">
            <div class="nav__title">
                <?php echo $fields['site_title']; ?>
            </div>
            <div id="burger" class="nav__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="menu" class="nav__menu">
            <?php wp_nav_menu([
                'theme_location'  => 'main_header',
                'container_class' => 'menu__wrap',
                'menu_class'      => 'menu__list'
            ]) ?>
            <div class="menu__desc">
                <?php echo $fields['menu_desc'] ?>
            </div>
            <div class="menu__close trigger-close"></div>
            <div class="nav__luk trigger-close"><?php echo $fields['menu_close'] ?></div>
        </div>
    </div>
</header>
<main class="main">