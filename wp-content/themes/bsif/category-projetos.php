<?php get_header() ?>
<main>
    <div class="apresentacao">
        <h1><?php wp_title(''); ?></h1>
        <nav aria-label="breadcrumb">
            <ol>
                <li><a href="<?= get_site_url() ?>/">Início</a></li>
            <?php if(!is_category('projetos')){ ?>
                <li><a href="<?= get_site_url() ?>/projetos/">Projetos</a></li>
            <?php } ?>
                <li aria-current="page"><?php wp_title(''); ?></li>
            </ol>
        </nav>
    </div>
    <div id="conteudo">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices ex quam, et
            euismod dolor interdum vestibulum. Integer pellentesque purus ullamcorper aliquet varius. In
            hac habitasse platea dictumst. Donec aliquet, mauris et pretium dictum, elit erat porta magna, vel
            fermentum libero tellus et ligula. Phasellus lacus sapien, viverra non vehicula a, rutrum sed odio.
            Fusce gravida sed dolor eu porttitor. In eget lobortis lacus, vel lobortis ipsum. Morbi commodo nunc
            non nisi tempus sodales.</p>        
        <?php
            if(is_category('extensao') || is_category('projetos')){
        ?>
        <div class="projetos">
            <h2>Projetos de extensão</h2>
            <?php 
                $projetos = get_posts(array('numberposts' => -1,'category' => 11));
                foreach($projetos as $projeto){
            ?>
            <div class="projeto">
                <?= get_the_post_thumbnail($projeto) ?>
                <h3><a href="<?= get_permalink($projeto) ?>"><?= get_the_title($projeto) ?></a></h3>
                <div class="projeto-membros">
                    <?= get_the_excerpt($projeto) ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php
            if(is_category('ensino') || is_category('projetos')){
        ?>
        <div class="projetos">
            <h2>Projetos de ensino</h2>
            <?php 
                $projetos = get_posts(array('numberposts' => -1, 'category' => 10));
                foreach($projetos as $projeto){
            ?>
            <div class="projeto">
                <?= get_the_post_thumbnail($projeto) ?>
                <h3><a href="<?= get_permalink($projeto) ?>"><?= get_the_title($projeto) ?></a></h3>
                <div class="projeto-membros">
                    <?= get_the_excerpt($projeto) ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php
            if(is_category('pesquisa') || is_category('projetos')){
        ?>
        <div class="projetos">
            <h2>Projetos de pesquisa</h2>
            <?php 
                $projetos = get_posts(array('numberposts' => -1, 'category' => 9));
                foreach($projetos as $projeto){
            ?>
            <div class="projeto">
                <?= get_the_post_thumbnail($projeto) ?>
                <h3><a href="<?= get_permalink($projeto) ?>"><?= get_the_title($projeto) ?></a></h3>
                <div class="projeto-membros">
                    <?= get_the_excerpt($projeto) ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</main>
<?php get_footer() ?>