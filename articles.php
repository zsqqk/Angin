<?php
/**
* 归档
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
<div class="mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary in-container-bootem ab-left">
    <div class="ab-img"style="background-image: url( <?php $this->options->articlesImg(); ?>);">
    </div>
<div class="ab-con">
<div class="ab-container">
  <h2>标签云</h2>
  <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=10000')->to($tags); ?>
<?php if($tags->have()): ?>
<ul class="tags-list">
<?php while ($tags->next()): ?>
    <li><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php else: ?>
    <li><?php _e('还没有标签QAQ'); ?></li>
<?php endif; ?>
</ul>
    <?php
        $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
        $year=0; $mon=0; $i=0; $j=0;   
        $output = '<div class="connpjqx"><div id="archives">';   
        while($archives->next()):   
            $year_tmp = date('Y',$archives->created);   
            $mon_tmp = date('m',$archives->created);   
            $y=$year; $m=$mon;   
            if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
            if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
            if ($year != $year_tmp) {   
                $year = $year_tmp;   
                $output .= ''; //输出年份   
            }   
            if ($mon != $mon_tmp) {   
                $mon = $mon_tmp;   
                $output .= '<h2 class="al_mon">'. $year .'年的第'. $mon .'个月份</h2><ul class="al_mon_list"><li><ul class="al_post_list mdui-list mdui-list-dense">'; //输出月份   
            }   
            $output .= '<li><a class="al_memm mdui-list-item mdui-ripple mdui-valign" href="'.$archives->permalink .'"><span class="mdui-list-item-content">'. $archives->title .'</span>'.date('d日',$archives->created).' </a></li>'; //输出文章日期和标题   
        endwhile;   
        $output .= '</ul></li></ul></div></div>';
        echo $output;
    ?>
    
    </div>
    </div>


</div>
</div>
<?php $this->need('sidebar.php'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>