<?php
/**
 * 洛雨博客主题
 * 
 * @package LuoRain
 * @author Luo Tianyi
 * @version 1.0
 * @link http://luotianyi.me
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="mdui-row">
	<div class="mdui-textfield mdui-textfield-expandable mdui-float-right" id="search-field">
		<button class="mdui-textfield-icon mdui-btn mdui-btn-icon" id="search-btn"><i class="mdui-icon material-icons">search</i></button>
		<form id="search" method="POST" action="<?php $this->options->siteUrl(); ?>">
			<input name="s" class="mdui-textfield-input" type="text" placeholder="搜索"/>
		</form>
		<button class="mdui-textfield-close mdui-btn mdui-btn-icon" type="submit"><i class="mdui-icon material-icons">close</i></button>
	</div>
</div>

<div class="mdui-row">
	<div class="mdui-card" id="header">
		<div class="mdui-card-header">
			<img src="https://files.penguin-logistics.cn/lavatar.jpg" class="mdui-card-header-avatar">
			<div class="mdui-card-header-title">LRain</div>
			<div class="mdui-card-header-subtitle">大概也就是个一事无成的人吧</div>
		</div>
		<div class="mdui-card-media">
			<img src="https://files.penguin-logistics.cn/header.jpg">
			<div class="mdui-card-media-covered">
				<div class="mdui-card-primary">
					<div class="mdui-card-primary-title"><?php $this->options->title() ?></div>
					<div class="mdui-card-primary-subtitle"><?php $this->options->description() ?></div>
				</div>
			</div>
		</div>
	</div>
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
