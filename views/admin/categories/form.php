
    <p  class="lead text-success">
	<?php if ($this->controller == 'admin_categories' && $this->method === 'edit'): ?>
	<?php echo sprintf(lang('cat:edit_title'), $category->title);?>
	<?php else: ?>
	<?php echo lang('cat:create_title');?>
	<?php endif ?>
    </p>


<section class="item">
<div class="content">
<?php echo form_open($this->uri->uri_string(), 'class="crud'.((isset($mode)) ? ' '.$mode : '').'" id="categories"') ?>



	
		<div class="form-group">
			<label for="title"><?php echo lang('global:title');?> <span>*</span></label>
			<?php echo  form_input('title', $category->title,'class="form-control" ng-model="title" ng-init="title=\''.$category->title.'\'"') ?>
            
        </div>
        <div class="form-group">
			<label for="slug"><?php echo lang('global:slug') ?> <span>*</span></label>
			<slug from="title" to="slug" >
                <?php echo  form_input('slug', $category->slug,'class="form-control" ng-model="slug"') ?>
            </slug>
			<?php echo  form_hidden('id', $category->id) ?>
		</li>
	



	<div class="divider"></div>
    
    <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>

<?php echo form_close() ?>
</div>
</section>