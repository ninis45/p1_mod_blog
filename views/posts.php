
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="page-main">
                <section id="blog-listing" class="blog-listing">
                    <header><h1>{{ helper:lang line="blog:rss_name_suffix" }}</h1></header>
                    {{ if posts }}
                    
                    	{{ posts }}
                            
                           
                        		<div class="post col-md-6">
                                    <article class="blog-listing-post">
                                        <figure class="blog-thumbnail">
                                                        <figure class="blog-meta"><span class="fa fa-file-text-o"></span>{{ helper:date format=&quot;d/M/Y&quot; timestamp=&quot;{{ created_on }}&quot; }}</figure>
                                                        <div class="image-wrapper">
                                                            <a href="{{ url }}">
                                                            <img src="{{ url:base }}files/cloud_thumb/{{ if  portada:id }}{{ portada:id }}{{ else }}0{{ endif }}/360/140/fit"/>
                                                            </a>
                                                        </div>
                                        </figure>
                                        <aside>
                                			<header><h3><a href="{{ url }}">{{ title }}</a></h3></header>
                                
                                			<!--div class="meta">
                                
                                			<div class="date">
                                				{{ helper:lang line="blog:posted_label" }}
                                				<span>{{ helper:date timestamp=created_on }}</span>
                                			</div>
                                
                                			{{ if category }}
                                			<div class="category">
                                				{{ helper:lang line="blog:category_label" }}
                                				<span><a href="{{ url:site }}blog/category/{{ category:slug }}">{{ category:title }}</a></span>
                                			</div>
                                			{{ endif }}
                                
                                			{{ if keywords }}
                                			<div class="keywords">
                                				{{ keywords }}
                                					<span><a href="{{ url:site }}blog/tagged/{{ keyword }}">{{ keyword }}</a></span>
                                				{{ /keywords }}
                                			</div>
                                			{{ endif }}
                                
                                			</div-->
                                
                                			<div class="description">
                                			   <p>{{ preview }}</p>
                                			</div>
                                        </aside>
                            
                            			<p><a href="{{ url }}" class="read-more stick-to-bottom">{{ helper:lang line="blog:read_more_label" }}</a></p>
                                    </article>
                        		</div>
                           {{ if  loop ==  0   }}
                               <div class="clearfix"></div>
                           {{ endif }}
                    
                    	{{ /posts }}
                        <div class="clearfix"></div>
                    	<div class="center">{{ pagination }}</div>
                    
                    {{ else }}
                    	
                    	{{ helper:lang line="blog:currently_no_posts" }}
                    
                    {{ endif }}
                </section>
            </div><!--end page-main-->
        </div><!--end col-md-8-->
        <div class="col-md-4">
            <div class="sidebar" id="sidebar">
              
                
                     {{ widgets:area slug="blog" }}
                
            </div>
            
            
        </div>
    </div>
</div>