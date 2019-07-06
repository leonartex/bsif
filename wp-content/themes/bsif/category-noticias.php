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
        $noticias = new WP_Query(array('cat'=> 0));
        if($noticias->have_posts()){
    ?>  
        <div>
            <h2 class="sr-only">Notícias em destaque</h2>
            <?php $noticias->the_post(); ?>
            <div class="noticia noticia-destaque">
                <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                <span class="pequeno"><span class="sr-only">Publicado em:</span> <?= get_the_date('j \d\e F \d\e Y'); ?></span>
                <?= get_the_post_thumbnail() ?>
                <p><?= get_the_excerpt() ?></p>
            </div>

            <?php
            for($i = 0; $i <3; $i++){
                if($noticias->have_posts()){
                    $noticias->the_post();
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
                while($noticias->have_posts()){
                    $noticias->the_post();
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
                <nav class="paginacao">
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                        <li aria-current="page"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="espaco">...</li>
                        <li><a href="#">10</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
                    </ul>
                </nav>
                <?php print_r($noticias); ?>
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