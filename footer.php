<div class="mdui-col-xs-12 mdui-col-sm-12  in-footer">
© 2018 · <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> · <a href="<?php $this->options->feedUrl(); ?>" target="_blank">Entries (RSS)</a> 
</div>

<a href="#" class="mdui-fab mdui-fab-mini mdui-color-black mdui-fab-fixed" style="transition-delay: 15ms;display:none;" id="back-to-top"><i class="mdui-icon material-icons">touch_app</i></a>

<script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
 <script src="<?php $this->options->themeUrl('dist/js/jquery.pjax.min.js'); ?>"></script>
 <script src="<?php $this->options->themeUrl('dist/js/highlight.pack.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('dist/js/transition.js'); ?>"></script> 
<script src="<?php $this->options->themeUrl('libs/zoom.js'); ?>"></script>
 <script src="<?php $this->options->themeUrl('js/min.js'); ?>"></script>
 <script>
 //pjax 刷新
$(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', {
    container: '#pajx',
    fragment: '#pajx',
    timeout: 8000
}).on('pjax:send',
function() {
    NProgress.start();//加载动画效果开始

}).on('pjax:complete',
function() {
NProgress.done();//加载动画效果结束
reHighlightCodeBlock();
initialization();
});
       

 </script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?f6ceae76a09c50e0263e46976f34cecd";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>