<?php
/**
 * The template for displaying search form
 *
 * @package advantage
 * @since 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="search-query" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'advantage' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'advantage' ); ?>" />
	</form>
