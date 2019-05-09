<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="in-container">
<div class="mdui-col-xs-12 mdui-col-sm-12 mdui-col-md-8 mdui-col-offset-md-2">
            <div class="mdui-col-xs-12 mdui-col-sm-8 mdui-col-md-9 " id="pajx">
            <?php $this->need('dist/herderv.php'); ?>
                <div class="cn mdui-col-xs-12 mdui-color-white mdui-text-color-theme-secondary">
                    <div class="cn-container-title">
                        <div class="mdui-col-xs-12 cn-title">
                    <p class="cn-time mdui-float-right"><?php $this->date('F j, Y'); ?> </p>
                        <h2><?php $this->title(); ?></h2>
                        <p class="cn-coa">分类:<a href=""><?php $this->category(','); ?></a> · 评论:<?php $this->commentsNum('%d '); ?>条 · 热度:<span><?php get_post_view($this) ?>℃</p>
                        <div class="mdui-divider"></div></div>
                        <div class="cn-container mdui-typo">
<?php
$db = Typecho_Db::get();
$sql = $db->select()->from('table.comments')
    ->where('cid = ?',$this->cid)
    ->where('mail = ?', $this->remember('mail',true))
    ->limit(1);
$result = $db->fetchAll($sql);
if($this->user->hasLogin() || $result) {
    $content = preg_replace("/\[Ange\](.*?)\[\/Ange\]/sm",'<div class="reply2view">$1</div>',$this->content);
}
else{
    $content = preg_replace("/\[Ange\](.*?)\[\/Ange\]/sm",'<div class="reply2view">此处内容需要评论回复后方可阅读。</div>',$this->content);
}
echo $content 
?>
                        <div class="cn-footer">
            
                            <div class="mdui-divider"></div>
                    
                           <div class="cn-ont"><p> 本文由 <a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?> </a> 创作采用<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/"> 知识共享署名4.0 </a>国际许可协议进行许可</p>
                                      <p>本站文章除注明转载/出处外，均为本站原创或翻译，转载前请务必署名</p>
                             <script>
document.body.addEventListener('copy', function (e) {
    if (window.getSelection().toString() && window.getSelection().toString().length > 42) {
        setClipboardText(e);
        mdui.snackbar({
             message: '商业转载请联系作者获得授权，非商业转载请注明出处，谢谢合作。',
             position: 'top'
       });
    }
}); 
function setClipboardText(event) {
    var clipboardData = event.clipboardData || window.clipboardData;
    if (clipboardData) {
        event.preventDefault();
        var htmlData = ''
            + '著作权归作者所有。<br>'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。<br>'
            + '作者：<?php $this->author() ?><br>'
            + '链接：' + window.location.href + '<br>'
            + '来源：<?php $this->options->siteUrl(); ?><br><br>'
            + window.getSelection().toString();
        var textData = ''
            + '著作权归作者所有。\n'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。\n'
            + '作者：<?php $this->author() ?>\n'
            + '链接：' + window.location.href + '\n'
            + '来源：<?php $this->options->siteUrl(); ?>\n\n'
            + window.getSelection().toString();
 
        clipboardData.setData('text/html', htmlData);
        clipboardData.setData('text/plain',textData);
    }
}
</script>
                
                        </div>
                        
                          
                        </div>
                        
                        
                        </div>
                    </div>
                </div>
                <?php $this->need('comments.php'); ?>
            </div>
                
 

            <?php $this->need('sidebar.php'); ?>
        </div>        
 </div>

    <?php $this->need('footer.php'); ?>