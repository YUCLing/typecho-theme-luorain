<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function getPostImg($widget)
{
    /*$cid = $archive->cid;
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')
                               ->from('table.contents')
                               ->where('cid=?', $cid));
    $text = $rs['text'];
    if (0 === strpos($text, '<!--markdown-->')) {
        preg_match('/!\[[^\]]*]\([^\)]*\.(png|jpeg|jpg|gif|bmp)\)/i', $text, $img);
        if (empty($img)) {
            return null;
        } else {
            preg_match("/(?:\()(.*)(?:\))/i", $img[0], $result);
            $img_url = $result[1];
            return $img_url;
        }
    } else {
        preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $text, $img);
        if (empty($img)) {
            return null;
        } else {
            $img_url = $img[1][0];
            return $img_url;
        }
    }*/
    try {
        if ($widget->fields->picUrl){
            return $widget->fields->picUrl;
        }
        $attach = $widget->attachments(1)->attachment;
        $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
        if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
            return $thumbUrl[1][0];
        } elseif ($attach != null && $attach->isImage) {
            return $attach->url;
        } else {
            return null;
        }
    } catch(Exception $e) {
        return null;
    }
}