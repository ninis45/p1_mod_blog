<?php if ($keywords): ?>
    <section id="tags">
    	<?php foreach ($keywords as $keyword): ?>
    	
    		<a class="tag" href="<?=$keyword['url']?>">
    			<?=$keyword['title']?>
    		</a>
    	
    	<?php endforeach ?>
    </section>
<?php endif ?>