                	<div class="r100 overflowauto content_section">
                    
                    	<div class="maxwidth overflowauto vpadding5">
                        
                        	<div class="r66100 floatleft">
                        
							<?php if (have_posts()) : ?>
							<?php $count = 0; while (have_posts()) : the_post(); $count++; ?>                        
                        
                        	
                            <div <?php $pageclass= array('w90', 'bpadding5p', 'overflowauto' ); post_class( $pageclass ); ?> id="post-<?php the_ID(); ?>">
                        
                                <h1 class="h148sspr bpadding20 brdbtm1E4E6E9"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'alexandria' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                                
                                <div class="r100">
                                
                                                    <?php if ( function_exists('the_ratings') && (!of_get_option('show_ratings_standard') || of_get_option('show_ratings_standard') == 'true')) : ?>
                                                    <div class="actual_post_ratings r100 brdbtm1E4E6E9 vpadding10px">
                                                    	<?php the_ratings(); ?>
													</div>   
                                                    <?php endif; ?>                                                     
													<div class="actual_post_author r100 brdbtm1E4E6E9 vpadding10px">
														<div class="actual_post_posted w867"><?php _e('Posted by : ','alexandria'); ?><span class="bold"><?php the_author() ?></span> <?php _e(' On : ','alexandria'); ?> <span class="bold"><?php the_time(get_option( 'date_format' )) ?></span></div>
													</div>
                                					<?php if(!of_get_option('show_ctags_standard') || of_get_option('show_ctags_standard') == 'true') : ?>                                                                        
													<div class="metadata r100 brdbtm1E4E6E9 vpadding10px overflowauto">
														<p class="r100 overflowauto">
															<span class="label"><?php _e('Category:', 'alexandria') ?></span>
															<span class="text"><?php the_category(', ') ?></span>
														</p>
														<?php the_tags('<p class="r100 overflowauto"><span class="label">'.__('Tags:','alexandria').'</span><span class="text">', ', ', '</span></p>'); ?>
														
													</div><!-- /metadata -->
                                                    <?php endif; ?>                                
                                
                                
                                </div>
                                
								<div class="r100">
                                
									<div class="entry vmargint20">
										
										<?php the_content(__('<span>Continue Reading >></span>', 'alexandria')); ?>
										<div class="clear"></div>
										<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages: ', 'alexandria' ) . '</span>', 'after' => '</div>' ) ); ?>																				
									</div>
                                                            
                                </div>					
                                
                            </div>
                            <?php endwhile; ?>
                            
                            <?php 
								
								$next_page = get_next_posts_link(__('Previous', 'alexandria')); 
								$prev_pages = get_previous_posts_link(__('Next', 'alexandria'));
									if(!empty($next_page) || !empty($prev_pages)) :
							?>
                            <div class="w90">
                                <div class="pagination">
                                    <?php if(!function_exists('wp_pagenavi')) : ?>
                                    <div class="al"><?php echo $next_page; ?></div>
                                    <div class="ar"><?php echo $prev_pages; ?></div>
                                    <?php else : wp_pagenavi(); endif; ?>
                                </div><!-- /pagination -->
                            </div>
							<?php endif; ?>
													
							<?php else : ?>
								<div class="nopost">
										<p><?php _e('Sorry, but you are looking for something that isn\'t here.', 'alexandria') ?></p>
								</div><!-- /nopost -->
							<?php endif; ?>
                            
                            </div>
                            
                            <!-- Sidebar starts here -->
							<?php get_sidebar(); ?> 
                            <!-- Sidebar ends here -->
                        
                        </div>
                    
                    </div>                            