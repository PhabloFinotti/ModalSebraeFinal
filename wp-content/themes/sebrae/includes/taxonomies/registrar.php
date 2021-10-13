<?php

// Minhas taxonomies
	function minhas_taxonomies(){

		// Categorias Servicos
		register_taxonomy( 'pavilhao_posts', array( 'servicos192' ), array(
			'hierarchical' => true,
			'label' => __( 'Pavilhão Posts' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'pavilhao-posts',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => false,
					'edit_terms' => false,
					'delete_terms' => false,
				)
			)
		);

		// Categorias Servicos
		register_taxonomy( 'categorias_posts', array( 'servicos192' ), array(
			'hierarchical' => true,
			'label' => __( 'Categorias de posts' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'categoria-posts',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => true,
					'edit_terms' => true,
					'delete_terms' => true,
				)
			)
		);

		// Categorias Servicos
		register_taxonomy( 'subcategorias_posts', array( 'servicos192' ), array(
			'hierarchical' => true,
			'label' => __( 'Subcategorias' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'subcategoria-posts',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => true,
					'edit_terms' => true,
					'delete_terms' => true,
				)
			)
		);

	}
	add_action('init', 'minhas_taxonomies');

?>