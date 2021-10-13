<?php

	add_action( 'cmb2_admin_init', 'metaboxes_servicos' );

	function metaboxes_servicos() {

		// Detalhes do serviço 
		$servico_item = new_cmb2_box( array(
			'id'            => 'servico_item',
			'title'         => __( 'Detalhes do post' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		// $servico_item->add_field( array(
		// 	'name'       => __( 'Tag (Etiqueta) do post' ),
		// 	'desc'       => __( 'Tamanho recomendado <strong>110x26</strong>' ),
		// 	'id'         => 'wsg_servico_item_tag',
		// 	'type' => 'file',
		// 	'preview_size' => array( 110/1, 26/1 ),
		// 	'query_args' => array( 'type' => 'image' ),
		// ) );
		$servico_item->add_field( array(
			'name'       => __( 'Imagem do post' ),
			'desc'       => __( 'Tamanho recomendado <strong>332x251</strong>' ),
			'id'         => 'wsg_servico_item_img',
			'type' => 'file',
			'preview_size' => array( 332/1, 251/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$servico_item->add_field( array(
			'name'    => 'Esse post é um',
			'desc'	  => 'Preencha os campos abaixo',
			'id'      => 'wsg_servico_item_radio',
			'type'    => 'radio_inline',
			'options' => array(
				'documento' => __( 'Documento', 'cmb2' ),
				'video'   => __( 'Vídeo', 'cmb2' ),
				'link'   => __( 'Link Externo', 'cmb2' ),
			),
			'default' => 'documento',
		) );


		// Detalhes do serviço na home
		$servico_documento = new_cmb2_box( array(
			'id'            => 'servico_documento',
			'title'         => __( 'Documento ou Link Externo' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$servico_documento->add_field( array(
			'name'       => __( 'Arquivo para Download' ),
			'desc'		 => 'Se não estiver preenchido, não aparecerá site.',
			'id'         => 'wsg_servico_item_doc_link_download',
			'type'       => 'file',
		) );
		$servico_documento->add_field( array(
			'name'       => __( 'Link para Visualizar arquivo' ),
			'desc'		 => 'Se não estiver preenchido, não aparecerá no site.',
			'id'         => 'wsg_servico_item_doc_link_view',
			'type'       => 'text',
		) );

		// Detalhes do serviço na home
		$servico_video = new_cmb2_box( array(
			'id'            => 'servico_video',
			'title'         => __( 'Vídeo' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$servico_video->add_field( array(
			'name'       => __( 'Arquivo para VÍDEO' ),
			'id'         => 'wsg_servico_item_video_link',
			'type'       => 'file',
		) );

		
	

	}

?>