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
                        <span class="pequeno"><?= get_the_category()[0]->name ?></span>
                    <?php } ?>
                    </span>
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile; ?>
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