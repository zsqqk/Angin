<div class="mdui-col-xs-12  mdui-color-white mdui-text-color-theme-secondary in-container-bootem in-container-text">
<div class="mdui-col-xs-8 mdui-text-truncate">&nbsp;&nbsp;
<i class="fa fa-bandcamp"></i>
<div class="crumbs_patch">
	<a href="<?php $this->options->siteUrl(); ?>"> HOME </a> &raquo;</li>
	<?php if ($this->is('index')): ?><!-- 页面为首页时 -->
	
	<?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
		<?php $this->category(); ?> &raquo; <?php $this->title() ?>
	<?php else: ?><!-- 页面为其他页时 -->
		<?php $this->archiveTitle(' &raquo; ','',''); ?>
	<?php endif; ?>
</div>
</div>
<div class="mdui-col-xs-4 mdui-text-truncate mdui-text-right "><div class="mdui-col-xs-2"><i class="fa fa-ellipsis-v"></i></div>
<a class="crumbs_patch_a mdui-col-xs-10" href="<?php $this->options->siteUrl(); ?>"><i class="fa fa-grav"></i> <?php $this->options->title(); ?> &nbsp;&nbsp;&nbsp; </a>

</div>
</div>