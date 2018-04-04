<fieldset id="filters">
	<legend><?php echo lang('global:filters') ?></legend>

	<?php echo form_open('', 'class="form-inline" method="get" ', array('f_module' => $module_details['slug'])) ?>
		
			<div class="form-group">
        		<label for="f_status"><?php echo lang('blog:status_label') ?></label>
        		<?php echo form_dropdown('f_status', array(0 => lang('global:select-all'), 'draft'=>lang('blog:draft_label'), 'live'=>lang('blog:live_label')),false,'class="form-control"  ') ?>
    		</div>

			<div class="form-group">
        		<label for="f_category"><?php echo lang('blog:category_label') ?></label>
       			<?php echo form_dropdown('f_category', array(0 => lang('global:select-all')) + $categories,false,'class="form-control" ') ?>
    		</div>

			<div class="form-group">
				<label for="f_category"><?php echo lang('global:keywords') ?></label>
				<?php echo form_input('f_keywords', '', 'style="width: 55%;" class="form-control"') ?>
			</div>

			<button type="submit" class="btn btn-primary">Buscar</button>
				<?php //echo anchor(current_url() . '#', lang('buttons:cancel'), 'class="md-raised btn btn-default"') ?>
			
		
	<?php echo form_close() ?>
    <hr />
</fieldset>
