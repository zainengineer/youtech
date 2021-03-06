<?php
/**
 * Add Controls
 * @package Customizr
 * @since Customizr 1.0 
 */
class TC_Controls extends WP_Customize_Control
	{
	    public $tc;
	    public $link;
	    public $title;
	    public $label;
	    public $type;
	    public $buttontext;
	    public $settings;
	    public $hr_after;
	    public $notice;
	    //number vars
	    public $step;
	    public $min;

	    public function render_content()
	    {
	        switch ($this -> tc) {
	        	case 'hr':
	        		echo '<hr style="border-color: white;margin-top:15px" />';
	        		break;

	        	
	        	case 'title' :
	        		?>

	        		<?php if (isset($this->title)) : ?>
						<h3 style="color: #21759B;font-family: Georgia, Times, 'Times New Roman', serif;text-transform: uppercase;text-shadow: 0 1px 0 #FFF;margin: 1em 0em 0em 0em;"><?php echo esc_html($this->title); ?></h3>
					<?php endif; ?>
					<?php if (isset($this->notice)) : ?>
						<i><?php echo esc_html( $this-> notice ) ?></i>
					<?php endif; ?>

					<?php
					break;


	        	case 'button':
	        		echo '<a class="button-primary" href="'.admin_url($this -> link ).'" target="_blank">'.$this -> buttontext.'</a>';
	        		if ($this -> hr_after == true)
	        			echo '<hr style="border-color: white;margin-top:15px">';
	        		break;


	        	case 'select':
					if ( empty( $this->choices ) )
						return;

					?>
					<?php if (isset($this->title)) : ?>
						<h3 style="color: #21759B;font-family: Georgia, Times, 'Times New Roman', serif;text-transform: uppercase;text-shadow: 0 1px 0 #FFF;margin: 1em 0em 0em 0em;"><?php echo esc_html($this->title); ?></h3>
					<?php endif; ?>
					<?php if (isset($this->notice)) : ?>
						<i><?php echo esc_html( $this-> notice ) ?></i>
					<?php endif; ?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<select <?php $this->link(); ?>>
							<?php
							foreach ( $this->choices as $value => $label )
								echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
							?>
						</select>
					</label>
					<?php
				break;


	        	case 'number':
	        		?>
	        		<label>
	        		<span class="customize-control-title"><?php echo esc_html( $this->label ) ?></span>
		        		<input <?php $this->link() ?> type="number" step="<?php echo $this-> step ?>" min="<?php echo $this-> min ?>" id="posts_per_page" value="<?php echo $this->value() ?>" class="small-text">
		        		<?php if(!empty($this -> notice)) : ?>
			        		<i><?php echo esc_html( $this-> notice ) ?></i>
			        	<?php endif; ?>
		        	</label>
		        	<?php
	        		break;

	        	case 'checkbox':
				?>
					<div class="tc-check-label">
						<label>	
							<strong style="line-height: 1em;"><?php echo esc_html( $this->label ); ?></strong>
						</label>
					</div>
					<input type="checkbox" class="iphonecheck" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
					
					<?php if(!empty($this -> notice)) : ?>
				       <i style="display: block;clear: both;"><?php echo esc_html( $this-> notice ) ?></i>
				     <?php endif; ?>
				<?php
				break;

	        	case 'textarea':
	        		?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<span style="color: #999;font-size:11px"><?php echo esc_html( $this-> notice); ?></span>
						<textarea class="widefat" rows="3" cols="10" <?php $this->link(); ?>><?php echo esc_html( $this->value() ); ?></textarea>
					</label>
					<?php
		        	break;

	        	case 'url':
	        		?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<input type="text" value="<?php echo esc_url( $this->value() ); ?>"  <?php $this->link(); ?> />
					</label>
					<?php
		        	break;
	        	
	        	case 'slider-check':
		        	//retrieve all sliders in option array
			        $options                   	= get_option('tc_theme_options');
			        $sliders 					= array();
			        if(isset($options['tc_sliders'])) {
			        	$sliders                = $options['tc_sliders'];
			    	}
	        	
		            if(empty($sliders )) {
		               echo '<div style="width:99%; padding: 5px;">';
		                  echo '<p class="description">'.__("You haven't create any slider yet. Go to the media library, edit your images and add them to your sliders.", "customizr" ).'<br/><a class="button-primary" href="'.admin_url( 'upload.php').'" target="_blank">'.__('Create a slider','customizr').'</a></p>
		              </div>';
		            }	
	        	break;

	        	default:
	        		screen_icon( $this -> tc );
	        		break;
	        }
	    }
	}



if(!function_exists('tc_sanitize_textarea')) :
/**
 * adds sanitization callback funtion : textarea
 * @package Customizr
 * @since Customizr 1.1.4
 */
	function tc_sanitize_textarea($value) {
		$value = esc_textarea( $value);
		return $value;
	}
endif;




if(!function_exists('tc_sanitize_number')) :
/**
 * adds sanitization callback funtion : number
 * @package Customizr
 * @since Customizr 1.1.4
 */
	function tc_sanitize_number($value) {
		$value = esc_attr( $value); // clean input
		$value = (int) $value; // Force the value into integer type.
   		return ( 0 < $value ) ? $value : null;
	}
endif;



if(!function_exists('tc_sanitize_url')) :
/**
 * adds sanitization callback funtion : url
 * @package Customizr
 * @since Customizr 1.1.4
 */
	function tc_sanitize_url($value) {
		$value = esc_url( $value);
		return $value;
	}
endif;


?>