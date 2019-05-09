<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta itemprop="image" content="<?php $this->options->favicon(); ?>" />
  <link rel="icon" type="image/ico" href="<?php $this->options->favicon(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php $this->keywords(); ?>" />
  <meta itemprop="name" content="比你们都好看，哈哈哈哈" />
  <meta name="description"  itemprop="description"  content="<?php $this->options->description() ?>" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('dist/css/vs.css'); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('dist/css/nprogress.css'); ?>" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('libs/zoom.css'); ?>" />
    <script src="<?php $this->options->themeUrl('dist/js/nprogress.js'); ?>"></script> 
    <script src="<?php $this->options->themeUrl('dist/js/jquery.min.js'); ?>"></script>
  <meta name="baidu-site-verification" content="JbMr1PPtdh" />
</head>
<body class="mdui-color-grey-200 ">
    <div class="mdui-container-fluid mdui-color-white">
       <div class="mdui-row">
            <div class="mdui-col-xs-12 mdui-col-sm-12 mdui-col-md-8 mdui-col-offset-md-2 in-menu-top-left">
            <div id="menu" class="mdui-col-xs-9">
              <?php $this->widget('Widget_Contents_Page_List')
               ->parse('<a href="{permalink}">{title}</a>'); ?>
            </div>   
            
            <div class="mdui-col-xs-3 mdui-color-white mdui-text-color-theme-secondary mdui-hidden-sm-down"> 
                    <form method="post" action="">
                          <div class="search  mdui-col-md-12">
                          <input type="text" name="s" class="text search-a  mdui-col-xs-12"   size="32" placeholder="搜点什么..?" /> 
                          </div>
                     </form>
                    </div>
            </div>
        </div>
    </div>
