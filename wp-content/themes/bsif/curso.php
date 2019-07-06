<?php
/*
Template Name: Página do curso
*/
?>
<?php get_header(); ?>
<main>
    <div class="apresentacao">
        <h1>Sobre o curso</h1>
        <nav aria-label="breadcrumb">
            <ol>
                <li><a href="index.html">Início</a></li>
                <li aria-current="page">Curso</li>
            </ol>
        </nav>
    </div>
    <div id="conteudo" class="curso">
    <?php
        $args = array(
            'post_type' => 'detalhamento',
            'post_status' => 'publish',
            'posts_per_page' => 1
        );
        $curso = get_posts($args);
    ?>
        <div class="detalhamento">
            <h2><?=$curso[0]->post_title ?></h2>
            <?php
                echo $curso[0]->post_content;
            ?>
        </div>
        <div class="corpo-docente">
            <h2>Corpo docente</h2>
        <?php
            $args = array(
                'post_type' => 'docente',
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            $docentes = get_posts($args);

            if($docentes <> null){
                foreach($docentes as $docente){
        ?>            
            <div class="docente">
                <h3><?= $docente->post_title ?></h3>
                <span class="pequeno">Principal área de formação</span>
                <span>Áreas de interesse:</span>
                <?php
                    echo ($docente->post_content);
                ?>
            </div>
        <?php 
                }
            } ?>
        </div>
        <div class="ementario">
            <h2>Grade Curricular</h2>
            <?php
                $categorias=get_categories(
                    array(
                        'parent'  => 12,
                        'hide_empty'=> 0,
                    )
                );
            ?>
            <div>
            <?php 
                foreach ($categorias as $c) { 
            ?>
                <h3><?= $c->cat_name ?></h3>
                <?php
                    $cadeiras=get_posts(
                        array(
                            'post_type' => 'cadeira',
                            'category' => $c->term_id 
                        )
                    );
                    foreach ($cadeiras as $cad) {
                ?>
                <div class="disciplina">
                    <div>
                        <span><?=$cad->post_title?></span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> <?= $cad->post_excerpt ?></span>
                    </div>
                </div>
            <?php 
                    }
                } 
            ?>
                <h3>1º Semestre</h3>
                <div class="disciplina">
                    <div>
                        <span>FUNDAMENTOS DE SISTEMAS DE INFORMAÇÃO</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>PROGRAMAÇÃO ORIENTADA A OBJETOS AVANÇADA</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>GOVERNANÇA DE TECNOLOGIA DA INFORMAÇÃO</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>FUNDAMENTOS DE COMPLEXIDADE EM ALGORITMOS</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
            </div>
            <div>
                <h3>2º Semestre</h3>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
            </div>
            <div>
                <h3>3º Semestre</h3>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
            </div>
            <div>
                <h3>4º Semestre</h3>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
            </div>
            <div>
                <h3>5º Semestre</h3>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
                <div class="disciplina">
                    <div>
                        <span>Nome da disciplina</span>
                    </div>
                    <div>
                        <span><span class="sr-only">Carga horária:</span> 72h</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>