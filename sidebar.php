<div class="mdui-col-xs-12 mdui-col-sm-4 mdui-col-md-3">

                    <div class="mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary in-container-bootem in-about">
                    <div class="in-about-ang">
                            <div class="in-about-ang-img"><img class="mdui-img-circle"  src="<?php $this->options->logoUrl();?>" alt="<?php $this->options->title() ?>"></div>
                            <div class="in-about-ang-tit"><h4> <?php $this->options->logotitle(); ?></h4><div class="about-text"><?php $this->options->logotxt(); ?></div></div>
                        </div>
                        <div class="in-about-tj">
                        <a  class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: '<?php $this->options->weixin();?>', position: 'top'}" ><i class="fa fa-weixin"></i></a>
                        <a class="mdui-btn mdui-btn-icon " mdui-tooltip="{content: '<?php $this->options->qq();?>', position: 'top'}"><i class="fa fa-qq "></i></a>
                        <a  class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: '<?php $this->options->mail();?>', position: 'top'}"><i class="fa fa-envelope"></i></a>
                        <a href="<?php $this->options->loginUrl();?>" class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: '登陆', position: 'top'}"><i class="fa fa-cog"></i></a>
                        </div>
                    </div>


                    <div class="mdui-col-xs-12  mdui-text-color-theme-secondary mdui-color-white in-container-bootem in-about music" style="padding: 0;">
                    <?php $this->need('dist/music.php'); ?>




                    </div>




                    <div class="mdui-col-xs-12  mdui-text-color-theme-secondary in-container-bootem in-about" style="padding: 0;">
                        <div class="in-void">
                            <p> <?php $this->options->adContentSidebar(); ?></p>
                        </div>
                    </div>
                    

                     <div class="mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary in-container-bootem in-about comments-in-about">
                         <p class="in-title">最新评论</p>
                         <ul class="mdui-list">
						<?php $this->widget('Widget_Comments_Recent','pageSize=5','ignoreAuthor=true')->to($comments); ?>
						<?php while($comments->next()): ?>
							<li class="mdui-list-item mdui-ripple"><div class="mdui-list-item-content mdui-text-truncate"><a title="<?php $comments->title(); ?>" href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(54, '...'); ?></div></a><div class="mdui-list-item-avatar"><a title="<?php $comments->title(); ?>" href="<?php $comments->permalink(); ?>"><?php $comments->gravatar('32',''); ?></a></div></li>
						<?php endwhile; ?>
					</ul>
                     </div>
            </div>