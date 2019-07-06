<?php
    add_theme_support( 'post-thumbnails' ); 


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