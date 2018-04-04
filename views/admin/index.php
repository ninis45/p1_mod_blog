<div class="one_full" ng-controller="IndexCtrl">
	

	<section class="item">
		<div class="content">
			<?php if ($blog) : ?>
				<?php echo $this->load->view('admin/partials/filters') ?>
	
				<?php echo form_open('admin/blog/action') ?>
					<div id="filter-stage" >
						<?php echo $this->load->view('admin/tables/posts') ?>
					</div>
                    
                    <div class="table_action_buttons">
                		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete', 'publish'))) ?>
                	</div>
				<?php echo form_close() ?>
			<?php else : ?>
				<div class="no_data alert alert-info text-center"><?php echo lang('blog:currently_no_posts') ?>
                    <?php if($_GET):?>
                    <br />
                    <a href="<?=base_url('admin/blog')?>" class="btn btn-default"><i class="fa fa-refresh"></i> Mostrar todos</a>
                    <?php endif; ?>
                </div>
			<?php endif ?>
		</div>
	</section>
</div>
