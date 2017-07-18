<?php if (!defined('EEWEE_FLATTR_VERSION')) exit('No direct script access allowed'); ?>

<div id="framework_wrap" class="wrap">

	<div id="header">
	    <h1>Manuel d'utilisation</h1>
	    <h2>Code de raccourci</h2>
	    <div class="version">
	      <?php echo EEWEE_FLATTR_VERSION; ?>
	    </div>
	</div>
  
  <div id="content_wrap">
  
    <div id="content">
      <div id="options_tabs" class="docs">
      
        <ul class="options_tabs">
          <li><a href="#general1"><?php _e('Shortcode : Widget', 'eewee_flattr'); ?></a></li>
          <!--<li><a href="#general2"><?php //_e('Shortcode : button with counter', 'eewee_flattr'); ?></a></li>-->
        </ul>
        
        <hr />
        
        <section id="general1">
          <h3><?php _e('Shortcode : Widget', 'eewee_flattr'); ?></h3>
          <p>
            <pre><code><strong>[flattr-widget id='123' w='292' h='290' sh='true']</strong></code></pre> 
            id  : Flattr id. <a href="https://flattr.com/submit" target="_blank">Id get my Flattr</a>.<br />
            w   : Width widget (default: 292px)<br />
            h   : Height widget (default: 290px)<br />
            sh  : Show header. true, false (default: false)
          </p>
          <h3>Sample</h3>
          <p>
          	<ul>
                    <li>[flattr-widget id='1090157' w='550' h='300']</li>
                    <li><?php echo do_shortcode("[flattr-widget id='1090157' w='550' h='300']"); ?></li>
                </ul>
          </p>
        </section><!-- general1 -->
        
        <hr />
        
        <!--<section id="general2">
          <h3><?php //_e('yyy', 'eewee_flattr'); ?></h3>
          <p>
            <pre><code><strong>[xxx type='xxx']</strong></code></pre> 
            type : a, b, c.
          </p>
          <h3>Sample</h3>
          <p>
          	<ul>
                    <li><strong>zzz zzz zzz</strong></li>
                    <li>aaa aaa aaa aaa aaa aaa aaa aaa</li>
                    <li>bbb bbb bbb bbb bbb bbb bbb bbb</li>
                    <li>ccc ccc ccc ccc ccc ccc ccc ccc</li>
                </ul>
          </p>
        </section>--><!-- general1 -->
        
        <br class="clear" />
      </div><!-- options_tabs -->
    </div><!-- content -->
    <!--<div class="info bottom"></div>-->   
  </div><!-- content_wrap -->

</div><!-- framework_wrap -->
<!-- [END] framework_wrap -->