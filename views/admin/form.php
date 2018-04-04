<section class="alert alert-info">
<?php if ($this->method == 'create'): ?>
	<?php echo lang('blog:create_title') ?>
<?php else: ?>
	<?php echo sprintf(lang('blog:edit_title'), $post->title) ?>
<?php endif ?>
</section>



<?php echo form_open_multipart() ?>

<div class="ui-tab-container ui-tab-horizontal" ng-controller="InputCtrl">



	<!-- Content tab -->
    <uib-tabset justified="false" class="ui-tab">
        <uib-tab heading="<?php echo lang('blog:content_label') ?>">
            <fieldset>
    		
    				<div class="form-group">
    					<label for="title"><?php echo lang('global:title') ?> <span>*</span></label>
    					<div class="input"><?php echo form_input('title', htmlspecialchars_decode($post->title), 'maxlength="200" id="title" class="form-control" ng-init="title=\''.$post->title.'\'" ng-model="title"') ?></div>
    				</div>
    	
    				<div class="form-group">
    					<label for="slug"><?php echo lang('global:slug') ?> <span>*</span></label>
                         <slug from="title" to="slug" >
    					   <?php echo form_input('slug', $post->slug, 'class="form-control" ng-model="slug" maxlength="200" class="width-20"') ?>
    				    </slug>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            					<label for="status"><?php echo lang('blog:status_label') ?></label>
            					<div class="input"><?php echo form_dropdown('status', array('draft' => lang('blog:draft_label'), 'live' => lang('blog:live_label')), $post->status,'class="form-control"') ?></div>
            				</div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="body"><?php echo lang('blog:content_label') ?> <span>*</span></label>
                                <?php echo form_dropdown('type', array(
    							'html' => 'html',
    							'markdown' => 'markdown',
    							'wysiwyg-simple' => 'wysiwyg-simple',
    							'wysiwyg-advanced' => 'wysiwyg-advanced',
    						), $post->type,'class="form-control"') ?>
                            </div>
                        </div>
                    
                    </div>
        				
    		
    				
    					
    	
    					<div class="form-group">
                            <div text-angular  ng-model="mailContent" name="body"  class="ui-editor"><?=$post->body?></div>
    						<?php //echo form_textarea(array('id' => 'body', 'name' => 'body', 'value' => $post->body, 'rows' => 30, 'class' => $post->type)) ?>
    					</div>
    				
    
    			
    		<?php echo form_hidden('preview_hash', $post->preview_hash)?>
    		</fieldset>
        </uib-tab>
       	<?php if ($stream_fields): ?>
        <uib-tab heading="<?php echo lang('global:custom_fields') ?>">
            <fieldset>
    			
    
    				<?php foreach ($stream_fields as $field) echo $this->load->view('admin/partials/streams/form_single_display', array('field' => $field), true) ?>
    
    			
    		</fieldset>
        </uib-tab>
        <?php endif; ?>
        <uib-tab heading="<?php echo lang('blog:options_label') ?>">
            <fieldset>
    			
    	
    				<div class="form-group">
    					<label for="category_id"><?php echo lang('blog:category_label') ?></label>
    					
    					<?php echo form_dropdown('category_id', array(lang('blog:no_category_select_label')) + $categories, @$post->category_id,'class="form-control"') ?>
    						<!--[ <?php echo anchor('admin/blog/categories/create', lang('blog:new_category_label'), 'target="_blank"') ?> ]-->
    					
    				</div>
    	
    				<?php if ( ! module_enabled('keywords')): ?>
    					<?php echo form_hidden('keywords'); ?>
    				<?php else: ?>
  						<div class="form-group" ng-controller="ChipsBasicDemoCtrl as ctrl">
    						<label for="keywords"><?php echo lang('global:keywords') ?></label>
                            
                           
    						<?php echo form_input('keywords', $post->keywords, 'id="keywords" class="form-control" ') ?>
    					</div>
    				<?php endif; ?>
    	           <div class="row">
                        <div class="col-md-6">
                            <div class="form-group date-meta">
            					<label><?php echo lang('blog:date_label') ?></label>
            	
            					
           						<?php echo form_input('created_on', date('Y-m-d', $post->created_on), 'maxlength="10" id="datepicker" class="text width-20 form-control" ') ?> &nbsp;
            						
            						
            					
            				</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Hora</label>
                                    <br />
                                    <span class="ui-select">
                                         <?php echo form_dropdown('created_on_hour', $hours, date('H', $post->created_on),'class="form-control"') ?>
                                    </span>
                                    :
                                    <span class="ui-select">
                                        <?php echo form_dropdown('created_on_minute', $minutes, date('i', ltrim($post->created_on, '0')),'class="form-control"') ?>
                                    </span>
                            </div>
                        </div>
                   
                   </div>
            				
    	
    				<?php if ( ! module_enabled('comments')): ?>
    					<?php echo form_hidden('comments_enabled', 'no'); ?>
    				<?php else: ?>
    					<div class="form-group">
    						<label for="comments_enabled"><?php echo lang('blog:comments_enabled_label');?></label>
    						<div class="input">
    							<?php echo form_dropdown('comments_enabled', array(
    								'no' => lang('global:no'),
    								'1 day' => lang('global:duration:1-day'),
    								'1 week' => lang('global:duration:1-week'),
    								'2 weeks' => lang('global:duration:2-weeks'),
    								'1 month' => lang('global:duration:1-month'),
    								'3 months' => lang('global:duration:3-months'),
    								'always' => lang('global:duration:always'),
    							), $post->comments_enabled ? $post->comments_enabled : '3 months','class="form-control"') ?>
    						</div>
    					</div>
    				<?php endif; ?>
    			
    		</fieldset>
        </uib-tab>
        
        
    </uib-tabset>
	

	

	

</div>

<input type="hidden" name="row_edit_id" value="<?php if ($this->method != 'create'): echo $post->id; endif; ?>" />
<div class="divider"></div>
<div class="buttons">
	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel'))) ?>
</div>

<?php echo form_close() ?>


