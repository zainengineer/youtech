                	<!-- Footer Section starts here -->
                    <div class="r100 overflowauto social_section">
                    
                    	<div class="maxwidth overflowauto vmargintb10 txtcntr">
                        
                                    <ul class="listnoneleft list5lr displayinlineblock">
                                    
                                        <?php if(of_get_option('twitter_id')) : ?>
                                        <li><a href="<?php echo esc_url( of_get_option('twitter_id') ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a></li>
                                        <?php endif; ?>
                                        
                                        <?php if(of_get_option('facebook_id')) : ?>
                                        <li><a href="<?php echo esc_url( of_get_option('facebook_id') ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="redit" /></a></li>
                                        <?php endif; ?>                                                                          
    
                                        <?php if(of_get_option('redit_id')) : ?>
                                        <li><a href="<?php echo esc_url( of_get_option('redit_id') ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/reddit.png" alt="redit" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('stumble_id')) : ?>
                                        <li><a href="<?php echo esc_url( of_get_option('stumble_id') ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/stumble.png" alt="stumble" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('flickr_id')) : ?>
                                        <li><a href="<?php echo esc_url( of_get_option('flickr_id') ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flickr.png" alt="flickr" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('linkedin_id')) : ?>
                                        <li><a href="<?php echo esc_url( of_get_option('linkedin_id') ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="linkedin" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('google_id')) : ?>
                                        <li><a href="<?php echo esc_url( of_get_option('google_id') ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gplus.png" alt="google" /></a></li>
                                        <?php endif; ?>

                                                                        
                                    </ul>                        
                        
                        </div>
                        
                    </div>                    
                    <!-- Footer Section starts here -->
                    
                    <!-- Footer Section starts here -->
                    <div class="r100 overflowauto footer_section">
                    
                    	<div class="maxwidth overflowauto vpadding2">
                    
                        	<div class="w90 bpadding5p overflowauto">
                        
							<?php 
								
								if( !of_get_option('footer_layout') || of_get_option('footer_layout') == 'one' ) {
									$footer_layout = 'one';
								}else {
									$footer_layout = 'two';
								}
								
								get_template_part( 'footer', $footer_layout );
								
							?>
                                
                            </div>
                            
                       </div>                   	
                    
                    </div>
                    <!-- Footer section ends here -->                   
            
                </div> 
                <!-- Wrapper four ends here -->            
        
            </div>
            <!-- Wrapper three ends here -->        
    
    	</div>
        <!-- Wrapper two ends here -->
        
    </div>
    <!-- Wrapper one ends here -->



<?php wp_footer(); ?>
</body>
</html>