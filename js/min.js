
$(document).ready(function(){
    hljs.initHighlightingOnLoad();
    $(".in-footer").prepend('<p>Theme <a href="https://peela.cn/" target="_blank">Angin</a> By <a href="https://peela.cn/" target="_blank">CLEAR</a></p> ');
    initialization();

});

function initialization(){
    zoomJs();
    mdui.mutation();  // 选项卡事件
    inAng();
}


/*
* 代码高亮
*/
function reHighlightCodeBlock(){
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
      });
}
function zoomJs(){
        var setupContents = function () {
            $(".cn-container img:not(article .link-box img, img[no-zoom])").each(function() {
                $(this).attr('data-action', 'zoom');
                if($(this).next().is('br')){
                    $(this).next().remove();
                }
            });

        };
 setupContents();
}

function inAng(){ 
 $(".in-angcom").click(function(){
    var a = $(".in-angcom").index(this)
    //显示评论区域
    $('.in-conntainer-com').eq(a).css({
        display:'block'
    })
 })
                       }
$(function(){
        //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
        $(function () {
            $(window).scroll(function(){
                if ($(window).scrollTop()>100){
                    $("#back-to-top").fadeIn(1500);
                }
                else
                {
                    $("#back-to-top").fadeOut(1500);
                }
            });

            //当点击跳转链接后，回到页面顶部位置
            $("#back-to-top").click(function(){
                //$('body,html').animate({scrollTop:0},1000);
        if ($('html').scrollTop()) {
                $('html').animate({ scrollTop: 0 }, 1000);
                return false;
            }
            $('body').animate({ scrollTop: 0 }, 1000);
                 return false;            
           });       
     });    
});

