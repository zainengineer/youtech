jQuery(document).ready(function($){
	
	$( "#page_template" ).change(function(){
		advantageTemplate( $(this).val() );
	});

	function advantageTemplate( template ){
		$( "#advantage-page-meta" ).hide();

		if ( 'pages/portfolio.php' == template
			|| 'pages/blog-summary.php' == template) {
			$( "#p_advantage_category" ).show();
			$( "#p_advantage_postperpage" ).show();
			$( "#p_advantage_sidebar" ).show();
			$( "#p_advantage_title" ).show();
			$( "#p_advantage_column" ).show();
			$( "#p_advantage_thumbnail" ).show();
			$( "#p_advantage_size_x" ).show();
			$( "#p_advantage_size_y" ).show();
			$( "#p_advantage_intro" ).show();
			$( "#p_advantage_disp_meta" ).show();

			$( "#advantage-page-meta" ).show();
		}
		else if ( 'pages/blog.php' == template ) {
			$( "#p_advantage_category" ).show();
			$( "#p_advantage_postperpage" ).show();
			$( "#p_advantage_sidebar" ).show();
			$( "#p_advantage_title" ).show();
			$( "#p_advantage_column" ).hide();
			$( "#p_advantage_thumbnail" ).hide();
			$( "#p_advantage_size_x" ).hide();
			$( "#p_advantage_size_y" ).hide();
			$( "#p_advantage_intro" ).hide();
			$( "#p_advantage_disp_meta" ).hide();

			$( "#advantage-page-meta" ).show();
		}
		else if ( 'pages/imageslider.php' == template ) {
			$( "#p_advantage_category" ).show();
			$( "#p_advantage_postperpage" ).show();
			$( "#p_advantage_sidebar" ).show();
			$( "#p_advantage_title" ).hide();
			$( "#p_advantage_column" ).hide();
			$( "#p_advantage_thumbnail" ).show();
			$( "#p_advantage_size_x" ).show();
			$( "#p_advantage_size_y" ).show();
			$( "#p_advantage_intro" ).hide();
			$( "#p_advantage_disp_meta" ).hide();

			$( "#advantage-page-meta" ).show();
		}
	}
	
	advantageTemplate( $( "#page_template" ).val() );
});
