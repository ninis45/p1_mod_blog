<div class="section-content">
	<?php foreach($blog_widget as $post_widget):  ?>
		<article>
            <figure class="date"><i class="fa fa-file-o"></i><?=format_date($post_widget->created_on)?></figure>
            <header><?php echo anchor('blog/'.date('Y/m', $post_widget->created_on) .'/'.$post_widget->slug, $post_widget->title) ?></header></article>
	<?php endforeach ?>
</div>