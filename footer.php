<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!isset($_SERVER["HTTP_X_PJAX"])): ?>
</div>
<div class="pjax-anim">
    <div class="loading-cube">
        <div class="cube1"></div>
        <div class="cube2"></div>
        <div class="cube4"></div>
        <div class="cube3"></div>
    </div>
</div>
<button class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-theme-accent" id="back-to-top"><i class="mdui-icon material-icons">keyboard_arrow_up</i></button>
<footer id="footer" role="contentinfo" class="mdui-shadow-3">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
    主题 <a href="https://luotianyi.me">LuoRain</a>.
    <br/>
    "洛天依"为天矢禾念娱乐集团旗下的虚拟歌手 本站与天矢禾念娱乐集团没有从属关系
    <br/>
    本站已运行 <span id="runtime">?天?小时?分钟?秒</span>
    <br/>
    <img src="<?php $this->options->themeUrl('images/vultr.png'); ?>" id="vultr" title="云服务器由Vultr提供"/>
</footer>
<?php $this->footer(); ?>
<script src="https://cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="https://cdn.staticfile.org/mdui/0.4.3/js/mdui.min.js"></script>
<script src="https://cdn.staticfile.org/pangu/4.0.7/pangu.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15/dist/smooth-scroll.polyfills.min.js"></script>
<script src="<?php $this->options->themeUrl('js/highlight.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/highlightjs-line-numbers.js@2.6.0/dist/highlightjs-line-numbers.min.js"></script>
<script src="<?php $this->options->themeUrl('js/player.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>
<script src="https://cdn.staticfile.org/smoothscroll/1.4.10/SmoothScroll.min.js" async></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135957142-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135957142-4');
</script>
</body>
</html>
<?php endif; ?>