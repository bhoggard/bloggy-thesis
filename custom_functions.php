<?php
/* By taking advantage of hooks, filters, and the Custom Loop API, you can make Thesis
 * do ANYTHING you want. For more information, please see the following articles from
 * the Thesis User’s Guide or visit the members-only Thesis Support Forums:
 * 
 * Hooks: http://diythemes.com/thesis/rtfm/customizing-with-hooks/
 * Filters: http://diythemes.com/thesis/rtfm/customizing-with-filters/
 * Custom Loop API: http://diythemes.com/thesis/rtfm/custom-loop-api/

---:[ place your custom code below this line ]:---*/

function my_footer() {
?>
  <p>Hosted by <a href="http://www.webfaction.com/?affiliate=bhoggard">Webfaction</a> | <a href="http://diythemes.com/?a_aid=tristanmedia">Thesis WordPress Theme</a> from DIYthemes</p>
<?php
}

remove_action('thesis_hook_footer', 'thesis_attribution'); 
add_action('thesis_hook_footer', 'my_footer');

function custom_byline() { 
  if (!is_page()) {
?>

<p class="headline_meta"><?php echo get_the_time('Y-m-d'); ?>
 | <span><a href="<?php the_permalink(); ?>#comments" rel="nofollow">
 <?php comments_number(__('0 comments', 'thesis'), __('1 comment', 'thesis'), __('% comments', 'thesis')); ?></a></span> | <?php the_tags('tagged as <span>', ', ', '</span>'); ?>
 in <span><?php echo get_the_category_list(','); ?></span></p>

<?php }
}

remove_action('thesis_hook_after_post', 'thesis_comments_link');
add_action('thesis_hook_after_post', 'custom_byline');

/* 404 stuff */
function custom_thesis_404_title() {
?>
Page not found
<?php 
}

remove_action('thesis_hook_404_title', 'thesis_404_title');
add_action('thesis_hook_404_title', 'custom_thesis_404_title');

function custom_thesis_404_content() {
?>
<p>The page you were looking for was not found. Bloggy was redesigned in July 2011, so try one of these options to find what you were looking for.</p>

<ul> 
        <li>Use the search box to your right.</li>
	<li>Go to the <a href="/" rel="nofollow">home page</a>.</li> 
</ul>
<?php
}

remove_action('thesis_hook_404_content', 'thesis_404_content');
add_action('thesis_hook_404_content', 'custom_thesis_404_content');


