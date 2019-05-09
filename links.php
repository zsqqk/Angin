<?php
/**
* 友情链接
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="in-container">
<div class="mdui-col-xs-12 mdui-col-sm-12 mdui-col-md-8 mdui-col-offset-md-2">
<div class="mdui-col-xs-12 mdui-col-sm-8 mdui-col-md-9 " id="pajx">
<?php $this->need('dist/herderv.php'); ?>
<div class="mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary in-container-bootem ">
<div class="mdui-tab " mdui-tab>
  <a href="#example1-tab1" class="mdui-ripple  mdui-tab-active">友链申请</a>
  <a href="#example1-tab2" class="mdui-ripple ">链接</a>
</div>
<div id="example1-tab1" class="mdui-p-a-2"><div class="cn-container mdui-typo"><?php $this->content(); ?></div></div>
<div id="example1-tab2" class="mdui-p-a-2 ab-container">
    <h2>友情链接</h2>
    <ul class="mdui-list mdui-list-dense">
       <?php 
         $mypattern = <<<eof
         <li class="mdui-list-item mdui-ripple"><a href="{url}" target="_blank" class="links-a"><div class="mdui-list-item-content">{name}</div>
         </a><div class="mdui-list-item-avatar"><img src="{image}"/></div></li>
eof;
       
       
       Links_Plugin::output($mypattern, 0, "ten");?>
    </ul>

    <h2>推荐链接</h2>
    <ul class="mdui-list mdui-list-dense">
    <?php  Links_Plugin::output($mypattern, 0, "good");?>
    </ul>

</div>

</div>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>