<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="row page-title">
        <h1>
        <?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?>
        </h1>
    </div>

    <div class="mdui-row" id="post-list">
        <?php while($this->next()): ?>
            <article class="mdui-card mdui-shadow-3 mdui-hoverable post" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="mdui-card-header">
                    <img src="https://files.penguin-logistics.cn/lavatar.jpg" class="mdui-card-header-avatar"/>
                    <div class="mdui-card-header-title"><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></div>
                    <div class="mdui-card-header-subtitle">发布于<?php $this->date(); ?></div>
                </div>
                <?php $img = getPostImg($this); if ($img == null): ?>
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
                    <div class="mdui-card-primary-subtitle"><span class="material-icons">inbox</span>&nbsp;<?php $this->category(','); ?>&nbsp;-&nbsp;<span class="material-icons">comment</span>&nbsp;<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></div>
                </div>
                <?php else: ?>
                <div class="mdui-card-media">
                    <img src="<?php echo $img ?>"/>
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
                        <div class="mdui-card-primary-subtitle"><span class="material-icons">inbox</span>&nbsp;<?php $this->category(','); ?>&nbsp;-&nbsp;<span class="material-icons">comment</span>&nbsp;<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="mdui-card-content" itemprop="articleBody">
                    <?php $this->excerpt(80, '...') ?>
                </div>
                <div class="mdui-card-actions">
                    <a href="<?php $this->permalink() ?>" class="mdui-btn mdui-ripple mdui-float-right">阅读全文</a>
                </div>
            </article>
        <?php endwhile; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div>

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
