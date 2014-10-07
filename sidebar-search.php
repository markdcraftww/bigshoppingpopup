<input type="hidden" name="post_type[]" value="lectures" />
<input type="hidden" name="post_type[]" value="speakers" />
<input type="hidden" name="post_type[]" value="book_reviews" /> 
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<div class="field">
<input type="text" class="input narrow" name="s" id="s" <?php if(is_search()) { ?>value="<?php the_search_query(); ?>" <?php } else { ?>value="Enter keywords &hellip;" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"<?php } ?> /><br />
	
<?php $query_types = get_query_var('post_type'); ?>
    
<input type="checkbox" name="post_type[]" value="lectures" <?php if (in_array('lectures', $query_types)) { echo 'checked="checked"'; } ?> /><label>Lectures</label>
<input type="checkbox" name="post_type[]" value="speakers" <?php if (in_array('speakers', $query_types)) { echo 'checked="checked"'; } ?> /><label>Speakers</label>
<input type="checkbox" name="post_type[]" value="book_reviews" <?php if (in_array('book_reviews', $query_types)) { echo 'checked="checked"'; } ?> /><label>Book Reviews</label>
    
<input type="submit" id="searchsubmit" value="Search" />
</div>
</form>