<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
    <script src="<?= get_template_directory_uri(); ?>/js/script.js"></script>
    <?php wp_head(); ?>
</head>

<body>
    <header id="cabecalho">
        <nav>
            <div id="logo-div">
                <button id="menu"><i class="fas fa-bars"></i><span class="sr-only">Expandir menu lateral</span></button>
                <a href="<?= get_site_url()?>">BSIF</a>
            </div>
            <ul>
                <li <?php if($wp->request == '') echo 'aria-current="page"' ?>><a href="<?= get_site_url() ?>/">Início</a></li>
                <li <?php if($wp->request == 'curso') echo 'aria-current="page"' ?>><a href="<?= get_site_url() ?>/curso/">Curso</a></li>
                <li <?php if(substr( $wp->request.'/', 0, 9 ) == 'noticias/') echo 'aria-current="location"' ?>><a href="<?= get_site_url() ?>/noticias/">Notícias</a></li>
                <li <?php if(substr( $wp->request.'/', 0, 9 ) == 'projetos/') echo 'aria-current="location"' ?>><a href="<?= get_site_url() ?>/projetos/">Projetos</a></li>
                <li <?php if(substr( $wp->request.'/', 0, 4 ) == 'tcc/') echo 'aria-current="location"' ?>><a href="<?= get_site_url() ?>/tcc/">TCC</a></li>
                <li>
                    <form id="pesquisa" class="pesquisa" action="<?= get_site_url() ?>" method="GET">
                        <button type="button" id="pesquisar"><i class="fas fa-search"></i><span>Pesquisar</span></button>
                        <input type="text" id="campoPesquisa" name="s" placeholder="Pesquisar...">
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <aside id="lateral">
        <nav>
            <ul>
                <li <?php if($wp->request == '') echo 'aria-current="page"' ?>><a href="<?= get_site_url() ?>">Início</a></li>
                <li <?php if($wp->request == 'curso') echo 'aria-current="page"' ?>><a href="<?= get_site_url() ?>/curso/">Curso</a></li>
                <li <?php if(substr( $wp->request.'/', 0, 9 ) == 'noticias/') echo 'aria-current="location"' ?>><a href="<?= get_site_url() ?>/noticias/">Notícias</a></li>
                <li <?php if(substr( $wp->request.'/', 0, 9 ) == 'projetos/') echo 'aria-current="location"' ?>><a href="<?= get_site_url() ?>/projetos/">Projetos</a></li>
                <li <?php if(substr( $wp->request.'/', 0, 4 ) == 'tcc/') echo 'aria-current="location"' ?>><a href="<?= get_site_url() ?>/tcc/">TCC</a></li>
            </ul>
        </nav>
    </aside>