 <?php $this->header('commentReply=1&description=0&keywords=0&generator=0&template=0&pingback=0&xmlrpc=0&wlw=0&rss2=0&rss1=0&antiSpam=0&atom'); ?>
 <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
//代码参考 Theme Quark http://sunhua.me/Quark.html
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '"'.'" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>
<li id="li-<?php $comments->theId(); ?>" class="mdui-col-xs-12 comment-body<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
<div id="<?php $comments->theId(); ?>">
    <?php $avatar = 'https://secure.gravatar.com/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d=';?>
    <div class="mdui-col-xs-3 mdui-col-md-2 comment-abouttx">
    <img class="avatar mdui-img-circle" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" />
</div>
    <div class="comment_main mdui-col-xs-9 mdui-col-md-10 mdui-text-truncate">
    
        <div class="comment_meta">
            <span class="comment_author "><?php echo $author ?></span> <span class="comment_time mdui-float-right"><?php $comments->date("Y年m月d日"); ?></span>
        </div>
           <?php  
if($comments->parent){   
    $p_comment = getPermalinkFromCoid($comments->parent);   
    $p_author = $p_comment['author'];   
    $p_text = mb_strimwidth(strip_tags($p_comment['text']), 0, 100,"...");   
    $p_href = $p_comment['href'];   
    echo "<div class='comments-connt'><a href='$p_href' title='$p_text'>@$p_author</a>";   
}   
?>  <?php $comments->content(); ?><span class="comment_reply mdui-text-right  mdui-col-xs-12"><?php $comments->reply(); ?></span><div class="mdui-divider mdui-clearfix comment-divider"></div>
    </div>
    
</div>
<?php if ($comments->children){ ?><div class="comment-children mdui-clearfix">
    
    
    <?php $comments->threadedComments($options); ?></div><?php } ?>
</li>
<?php } ?>

<div id="comments"  class="gen mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary in-container-bootem">
    <h3 class="manycomments"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('<i class="fa fa-commenting "></i> 共有 %d 条评论')); ?></h3>
    <?php $this->comments()->to($comments); ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">

        
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <div class="comment-inputs mdui-col-md-12 "> <div class="mdui-col-md-2 mdui-col-sm-12 comment-abouttx">
                    <img src="https://secure.gravatar.com/avatar/" alt="默认头像">
                </div><div class="mdui-col-md-10 mdui-col-sm-12">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
               
                      <div class="com-input">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <input type="text" name="author" id="comment-name" class="text mdui-col-xs-12 " placeholder="<?php _e('昵称'); ?>" value="<?php $this->remember('author'); ?>" required />
            </div>
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <input type="email" name="mail" id="comment-mail" class="text mdui-col-xs-12" placeholder="<?php _e('电子邮件'); ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
             </div>
             <div class="mdui-col-md-12 mdui-col-sm-12">
                <input type="url" name="url" id="comment-url" class="text mdui-col-xs-12 " placeholder="<?php _e('网址'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            </div>
      </div>
            <?php endif; ?>

            <div class="comment-editor mdui-clearfix mdui-col-md-12">
                <textarea name="text" id="textarea" class="text textarea mdui-col-xs-12" rows="4" required onkeydown="if((event.ctrlKey||event.metaKey)&&event.keyCode==13){document.getElementById('submitComment').click();return false};"><?php $this->remember('text'); ?></textarea>
                <div class="mdui-textfield-helper textareatext"><i class="fa fa-exclamation-circle "></i> 支持markdown语法</div>
            </div>
      
    		<div class="comment-buttons">
                <div class="left ">
                   
                </div>
                <div class="right">

                    <button id="submitComment" type="submit" class="mdui-clearfix submit mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple mdui-color-black"><?php _e('发布评论'); ?></button>
                                    <div class="cancel-comment-reply">
                      <?php $comments->cancelReply(); ?>
                    </div>
                </div>
           </div> </div>  </div>
    	</form>
    </div>
    <?php else: ?>
    <h2><center><?php _e('抱歉，评论已关闭...'); ?></center></h2>
    <?php endif; ?>

    <?php if ($comments->have()): ?>
    
    <?php $comments->listComments(); ?>

    <div class="nav-page">
        <center><?php $comments->pageNav('&laquo;', '&raquo;'); ?></center>
    </div>
    <?php endif; ?>
</div>
