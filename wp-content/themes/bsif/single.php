<?php get_header(); ?>
    <main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="apresentacao">
            <h1><?php the_title(); ?></h1>
            <nav aria-label="breadcrumb">
                <ol>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Início</a></li>
                <?php
                    $categoria = get_the_category();
                    $slug = $categoria->slug;

                    if($categoria[0]->parent <> 0){
                        $pai = get_category($categoria[0]->parent);
                        $slug = $pai->slug;

                        echo '<li><a href="'.get_category_link($pai).'">'.$pai->name.'</a></li>';
                    }

                    echo '<li><a href="'.get_category_link($categoria[0]).'">'.$categoria[0]->name.'</a></li>'; 
                ?>
                    <li aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
        </div>
        <?php

        ?>
        <div id="conteudo" class="corpo post-<?=$slug?>">
            <div>
                <?php if($categoria[0]->name == 'Notícias'){?>
                <span class="sr-only">Publição:</span> <span class="forte"><?php the_time('j \d\e F \d\e Y') ?></span>,
                <?php } ?>
                
                <?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; else : ?>
            <div>
                <p>Nenhum post encontrado.</p>
            </div>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>