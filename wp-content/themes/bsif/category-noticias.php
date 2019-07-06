<?php get_header(); ?>
<main>
    <div class="apresentacao">
        <h1>Notícias</h1>
        <nav aria-label="breadcrumb">
            <ol>
                <li><a href="index.html">Início</a></li>
                <li aria-current="page">Notícias</li>
            </ol>
        </nav>
    </div>
    <div id="conteudo" class="lista-noticias">
    <?php
        //$noticias = new WP_Query(array('cat'=> 0));
        if(have_posts()){
    ?>  
        <div>
            <h2 class="sr-only">Notícias em destaque</h2>
            <?php the_post(); ?>
            <div class="noticia noticia-destaque">
                <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                <span class="pequeno"><span class="sr-only">Publicado em:</span> <?= get_the_date('j \d\e F \d\e Y'); ?></span>
                <?= get_the_post_thumbnail() ?>
                <p><?= get_the_excerpt() ?></p>
            </div>

            <?php
            for($i = 0; $i <3; $i++){
                if(have_posts()){
                    the_post();
            ?>
            <div class="noticia">
                <?= get_the_post_thumbnail() ?>
                <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                <span class="pequeno"><span class="sr-only">Publicado em:</span> <?= get_the_date('j \d\e F \d\e Y'); ?></span>
                <?php if(!has_post_thumbnail()) echo '<p>'.get_the_excerpt().'</p>';?>
            </div>

            <?php
                }
            }
            ?>

            <div class="listagem">
            <?php
                while(have_posts()){
                    the_post();
            ?>
                <div>
                    <?= get_the_post_thumbnail() ?>
                    <div>
                        <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                        <span class="pequeno"><span class="sr-only">Publicado em:</span> <?= get_the_date('j \d\e F \d\e Y'); ?></span>
                        <p><?= get_the_excerpt() ?></p>
                    </div>
                </div>
            <?php } ?>
                <?php 
                the_posts_pagination(
                    array( 
                        'mid_size' => 2, 
                        'prev_text' => __( '<span class="sr-only">Página anterior</span><i class="fas fa-chevron-left"></i>', 'textdomain' ),
                        'next_text' => __( '<span class="sr-only">Página seguinte</span><i class="fas fa-chevron-right"></i>', 'textdomain' ), 
                    ) ); 
                ?>
            </div>
        </div>
    <?php }else{ ?>
        <div>
            <p>Nenhuma notícia foi encontrada.</p>
        <div>
    <?php } ?>
    </div>
</main>
<?php get_footer(); ?>