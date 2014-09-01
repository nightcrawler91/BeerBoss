<?php $this->load->helper('url'); ?>

<div class="hide-responsive">

  <div id="sharebox-wrapper">

    <div id="sharebox" class="absolute">

      <div class="inner">            

        <!-- Twitter -->
        <div class="panel twitter" title="Tweet this article">                        
          <a href="http://twitter.com/share" class="twitter-share-button"
          data-url="http://www.beerboss.com/"
          data-via="BeerBoss"
          data-text="BeerBoss es genial! :D"
          data-count="vertical">Tweet</a>
        </div>

        <!--  Facebook Like -->
        <div class="panel" title="Like on Facebook">
          <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.beerboss.com%2F&amp;layout=box_count&amp;show_faces=false&amp;width=50&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=65"&appId=413880312040171 scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:65px;" allowTransparency="true"></iframe>
        </div>

        <!-- Facebook Share-->
        <div class="panel" title="Share on Facebook">
          <a class="share-facebook" href="javascript:var d=document,f='https://www.facebook.com/share',l=d.location,e=encodeURIComponent,p='.php?src=bm&v=4&i=1364777497&u='+e(l.href)+'&t='+e(d.title);1;try{if (!/^(.*\.)?facebook\.[^.]*$/.test(l.host))throw(0);share_internal_bookmarklet(p)}catch(z) {a=function() {if (!window.open(f+'r'+p,'sharer','toolbar=0,status=0,resizable=1,width=626,height=436'))l.href=f+p};if (/Firefox/.test(navigator.userAgent))setTimeout(a,0);else{a()}}void(0)" count-layout="vertical"><img src="<?php echo base_url();?>images/facebook-button.png"></a>
        </div>                            

        <!-- Google +1 -->
        <div class="panel" title="Google +1">
          <g:plusone size="tall"></g:plusone>
        </div>     

        <!-- Pinterest -->
        <div class="panel" title="Pinterest">
          <a href="http://pinterest.com/pin/create/button/?url=http://www.beerboss.com/" class="pin-it-button" count-layout="vertical">Pin It</a>
        </div>

        <!-- StumbleUpon-->
        <div class="panel" title="StumbleUpon">
          <su:badge layout="5"></su:badge>
        </div>

      </div>

    </div>

  </div>

  <script type="text/javascript">
  /*sharebox scrolling*/
  var mediaTop = jQuery('div#sharebox').offset().top; 
  var media = jQuery('div#sharebox');

  jQuery(document).scroll( function() {
   var scrollTop = jQuery(document).scrollTop();

       //fix/unfix as necessary
       if (mediaTop < scrollTop) {
         jQuery(media).addClass('fixed'); 
       }
       else { 
         jQuery(media).removeClass('fixed'); 
       }
     });
  </script>

  <script type="text/javascript">
  (function() {
    var li = document.createElement('script'); 
    li.type = 'text/javascript'; 
    li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
  </script>

</div>