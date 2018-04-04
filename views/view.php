
<div class="container">
    
    <div class="row"> 
        <div class="col-md-8">
           
            
            <div  id="page-main">
            {{ post }}
                <section id="blog-detail">
                    <header><h1>Noticias</h1></header>
                    <article class="blog-detail">
                	   <header class="blog-detail-header">
                            {{ if portada.image }}
                            <img src="{{ portada.image }}"/>
                            {{ endif }}
                            <h2>{{ title }}</h2>
                            <div class="blog-detail-meta">
                
                        		<span class="date">
                        			{{ helper:lang line="blog:posted_label" }}
                        			<span>{{ helper:date timestamp=created_on }}</span>
                        		</span>
                        
                        		<span class="">
                        			{{ helper:lang line="blog:written_by_label" }}
                        			<i class="fa fa-user"></i> {{ created_by:display_name }}
                        		</span>
                        
                        		{{ if category }}
                        		<span class="category">
                        			{{ helper:lang line="blog:category_label" }}:
                        			<span><a href="{{ url:site }}blog/category/{{ category:slug }}">{{ category:title }}</a></span>
                        		</span>
                        		{{ endif }}
                        
                        		
                        
                        	</div>     
                       </header>
                       <hr />
                       {{ body }}
                       <footer>
                               <section id="share-post">
                                    <div class="icons">
                                        <span>Comparte con tus amigos:</span>
                                        <a href="https://twitter.com/home?status={{ url:current }}"><i class="fa fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url:current }}"><i class="fa fa-facebook"></i></a>
                                        
                                    </div><!-- /.icons -->
                                </section>
                                
                                {{ if keywords }}
                                <hr />
                                <section id="tags">
                                    {{ keywords }}
                                    <a class="tag" href="{{ url:site }}blog/tagged/{{ keyword }}">{{ keyword }}</a>
                                    {{ /keywords }}
                                </section>
                                {{ endif }}
                       </footer>
                    </article>
                	
                
                	
                </section>
                {{ /post }}
                <hr />
                 <?php if (Settings::get('enable_comments')): ?>
                <section id="discussion">
                        
                        
                		<?php echo $this->comments->display() ?>
                </section>
                <section id="leave-reply">
                
                
                
                	<?php if ($form_display): ?>
                		<?php echo $this->comments->form() ?>
                	<?php else: ?>
                	<?php echo sprintf(lang('blog:disabled_after'), strtolower(lang('global:duration:'.str_replace(' ', '-', $post[0]['comments_enabled'])))) ?>
                	<?php endif ?>
                </section>
                
                <?php endif ?>
            
            </div>
            
            
            
           
         </div>
         <div class="col-md-4">
            <div class="sidebar" id="sidebar">
                {{ widgets:area slug="blog" }}
            </div>
             
         </div>
    </div><!-- End row-->
    
</div>
