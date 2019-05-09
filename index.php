<?php

/**
 * “也许，我还可以更精致”
 * 如有BUG(运行在Windows的除外)请截图后发送至:clearzsq@gmail.com
 * 测试环境:CentOS 7.5,Apache 2.4,MySQL 5.5,php 5.6
 * 最新下载:企鹅群"724490333"
 * @package Angin
 * @author Clear
 * @version 1.3.0
 * @link https://peela.cn/
 */


if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
/** 文章置顶 */
$sticky = $this->options->sticky;
if($sticky && $this->is('index') || $this->is('front')){
    $sticky_cids = explode(',', strtr($sticky, ' ', ','));//分割文本 
    $sticky_html = "<i class='fa fa-ravelry'></i>"; //置顶标题的 html
    $db = Typecho_Db::get();
    $pageSize = $this->options->pageSize;
    $select1 = $this->select()->where('type = ?', 'post');
    $select2 = $this->select()->where('type = ? && status = ? && created < ?', 'post','publish',time());
    //清空原有文章的列队
    $this->row = [];
    $this->stack = [];
    $this->length = 0;
    $order = '';
    foreach($sticky_cids as $i => $cid) {
        if($i == 0) $select1->where('cid = ?', $cid);
        else $select1->orWhere('cid = ?', $cid);
        $order .= " when $cid then $i";
        $select2->where('table.contents.cid != ?', $cid); //避免重复
    }
    if ($order) $select1->order(null,"(case cid$order end)"); //置顶文章的顺序 按 $sticky 中 文章ID顺序
    if ($this->_currentPage == 1) foreach($db->fetchAll($select1) as $sticky_post){ //首页第一页才显示
        $sticky_post['sticky'] = $sticky_html;
        $this->push($sticky_post); //压入列队
    }
$uid = $this->user->uid; //登录时，显示用户各自的私密文章
    if($uid) $select2->orWhere('authorId = ? && status = ?',$uid,'private');
    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); //压入列队
    $this->setTotal($this->getTotal()-count($sticky_cids)); //置顶文章不计算在所有文章内
}

?>

    <div class="in-container">
        <div class="mdui-col-xs-12 mdui-col-sm-12 mdui-col-md-8 mdui-col-offset-md-2">
            <div class="mdui-col-xs-12 mdui-col-sm-8 mdui-col-md-9 " id="pajx">
            <?php $this->need('dist/herderv.php'); ?>

              <?php while($this->next()): ?>
                <div class="mdui-col-xs-12  mdui-color-white mdui-text-color-theme-secondary in-container-bootem in-container-text" style="padding:1em 0;">
                    <div class="mdui-col-xs-2 mdui-col-md-1 mdui-text-center">
                        <img src="<?php $this->options->logoUrl();?>" alt="" class="touxx">
                    </div>

                    <div class="mdui-col-xs-10 mdui-col-md-11" >
                       <p class="mdui-float-right" style="color:rgba(0,0,0,.54)!important;font-size:30px;margin:0em 1em 0 1em;"> <?php $this->sticky(); ?></p>
                       <p class="titmee">@<?php $this->author(); ?> · <?php echo getDayAgo($this->created);?> </p>
                       <h2 class="titlea"><a href="<?php $this->permalink() ?>" class="in-a"><?php $this->title() ?></a></h2>
                      <div style="color:#4A4C4E;"> <?php 
                     $this->excerpt(250);
                      ?></div>        <div class="in-conntainer-title"><a href="<?php $this->permalink() ?>">
                  
                       <div class="in-conntainer-img mdui-col-xs-12"> <?php echo img_postthumb($this->content); ?> </div></a>
                    </div>
                     <div class="mdui-col-xs-12">
                      <p class="mdui-col-xs-2"><i class="fa fa-eye"></i><?php get_post_view($this) ?></p>
                       <p class="mdui-col-xs-2 in-commmm in-angcom"><i class="fa fa-comments-o "></i> <?php $this->commentsNum('%d '); ?></p>
                            <p class="mdui-col-xs-2"><i class="fa fa-font"></i> <?php art_count($this->cid); ?></p>
                       </div>
                    </div>
            
                
                    <div class="in-conntainer-com mdui-col-md-12" >
                      <?php $this->need('dist/comment.php'); ?>
                    
                    </div>
                           </div><?php endwhile; ?>
                           <?php $this->pageNav('«', '»', 3, '...', array('wrapTag' => 'ol', 'wrapClass' => 'page-navigator', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next')); ?>
                </div>
               

            <?php $this->need('sidebar.php'); ?>
        </div>        
    </div>
    <?php $this->need('footer.php'); ?>