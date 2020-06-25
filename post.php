<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-card" id="main" role="main">
    <div class="mdui-card-header">
		<img src="https://files.penguin-logistics.cn/lavatar.jpg" class="mdui-card-header-avatar"/>
		<div class="mdui-card-header-title"><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></div>
		<div class="mdui-card-header-subtitle">发布于<?php $this->date(); ?></div>
	</div>
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="mdui-card-primary">
			<div class="mdui-card-primary-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
			<div class="mdui-card-primary-subtitle"><span class="material-icons">inbox</span>&nbsp;<?php $this->category(','); ?></div>
		</div>
        <div class="mdui-card-content" itemprop="articleBody">
            <div class="mdui-card mdui-hoverable content-card">
                <div class="mdui-card-content">
                    <?php $this->content() ?>
                    <blockquote class="post-footer">
                        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="知识共享许可协议" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>
                        <br/>
                        除特殊声明，本博客文章均采用<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议</a>进行许可。
                        <br/>
                        转载请注明出处：<a href="https://luotianyi.me">洛雨 - luotianyi.me</a>
                    </blockquote>
                </div>
            </div>
            <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, '无'); ?></p>
        </div>
    </article>

    <?php $this->need('comments.php'); ?>
</div>
<div class="post-near">
    <?php $this->thePrev('<div class="mdui-chip mdui-float-left">
    <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">keyboard_arrow_left</i></span>
    <span class="mdui-chip-title">%s</span>
    </div>','<div class="mdui-chip mdui-float-left">
    <span class="mdui-chip-title">没有了</span>
    </div>'); ?></li>
    <?php $this->theNext('<div class="mdui-chip mdui-float-right">
    <span class="mdui-chip-title">%s</span>
    <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">keyboard_arrow_right</i></span>
    </div>','<div class="mdui-chip mdui-float-right">
    <span class="mdui-chip-title">没有了</span>
    </div>'); ?>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
