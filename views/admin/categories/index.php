<p  class="lead text-success">
	<?php echo lang('cat:list_title') ?>
</p>

<section class="item">
	<div class="content">
	
	<?php if ($categories): ?>

		<?php echo form_open('admin/blog/categories/delete') ?>
        <p class="text-right text-muted">Total registros: <?=$pagination['total_rows']?> </p>
		<table border="0" class="table-list table" cellspacing="0">
			<thead>
			<tr>
				<th width="20"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')) ?></th>
				<th><?php echo lang('cat:category_label') ?></th>
				<th><?php echo lang('global:slug') ?></th>
				<th width="14%"></th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($categories as $category): ?>
				<tr>
					<td><?php echo form_checkbox('action_to[]', $category->id) ?></td>
					<td><?php echo $category->title ?></td>
					<td><?php echo $category->slug ?></td>
					<td class="text-right buttons buttons-small">
						<?php echo anchor('admin/blog/categories/edit/'.$category->id, lang('global:edit'), 'class="button edit"') ?> | 
						<?php echo anchor('admin/blog/categories/delete/'.$category->id, lang('global:delete'), 'confirm-action class="confirm button delete"') ;?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<?php $this->load->view('admin/partials/pagination') ?>

		<div class="table_action_buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )) ?>
		</div>

		<?php echo form_close() ?>

	<?php else: ?>
		<div class="no_data"><?php echo lang('cat:no_categories') ?></div>
	<?php endif ?>
	</div>
</section>