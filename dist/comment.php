
<div id="comments"  class="gen mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary in-container-bootem">
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
               
                
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <input type="text" name="author" id="comment-name" class="text mdui-col-xs-12 " placeholder="<?php _e('昵称'); ?>" value="<?php $this->remember('author'); ?>" required />
            </div>
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <input type="email" name="mail" id="comment-mail" class="text mdui-col-xs-12" placeholder="<?php _e('电子邮件'); ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
             </div>
             <div class="mdui-col-md-12 mdui-col-sm-12">
                <input type="url" name="url" id="comment-url" class="text mdui-col-xs-12 " placeholder="<?php _e('网址'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            </div>
      
            <?php endif; ?>
            
            <div class="comment-editor mdui-col-md-12 mdui-clearfix">
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
    

    <?php endif; ?>
</div>
