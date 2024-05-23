<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="ms-search-widget">
		<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'jackryan' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search-field" />
		<input type="submit" id="searchsubmit" class="search-submit" value="<?php echo esc_attr__( 'Search', 'jackryan' ); ?>" />
	</div>
</form>