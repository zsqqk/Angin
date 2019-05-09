<?php
/**
 * “也许，我还可以更精致”

 * @package Angin
 * @author Clear
 * @version 1.2.4
 * @link https://peela.cn/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="in-container">
<div class="mdui-col-xs-12 mdui-col-sm-12 mdui-col-md-8 mdui-col-offset-md-2">
<div class="mdui-col-xs-12 mdui-col-sm-8 mdui-col-md-9 " id="pajx">
<?php $this->need('dist/herderv.php'); ?>
<div class="mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary in-container-bootem ">
        <h2 style="color:#000;"><?php $this->title(); ?></h2>
        
        <div class="mdui-divider"></div>
        <div class="cn-container mdui-typo"><?php $this->content(); ?></div>
    </div>

<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
</div>
</div>

</div>
<?php $this->need('footer.php'); ?>