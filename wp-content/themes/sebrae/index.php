<?php
		$url = get_home_url(  );
		header('Location: '.$url.'/pavilhao-posts/retomada');
	exit;
get_header(); ?>
    
    <!-- Modal Publico inicial -->
    <!-- <div class="modal fade" id="publico-inicial-modal" tabindex="-1" role="dialog"> -->
        <div>
			<div class="modal-dialog" role="document">
				<div class="modal-body modal-content wq-centralizado">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<img src="<?php bloginfo( 'template_url' ); ?>/img/icon-fechar-modal.svg" alt="" title="">
					</button> -->
					<div class="container">
						<div class="wq-wrapper-inicial">
							<div>
								<div class="title-type-01">
									<h2><span><img src="<?php bloginfo( 'template_url' ); ?>/img/publico-icon.svg" alt="" title=""></span> Público</h2>
								</div>

										<?php
											$categorias_tabs = get_terms('categorias_posts', array(
												'hide_empty' => true,
												'parent'   => 0,
											));
											foreach ($categorias_tabs as $categoria_tab => $categoria_tab_value) {
										?>
										<a href="#nav-<?php echo $categoria_tab_value->term_id; ?>" data-toggle="tab" class="tabs-btn modal-toggle"><?php echo $categoria_tab_value->name; ?></a>
									<?php
										}
									?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>





        	<!-- Modal publico -->
		<div class="modal fade" id="publico-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-body modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<img src="<?php bloginfo( 'template_url' ); ?>/img/icon-fechar-modal.svg" alt="" title="">
					</button>
					<div class="container-fluid">
						<div class="">
							<div class="wq-network-sec">
								
								<div class="wq-perfil-wrapper">
									<div class="wq-ul-content"> 
										<div class="title-type-01">
											<h2><span><img src="<?php bloginfo( 'template_url' ); ?>/img/publico-icon.svg" alt="" title=""></span> Público</h2>
										</div>
										<ul class="nav nav-tabs">

											<?php
												$categorias_tabs = get_terms('categorias_posts', array(
													'hide_empty' => true,
													'parent'   => 0,
												));
												foreach ($categorias_tabs as $categoria_tab => $categoria_tab_value) {
											?>
												<li> <a class="tabs-btn" data-toggle="tab" href="#nav-<?php echo $categoria_tab_value->term_id; ?>"><?php echo $categoria_tab_value->name; ?></a></li> 
											
											<?php
												}
											?>

										</ul> 
									</div> 




									<?php
										$categorias = get_terms('categorias_posts', array(
											'hide_empty' => true,
											'parent'   => 0,
										));

										foreach ($categorias as $categoria_key => $categoria_value) {
									?>
										<div class="tab-content"> 
											<div class="tab-pane" id="nav-<?php echo $categoria_value->term_id; ?>">
												<div class="wq-content-tab">
													<div class="wq-content-menu">
														<!-- TABS -->
														<ul class="menu-tabs wq-nav">
															<li data-filter=".cat-todos" class="active">Todos os casos</li>
																<?php
																	$arrayQueryTabs = array(
																		'post_type'				=> array( 'servicos192' ),
																		'orderby' => 'menu_order',
																		'order' => 'ASC',
																		'posts_per_page'		=> '-1',
																		'tax_query'     => array(
																			array(
																				'taxonomy' => 'categorias_posts',
																				'field'    => 'term_id',
																				'terms'    => $categoria_value->term_id,
																			),
																		)
																	);
																	$queryTabs = new WP_Query( $arrayQueryTabs );
																	$posts = $queryTabs->get_posts();
																	foreach ($posts as $key => $tab) {
																		
																		$categories = get_the_terms( $tab->ID, 'subcategorias_posts' );

																		foreach( $categories as $key => $value ){
																	?>
																<li data-filter=".cat-<?php echo $value->slug; ?>"><?php echo $value->name; ?></li>
															<?php
																}}wp_reset_query(  );
															?>

														</ul>
														<!-- TABS -->
													</div>
										
													<div class="grid">

														<?php
														$arrayQueryServicos = array(
															'post_type'				=> array( 'servicos192' ),
															'orderby' => 'menu_order',
															'order' => 'ASC',
															'posts_per_page'		=> '-1',
															'tax_query'     => array(
																array(
																	'taxonomy' => 'categorias_posts',
																	'field'    => 'term_id',
																	'terms'    => $categoria_value->term_id,
																),
															)
														);
														$queryServicos = new WP_Query( $arrayQueryServicos );
														$posts = $queryServicos->get_posts();
														foreach ($posts as $key => $item) {
															
															$categories = get_the_terms( $item->ID, 'subcategorias_posts' );
															$htmlCategory = '';
															if ( $categories && ! is_wp_error( $categories ) ){
																$draught_links = array();
																foreach ($categories as $category) {
																	$cat_Item = "cat-".$category->slug;
																	array_push($draught_links, $cat_Item);
																}
																$htmlCategory = implode(' ', $draught_links);
															}

															if( get_post_meta( $item->ID, 'wsg_servico_item_radio', true ) == 'documento' ){
														?>

															<div class="grid-item cat-todos <?php echo $htmlCategory; ?>">
																<div class="wq-publico-box">
																	<figure>
																		<?php getImageThumb( get_post_meta( $item->ID, 'wsg_servico_item_img_id', true ), "332x251"); ?>
																		<figcaption>
																			<span class="wq-tag"><?php getImageThumb( get_post_meta( $item->ID, 'wsg_servico_item_tag_id', true ), "110x26"); ?></span>
																			<h4><?php the_title(  ); ?></h4>
																			<div class="wq-btns">

																				<?php if( $wsg_servico_item_doc_link_download = get_post_meta( $item->ID, 'wsg_servico_item_doc_link_download', true ) ){ ?>
																					<a href="<?php echo $wsg_servico_item_doc_link_download; ?>" target="_blank" class="wq-btn-negativo">Baixar</a>
																				<?php }if( $wsg_servico_item_doc_link_view = get_post_meta( $item->ID, 'wsg_servico_item_doc_link_view', true ) ){ ?>
																					<a href="<?php echo $wsg_servico_item_doc_link_view; ?>" class="wq-btn-positivo" target="_blank">Visualizar</a>
																				<?php } ?>

																			</div>
																		</figcaption>
																	</figure>
																</div>
															</div>

														<?php }else if( get_post_meta( $item->ID, 'wsg_servico_item_radio', true ) == 'video' ){ ?>

															<div  class="grid-item cat-todos <?php echo $htmlCategory; ?>">
																<a href="<?php echo get_post_meta( $item->ID, 'wsg_servico_item_video_link', true ); ?>" data-lity>
																	<div class="wq-publico-box type-video">
																		<figure>
																			<?php getImageThumb( get_post_meta( $item->ID, 'wsg_servico_item_img_id', true ), "332x251"); ?>
																			<figcaption>
																				<span class="wq-tag"><?php getImageThumb( get_post_meta( $item->ID, 'wsg_servico_item_tag_id', true ), "110x26"); ?></span>
																				<span class="wq-video-player"><img src="<?php bloginfo( 'template_url' ); ?>/img/player-video.svg" alt=""></span>
																			</figcaption>
																		</figure>
																	</div>
																</a>
															</div>
														<?php }}wp_reset_query(  ); ?>

													</div>
												</div>
											</div>
											<!-- JÁ TENHO UMA EMPRESA -->
										<?php } ?>


									</div> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


<?php get_footer(); ?>
