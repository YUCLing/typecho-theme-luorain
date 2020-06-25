<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="mdui-card" id="main" role="main">
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">404</div>
            <div class="mdui-card-primary-subtitle">Not Found</div>
        </div>
        <div class="mdui-card-content">
            你找的东西找不到啦
        </div>
        <div class="mdui-card-actions">
            <a class="mdui-btn mdui-ripple mdui-float-right" href="<?php $this->options->siteUrl(); ?>">回到主页</a>
        </div>
    </div>
    <?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>