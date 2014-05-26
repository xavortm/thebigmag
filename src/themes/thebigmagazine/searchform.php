<form class="searchform input-group input-group-sm" action="<?php echo home_url( '/' ); ?>" method="get">
	 <input type="text" class="form-control" name="s" id="search" value="<?php the_search_query(); ?>" placeholder='Type and hit enter to search'>
	 <span class="input-group-btn">
		<!-- <button class="btn btn-default" type="button" id="searchsubmit">Search</button> -->
	</span>
</form><!-- /input-group -->