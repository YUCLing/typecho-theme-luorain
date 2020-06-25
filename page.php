<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php
ob_start();
$this->content();
$content = ob_get_contents();
ob_end_clean();
ob_start();
$this->title();
$title = ob_get_contents();
ob_end_clean();
?>

<div class="mdui-card" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="mdui-card-primary">
			<div class="mdui-card-primary-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
		</div>
        <div class="mdui-card-content" itemprop="articleBody">
            <div class="mdui-card mdui-hoverable content-card">
                <div class="mdui-card-content">
                    <?php $this->content() ?>
                </div>
            </div>
        </div>
    </article>

    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
