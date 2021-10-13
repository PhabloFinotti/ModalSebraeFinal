<?php get_header();
    $pavilhao_terms = get_queried_object(  );


	$nomePavilhao = $pavilhao_terms->name;

	if($nomePavilhao == "Retomada"){
		$nomePavilhao = "Espaço Retomada";
	}

 ?>
    
        <div>
			<div class="modal-dialog" role="document">
				<div class="modal-body modal-content wq-centralizado">
					
					<div class="container">
						<div class="wq-wrapper-inicial">
							<div>
								<div class="title-type-01">
									<h2><span><img src="<?php bloginfo( 'template_url' ); ?>/img/publico-icon.svg" alt="" title=""></span> <?php echo $nomePavilhao; ?></h2>
								</div>

                                <?php
                                            $categorias = get_terms('categorias_posts', array(
                                                'hide_empty' => true,
                                                'parent'   => 0,
                                            ));


                                            // FUNÇÃO PARA PEGAR IDS DAS TABS QUE CONTÉM OS POSTS DESSE PAVILHAO
                                            $tabsID = array();
                                            foreach ($categorias as $categoria_key => $categoria_value) {

                                        
                                                $arrayQueryTabs = array(
                                                    'post_type'				=> array( 'servicos192' ),
                                                    'orderby' => 'menu_order',
                                                    'order' => 'ASC',
                                                    'posts_per_page'		=> '-1',
                                                    'tax_query'     => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'taxonomy' => 'pavilhao_posts',
                                                            'field'    => 'term_id',
                                                            'terms'    => $pavilhao_terms->term_id,
                                                        ),
                                                        array(
                                                            'taxonomy' => 'categorias_posts',
                                                            'field'    => 'term_id',
                                                            'terms'    => $categoria_value->term_id,
                                                        ),
                                                    )
                                                );
                                                $queryTabs = new WP_Query( $arrayQueryTabs );
                                                $tabs = $queryTabs->get_posts();
                                                foreach ($tabs as $key => $tab) {

                                                    if(in_array($tab->ID, $tabsID)){
                                                        continue;
                                                    }else{
                                                        $tabsID[] = $tab->ID;
                                                    }
                                                }

                                            }

                                            // FUNÇÃO QUE UTILIZA AS IDS DOS POSTS DESTE PAVILHAO PARA PODER PEGAR AS IDS DA TAXONOMY
                                            $categoriesExists = array();
                                            foreach($tabsID as $ID){
                                                $categories = get_the_terms( $ID, 'categorias_posts' );

                                                $count = 0;

                                                foreach($categories as $term => $value){
                                                    
                                                    
                                                    if(in_array($value->term_id, $categoriesExists)){
                                                        continue;
                                                    }else{
                                                        array_push($categoriesExists, $value->term_id);
                                                    }
                                                $count++;}
                                                    
                                            }

                                            foreach($categoriesExists as $key => $value){
                                        ?>
										<a href="#nav-<?php echo $value; ?>" data-toggle="tab" class="tabs-btn modal-toggle"><?php echo get_term($value)->name; ?></a>
									<?php
                                            }wp_reset_query(  );
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
											<h2><span><img src="<?php bloginfo( 'template_url' ); ?>/img/publico-icon.svg" alt="" title=""></span> <?php echo $nomePavilhao; ?></h2>
										</div>
										<ul class="nav nav-tabs">

                                            <?php
                                                foreach($categoriesExists as $key => $value){
                                            ?>
												<li> <a class="tabs-btn" data-toggle="tab" href="#nav-<?php echo $value; ?>"><?php echo get_term($value)->name; ?></a></li> 
											<?php } ?>

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
                                                                        'relation' => 'AND',
                                                                        array(
                                                                            'taxonomy' => 'pavilhao_posts',
                                                                            'field'    => 'term_id',
                                                                            'terms'    => $pavilhao_terms->term_id,
                                                                        ),
                                                                        array(
                                                                            'taxonomy' => 'categorias_posts',
                                                                            'field'    => 'term_id',
                                                                            'terms'    => $categoria_value->term_id,
                                                                        ),
                                                                    )
                                                                );
                                                                $queryTabs = new WP_Query( $arrayQueryTabs );
                                                                $posts = $queryTabs->get_posts();
																$subTabsID = array();
                                                                foreach ($posts as $key => $postsSubTab) {

																	if(in_array($postsSubTab->ID, $subTabsID)){
																		continue;
																	}else{
																		$subTabsID[] = $postsSubTab->ID;
																	}
                                                                    
																}

																// FUNÇÃO QUE UTILIZA AS IDS DOS POSTS DESTE PAVILHAO PARA PODER PEGAR AS IDS DA SUB TAXONOMY
																$subcategoriesExists = array();
																foreach($tabsID as $ID){
																	$categories = get_the_terms( $ID, 'subcategorias_posts' );
																	
					
																	foreach($categories as $term => $value){
																		
																		
																		if(in_array($value->term_id, $subcategoriesExists)){
																			continue;
																		}else{
																			array_push($subcategoriesExists, $value->term_id);
																		}
																		
																	}
																}

																foreach( $subcategoriesExists as $key => $value ){
                                                                ?>
																	<li data-filter=".cat-<?php echo get_term($value)->slug; ?>"><?php echo get_term($value)->name; ?></li>
															<?php
																}wp_reset_query(  );
															?>

														</ul>
														<!-- FIM TABS -->
													</div>
										
													<div class="grid">

														<?php
														$arrayQueryServicos = array(
															'post_type'				=> array( 'servicos192' ),
															'orderby' => 'menu_order',
															'order' => 'ASC',
															'posts_per_page'		=> '-1',
															'tax_query'     => array(
                                                                'relation' => 'AND',
                                                                array(
                                                                    'taxonomy' => 'pavilhao_posts',
                                                                    'field'    => 'term_id',
                                                                    'terms'    => $pavilhao_terms->term_id,
                                                                ),
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

															if( get_post_meta( $item->ID, 'wsg_servico_item_radio', true ) == 'documento' || get_post_meta( $item->ID, 'wsg_servico_item_radio', true ) == 'link'  ){
																?>
		
																	<div class="grid-item cat-todos <?php echo $htmlCategory; ?>">
																		<div class="wq-publico-box">
																			<figure>
																				<?php getImageThumb( get_post_meta( $item->ID, 'wsg_servico_item_img_id', true ), "332x251"); ?>
																				<figcaption>
																					<span class="wq-tag">
																						<?php if( get_post_meta( $item->ID, 'wsg_servico_item_radio', true ) == 'documento' ){ ?>
																							<img src="<?php bloginfo( 'template_url' ); ?>/img/documento-tag.svg" alt="">
																						<?php }else if( get_post_meta( $item->ID, 'wsg_servico_item_radio', true ) == 'link' ){ ?>
																							<img src="<?php bloginfo( 'template_url' ); ?>/img/link-externo.svg" alt="">
																						<?php } ?>
																					</span>
																					<h4><?php echo get_the_title( $item->ID ); ?></h4>
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
																						<span class="wq-tag"><img src="<?php bloginfo( 'template_url' ); ?>/img/tag-icon-video.svg" alt=""></span>
																						<h4><?php echo get_the_title( $item->ID ); ?></h4>
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
