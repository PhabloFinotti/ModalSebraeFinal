<?php

// Meus posts types
	function meus_post_types(){

		// Posts
		register_post_type('servicos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Posts'),
					'singular_name'	=> _x('Post', 'post type singular name'),
					'add_new'		=> _x('Novo Post', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo Post', 'portfolio item'),
					'edit_item'		=> _x('Editar Post', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'servicos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

	}
	add_action('init', 'meus_post_types');

?>