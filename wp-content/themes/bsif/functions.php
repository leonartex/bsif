<?php
    add_theme_support( 'post-thumbnails' ); 

    function theme_slug_setup() {
        add_theme_support( 'title-tag' );
     }
    add_action( 'after_setup_theme', 'theme_slug_setup' );

    //Remover atributo de width e height nas imagens, principalmente nas thumbnails
    function remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
    }
    
    // Remove image size attributes from post thumbnails
    add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );
    
    // Remove image size attributes from images added to a WordPress post
    add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );

    //Faz as subcategorias utilizarem o template da categoria pai
    function new_subcategory_hierarchy() { 
        $category = get_queried_object();
    
        $parent_id = $category->category_parent;
    
        $templates = array();
    
        if ( $parent_id == 0 ) {
            // Use default values from get_category_template()
            $templates[] = "category-{$category->slug}.php";
            $templates[] = "category-{$category->term_id}.php";
            $templates[] = 'category.php';     
        } else {
            // Create replacement $templates array
            $parent = get_category( $parent_id );
    
            // Current first
            $templates[] = "category-{$category->slug}.php";
            $templates[] = "category-{$category->term_id}.php";
    
            // Parent second
            $templates[] = "category-{$parent->slug}.php";
            $templates[] = "category-{$parent->term_id}.php";
            $templates[] = 'category.php'; 
        }
        return locate_template( $templates );
    }
    
    add_filter( 'category_template', 'new_subcategory_hierarchy' );

    //Função para retornar o primeiro bloco da postagem (de minha autoria)
    function get_block($post, $bloco = null){
        $post = get_post($post);
        if ( has_blocks( $post->post_content ) ) {
            $content = '';
            $blocks = parse_blocks( $post->post_content );
            if($bloco != null){
                $content .= $blocks[$bloco]['innerHTML'];
            }else{
                foreach ($blocks as $block){
                    if($block['blockName'] == 'core/paragraph' or $block['blockName'] == 'core/list' or $block['blockName'] == 'core/quote'){
                        $content .= $block['innerHTML'];
                        break;
                    }
                }
            }
        }
        if ($content == '') {
            $content = '<p>Essa publicação está vazia de conteúdo explicitamente textual.</p>';
        }
        return $content;
    }