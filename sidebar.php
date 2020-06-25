<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<button class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple sidebar-toggle" mdui-drawer="{target: '#sidebar', overlay: true}"><i class="mdui-icon material-icons">menu</i></button>
<div class="mdui-drawer mdui-drawer-close mdui-color-white" id="sidebar">
    <div class="sidebar-img">
        <img src="https://files.penguin-logistics.cn/nav.png"/>
    </div>
    <ul class="mdui-list">
        <a href="<?php $this->options->siteUrl(); ?>"><li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
            <div class="mdui-list-item-content">主页</div>
        </li></a>
        <?php if($this->user->hasLogin()): ?>
        <a href="<?php $this->options->adminUrl(); ?>"><li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">settings</i>
            <div class="mdui-list-item-content"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</div>
        </li></a>
        <a href="<?php $this->options->logoutUrl(); ?>"><li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">exit_to_app</i>
            <div class="mdui-list-item-content"><?php _e('退出'); ?></div>
        </li></a>
        <?php else: ?>
        <a href="<?php $this->options->adminUrl('login.php'); ?>"><li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">account_circle</i>
            <div class="mdui-list-item-content"><?php _e('登录'); ?></div>
        </li></a>
        <?php endif; ?>
        <a href="<?php $this->options->feedUrl(); ?>" no-pjax target="_blank"><li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">rss_feed</i>
            <div class="mdui-list-item-content"><?php _e('文章 RSS'); ?></div>
        </li></a>
        <a href="<?php $this->options->commentsFeedUrl(); ?>" no-pjax target="_blank"><li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">rss_feed</i>
            <div class="mdui-list-item-content"><?php _e('评论 RSS'); ?></div>
        </li></a>
    </ul>
    <div class="mdui-panel" mdui-panel>
        <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">
                <div class="mdui-panel-item-title"><?php _e('页面'); ?></div>
                <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
            </div>
            <div class="mdui-panel-item-body">
                <ul class="mdui-list">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while ($pages->next()): ?>
                    <a href="<?php $pages->permalink(); ?>"><li class="mdui-list-item mdui-ripple">
                        <?php $pages->title(); ?>
                    </li></a>
                <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">
                <div class="mdui-panel-item-title"><?php _e('归档'); ?></div>
                <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
            </div>
            <div class="mdui-panel-item-body">
                <ul class="mdui-list">
                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                            ->parse('
                    <a href="{permalink}"><li class="mdui-list-item mdui-ripple">
                            {date}
                    </li></a>
                '); ?>
                </ul>
            </div>
        </div>
        <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">
                <div class="mdui-panel-item-title"><?php _e('分类'); ?></div>
                <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
            </div>
            <div class="mdui-panel-item-body">
                <ul class="mdui-list">
                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                    <a href="<?php $category->permalink(); ?>"><li class="mdui-list-item mdui-ripple">
                        <?php $category->name(); ?>
                    </li></a>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>