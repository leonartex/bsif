<?php get_header(); ?>
    <main>
        <div class="apresentacao">
            <?= wp_get_attachment_image(60) ?>
            <h1><span>Sistemas de Informação</span> <span>IFFar - Câmpus São Borja</span></h1>
            <nav aria-label="breadcrumb">
                <ol>
                    <li aria-current="page">Início</li>
                </ol>
            </nav>
        </div>
        <div id="conteudo">
            <div id="noticias">
                <div class="destaque-noticias">
                    <h2><a href="<?= get_site_url() ?>/noticias/">Notícias</a></h2>
            <?php
                $noticias = get_posts(array('numberposts' => 14,'category'=> 2));
                if($noticias <> null){
                    $i = 0;
                    foreach($noticias as $noticia){
                        if($i > 3) break;
            ?>
                    <article class="noticia">
                        <?= get_the_post_thumbnail($noticia) ?>
                        <h3><a href="<?= get_permalink($noticia->ID); ?>"><?= $noticia->post_title ?></a>
                        </h3>
                        <span class="pequeno"><span class="sr-only">Publicado em:</span> <?= get_the_date('j \d\e F \d\e Y', $noticia); ?></span>
                        <?php if(!get_the_post_thumbnail($noticia)) echo '<p>'.get_the_excerpt($noticia).'</p>';?>
                    </article>
                <?php
                        $i++;
                    }
                ?>
                </div>
                <div class="ultimas-noticias">
                    <ul>
                    <?php 
                        $i = 0;
                        foreach($noticias as $noticia){
                            if($i > 3){
                    ?>
                        <li>
                            <article>
                                <h3><a href="<?= get_permalink($noticia->ID); ?>"><?= $noticia->post_title ?></a></h3>
                                <span class="pequeno"><span class="sr-only">Publicado em:</span> <?= get_the_date('j \d\e F \d\e Y', $noticia); ?></span>
                            </article>
                        </li>
                    <?php
                            } 
                            $i++;
                        }
                    ?>
                    </ul>
                </div>
            <?php }else{ ?>
                    <p>Perdão, mas nenhuma notícia foi registrada ainda!</p>
                </div>
            <?php } ?>
            </div>
        
            <div class="projetos">
            <?php
                $projetos = get_posts(array('numberposts' => 6,'category'=> 3));
            ?>
                <h2><a href="<?= get_site_url() ?>/projetos/">Projetos</a></h2>
            <?php
            if($projetos <> null){
                foreach($projetos as $projeto){
            ?>
                <article class="projeto">
                    <?= get_the_post_thumbnail($projeto) ?>
                    <h3><a href="<?= get_permalink($projeto->ID); ?>"><?= $projeto->post_title; ?></a></h3>
                    <span class="pequeno"><?= get_the_category($projeto->ID)[0]->name ?></span>
                </article>
            <?php 
                }
            }else{ 
            ?>
                <div>
                    <h3>Perdão, mas ainda não foram registrados projetos no site!</h3>
                </div>
            <?php } ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>