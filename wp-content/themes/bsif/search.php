<?php
/*
Template Name: Página de busca
*/
?>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<?php get_header() ?>
<div class="apresentacao">
    <h1>Busca</h1>
    <nav aria-label="breadcrumb">
        <ol>
            <li><a href="index.html">Início</a></li>
            <li aria-current="page">Busca</li>
        </ol>
    </nav>
</div>
<div id="conteudo" class="lista-pesquisa">
    <div>
        <form method="GET" action="<?= get_site_url() ?>">
            <input type="text" name="s" placeholder="Pesquisar...">
            <button type="submit"><i class="fas fa-search"></i><span class="compacta">
                    Pesquisar</span></button>
        </form>
    <?php if ( have_posts() ) : ?>
        <h2>Resultados de busca para "<?php echo esc_html( get_search_query() ); ?>"</h2>
        <p>Um total de <?= $total_results ?> resultado(s) encontrado(s).</p>
        <div class="listagem">
        <?php
            while ( have_posts() ) : the_post();
        ?>
            <div>
                <?php the_post_thumbnail(); ?>
                <div>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                    <span class="pequeno">
                    <?php
                        if(in_category(2)){
                    ?>
                        <span class="pequeno"><span class="sr-only">Publicado em:</span> <?= get_the_date('j \d\e F \d\e Y', $noticia); ?></span>
                    <?php }else{ ?>
                        <span class="pequeno">
                        <?php 
                        $categoria = get_the_category();
                        if($categoria[0]->parent <> 0){
                            $pai = get_category($categoria[0]->parent); 
                            echo $pai->name.'/';
                        }
                            echo $categoria[0]->name;
                        ?>
                        </span>
                    <?php } ?>
                    </span>
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile; ?>
            <?php 
            the_posts_pagination(
                array( 
                    'mid_size' => 2, 
                    'prev_text' => __( '<span class="sr-only">Página anterior</span><i class="fas fa-chevron-left"></i>', 'textdomain' ),
                    'next_text' => __( '<span class="sr-only">Página seguinte</span><i class="fas fa-chevron-right"></i>', 'textdomain' ), 
                ) ); 
            ?>
        </div>
    <?php
        else : 
    ?>
        <p>Nenhuma publicação encontrada</p>    
    <?php
        endif;
    ?>
    </div>
</div>
<?php get_footer() ?>