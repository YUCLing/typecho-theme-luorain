<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
function mduiGravatar($comment, $size = 32, $default = NULL)
{
    $comment->pluginHandle(__CLASS__)->trigger($plugged)->gravatar($size, "X", $default, $comment);
    if (!$plugged) {
        $url = Typecho_Common::gravatarUrl($comment->mail, $size, "X", $default, $comment->request->isSecure());
        echo '<img class="mdui-card-header-avatar" src="' . $url . '" alt="' .
        $comment->author . '" width="' . $size . '" height="' . $size . '" />';
    }
}
function mduiReply($comment, $word = '') {
    if (!$comment->isTopLevel && $comment->parameter->allowComment) {
        $word = empty($word) ? _t('回复') : $word;
        $comment->pluginHandle()->trigger($plugged)->reply($word, $comment);
        
        if (!$plugged) {
            echo '<a class="mdui-btn mdui-ripple mdui-float-right" href="' . substr($comment->permalink, 0, - strlen($comment->theId) - 1) . '?replyTo=' . $comment->coid .
                '#' . $comment->parameter->respondId . '" rel="nofollow" onclick="return TypechoComment.reply(\'' .
                $comment->theId . '\', ' . $comment->coid . ');">' . $word . '</a>';
        }
    }
}
function mduiCancelReply($comment, $word = '') {
    $word = empty($word) ? _t('取消回复') : $word;
    $comment->pluginHandle()->trigger($plugged)->cancelReply($word, $comment);
        
    if (!$plugged) {
        $replyId = $comment->request->filter('int')->replyTo;
        echo '<a class="mdui-btn mdui-ripple" id="cancel-comment-reply-link" href="' . $comment->parameter->parentContent['permalink'] . '#' . $comment->parameter->respondId .
        '" rel="nofollow"' . ($replyId ? '' : ' style="display:none"') . ' onclick="return TypechoComment.cancelReply();">' . $word . '</a>';
    }
}
function threadedComments($comments, $options) {
    $badge = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $badge .= '<div class="mdui-chip">
            <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">star</i></span>
            <span class="mdui-chip-title">博主</span>
          </div>&nbsp;';
        }
    }
?>
<li>
    <div class="mdui-card comment">
        <div class="mdui-card-header">
            <?php mduiGravatar($comments, '40', ''); ?>
            <div class="mdui-card-header-title<?php if ($badge != '') {echo " badge";} ?>"><?php echo $badge ?><?php $comments->author(); ?></div>
            <div class="mdui-card-header-subtitle"><a href="<?php $comments->permalink(); ?>">评论于<?php $comments->date('Y-m-d H:i'); ?></a></div>
        </div>
        <div class="mdui-card-content">
            <?php $comments->content(); ?>
            <div class="replys">
                <?php $comments->threadedComments($options); ?>
            </div>
        </div>
        <div class="mdui-card-actions">
            <?php mduiReply($comments) ?>
        </div>
    </div>
</li>
<?php
}
?>
<div class="mdui-card mdui-hoverable" id="comments">
    <div class="mdui-card-content">
        <?php $this->comments()->to($comments); ?>
        <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
        
        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        
        <?php endif; ?>

        <?php if($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
            <?php mduiCancelReply($comments) ?>
            </div>
        
            <h3 id="response"><?php _e('添加新评论'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if($this->user->hasLogin()): ?>
                <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a class="mdui-btn mdui-ripple" href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                <?php else: ?>
                <div class="mdui-textfield">
                    <label class="mdui-textfield-label"><?php _e('称呼'); ?></label>
                    <input name="author" id="author" class="mdui-textfield-input" type="text" value="<?php $this->remember('author'); ?>" required/>
                </div>
                <div class="mdui-textfield">
                    <label class="mdui-textfield-label"><?php _e('Email'); ?></label>
                    <input name="mail" id="mail" class="mdui-textfield-input" type="email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>/>
                </div>
                <div class="mdui-textfield">
                    <label class="mdui-textfield-label"><?php _e('网站'); ?></label>
                    <input name="url" id="url" placeholder="<?php _e('http://'); ?>" class="mdui-textfield-input" type="text" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>/>
                </div>
                <?php endif; ?>
                <div class="mdui-textfield">
                    <label class="mdui-textfield-label"><?php _e('内容'); ?></label>
                    <textarea rows="8" cols="50" name="text" id="textarea" class="mdui-textfield-input" required><?php $this->remember('text'); ?></textarea>
                </div>
                <p>
                    <button type="submit" class="mdui-btn mdui-ripple"><?php _e('提交评论'); ?></button>
                </p>
            </form>
        </div>
        <script>
            (function () {
                window.TypechoComment = {
                    dom : function (id) {
                        return document.getElementById(id);
                    },
                
                    create : function (tag, attr) {
                        var el = document.createElement(tag);
                    
                        for (var key in attr) {
                            el.setAttribute(key, attr[key]);
                        }
                    
                        return el;
                    },
                    reply : function (cid, coid) {
                        var comment = this.dom(cid), parent = comment.parentNode,
                            response = this.dom('<?php $this->respondId ?>'), input = this.dom('comment-parent'),
                            form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                            textarea = response.getElementsByTagName('textarea')[0];
                        if (null == input) {
                            input = this.create('input', {
                                'type' : 'hidden',
                                'name' : 'parent',
                                'id'   : 'comment-parent'
                            });
                            form.appendChild(input);
                        }
                        input.setAttribute('value', coid);
                        if (null == this.dom('comment-form-place-holder')) {
                            var holder = this.create('div', {
                                'id' : 'comment-form-place-holder'
                            });
                            response.parentNode.insertBefore(holder, response);
                        }
                        comment.appendChild(response);
                        this.dom('cancel-comment-reply-link').style.display = '';
                        if (null != textarea && 'text' == textarea.name) {
                            textarea.focus();
                        }
                        return false;
                    },
                    cancelReply : function () {
                        var response = this.dom('{$this->respondId}'),
                        holder = this.dom('comment-form-place-holder'), input = this.dom('comment-parent');
                        if (null != input) {
                            input.parentNode.removeChild(input);
                        }
                        if (null == holder) {
                            return true;
                        }
                        this.dom('cancel-comment-reply-link').style.display = 'none';
                        holder.parentNode.insertBefore(response, holder);
                        return false;
                    }
                };
            })();
        </script>
        <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
        <?php endif; ?>
    </div>
</div>
