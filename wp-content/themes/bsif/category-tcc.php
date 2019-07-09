<?php get_header() ?>
<main>
    <div class="apresentacao">
        <h1><?php wp_title(''); ?></h1>
        <nav aria-label="breadcrumb">
            <ol>
                <li><a href="<?= get_site_url() ?>/">Início</a></li>
            <?php if(!is_category('tcc')){ ?>
                <li><a href="<?= get_site_url() ?>/tcc/">TCC</a></li>
            <?php } ?>
                <li aria-current="page"><?php wp_title(''); ?></li>
            </ol>
        </nav>
    </div>
    <div id="conteudo">
        <?php if(is_category('tcc')){ ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices ex quam, et
            euismod dolor interdum vestibulum. Integer pellentesque purus ullamcorper aliquet varius. In
            hac habitasse platea dictumst. Donec aliquet, mauris et pretium dictum, elit erat porta magna, vel
            fermentum libero tellus et ligula. Phasellus lacus sapien, viverra non vehicula a, rutrum sed odio.
            Fusce gravida sed dolor eu porttitor. In eget lobortis lacus, vel lobortis ipsum. Morbi commodo nunc
            non nisi tempus sodales.</p>  
        
        <div class="tcc-anos">
            <?php
                $categorias=get_categories(
                    array(
                        'order' => 'DESC',
                        'parent'  => 7,
                        'hide_empty'=> 0,
                    )
                );

                foreach($categorias as $c){
            ?>
            <div>
                <h2><a href="<?=get_category_link($c)?>"><?= $c->cat_name ?></a></h2>
                <?php
                    $tccs = get_posts(
                        array(
                            'category' => $c->term_id,
                            'numberposts' => 5,
                        )
                    );
                    foreach($tccs as $tcc){
                ?>
                    <div class="tcc">
                        <h3><a href="<?= get_permalink($tcc->ID)?>"><?=$tcc->post_title?></a></h3>
                    </div>
                <?php   
                    }
                ?>
            </div>
            <?php
                }
            ?>
        </div>
        <?php
            }else{
        ?>
        <div class="tcc-ano">
            <?php
                $tccs = get_posts(
                    array(
                        'category' => get_the_category()[0]->cat_ID,
                        'numberposts' => -1,
                    )
                );
                foreach($tccs as $tcc){
            ?>
                <div class="tcc">
                    <h2><a href="<?= get_permalink($tcc->ID)?>"><?=$tcc->post_title?></a></h2>
                    <div class="descricao">
                        <?=get_block($tcc)?>
                    </div>
                </div>
            <?php   
                }
            ?>
        </div>
        <?php
            }
        ?>
    </div>
</main>
<?php get_footer() ?>