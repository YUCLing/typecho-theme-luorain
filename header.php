<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!isset($_SERVER["HTTP_X_PJAX"])): ?>
<!--
                                   ./--:y+/////////////////+----`                                   
                .`            `-:+/////////////////////////////////:-:.                             
                          `.://////////////////////////////////////////+::-                         
               -.     ..:///////////+/--:/+``````````````::--/+////////////:..                      
               ``  ..-/////////+/:-```                       ````-:/+/////////---                   
              `` `://////////-```                                  ``::////////++:`                 
              /--////////:-``           ..``.///::://+o.``.`           ``-/+///////-`               
             :o+/////+/-`         ``./::+//////////////////:::/..`        `.-////////-`             
           `-////////:`        `.:://////////////////////////////::..`       `-////////-`           
         `-///////-`        -::///////////:::///++++//:::+///////////:.``      `-////////:          
        ///////+:`       `.://////////:...`    ``````    -..:/://///////:.       `-///////-`        
      .-///////:`     `-/////////++--`                       ` .-:////////:.       `-//////:`       
     `o//////-`      ./+/////////++-----:-````````````````````----//////////:.      `:///////-      
    `///////:`      .:////////////////////////////////////////////////////////:.      .///////-     
   `///////-      .://////:---:////////////////////////////////////////////////:.      .://////-    
   ///////.      `///////-`   `````.:-----:++//////////////+:------/-````.://////-      `://////-   
  .//////.      .://///:.`                 ..``````````````.`            -////////-      `o/////+`  
 `///////`     .://////.                                               .-//////////-     `-///////  
 //////+`     .://////:::-.```                                       `-/+///////////-      -//////- 
`//////-      /+//////////////:::-                              ```::///////:.-//////-     `+/////o 
//////+`     :///////:///////////-       `::::::::::::-/`      -///////////:` `://///:      -//////`
//////+`     ://///-` `..-//////-        `/////////////`      `:////////-`     .+/////:     `//////+
//////`      ://///.      -/////:       `+/////////////`      ://///-.`        :s/////:     `o/////+
//////`     /+////+.     `:////:.       `//////--/////-       :////+.           ./////:     `o//////
//////`     /+/////.     -/////-        ./////- //////       -/////:`           ./////:      `//////
//////`     /+/////.    .//////.       `+/////  /////+       ://///.            ./////:      `//////
//////`     /+////+.    -+////-        `/////////////        ://///.            ./////:      `//////
//////`     ://///+.    -/////:        `-///////////+       ://///.             ./////:     `o/////+
//////`      ://///.    -////+:          `--::/oooo:`       :////+.            -+////+:     `+/////o
+/////+`     :+/////.   -+////-               `````        //////.             .//////-     `//////.
///////`     `://///-`  `-/////:`                          :////+.            -+/////:      -////// 
`//////-      -//////.   .///////:`                       ./////-`           `-/////:`     `+////// 
 ///////`      :+/////.   `-///////::::/.````````         //////.           `-//////-     `///////` 
 `//////:`     .//////:.`   `-///////////////////        ./////+.          `-//////-      .//////s  
  -///////`     .///////-`    `-:://////////////+        //////.          .///////-      .+/////:`  
   .///////`     .://////:.`      `.....-/+/////-        /////+.        `.///////:      -+/////+`   
    .//////:`      -////////-`           `+/////        ://///:`       .://////:.      .+/////+/    
     -//////-`      .:///////:.          ./////-        /////+`    ``.://////+:`      .///////:     
      -///////.       .:///////:-.`     `//////        -//////`  `./////////:.`     `-//////:`      
       :///////-`       .://///////:.. ``/////+        //////...://////////.       .//////++`       
        `-///////-`       .:://///////:///////.       -////////////////:.``      `-///////-.        
          :////////-`       `.::/+////////////::::::::+/////////////::-        `-///////-`          
           `-////////-`        `-+::////////////////////////////::.`        `.-////////:`           
             `-////////:-`         ``./:::+///////////////:::.`.          `-/+///////:.             
               `-/////////:-`            `..````````````..            `.-://////////.               
                 .://////////:-```                                ``::/+////////-``                 
                    `:////////////:-````                    ```-::///////////++.                    
                       `://///////////++---:/:/``````:/::--:++////////////-..                       
                          .-://///////////////////////////////////////+/-.                          
                              .:-:+//////////////////////////////o:-`                               
                                    .:----+////////////++y:---`                                     
                                        华风夏韵，洛水天依                                           
-->
<!DOCTYPE HTML>
<html lang="zh-cnm-Hans">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta name="title" content="<?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?>">
    <?php
        $desc = "一个普通人的博客";
        if ($this->is("post") || $this->is("page")) {
            ob_start();
            $this->excerpt(60, '...');
            $desc = ob_get_contents();
            ob_end_clean();
        }
    ?>
    <meta name="description" content="<?php echo $desc ?>">
    <meta property="og:type" content="<?php echo $this->is("post") ? "article" : "website" ?>">
    <meta property="og:title" content="<?php $this->options->title(); ?>">
    <meta property="og:description" content="<?php echo $desc ?>">
    <meta property="og:image" content="https://files.penguin-logistics.cn/lty.png">
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="<?php $this->options->title(); ?>">
    <meta property="twitter:description" content="<?php echo $desc ?>">
    <meta property="twitter:image" content="https://files.penguin-logistics.cn/lty.png">
<?php endif; ?>
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php if (!isset($_SERVER["HTTP_X_PJAX"])): ?>
    <link rel="preconnect" href="//files.penguin-logistics.cn" crossorigin>
    <link rel="preconnect" href="//cdn.staticfile.org" crossorigin>
    <link rel="dns-prefetch" href="//files.penguin-logistics.cn">
    <link rel="dns-prefetch" href="//cdn.staticfile.org">
    <style>
        a {
            color: #6cf;
            text-decoration: none;
            transition: all .3s linear;
        }
        a:hover {
            color: rgb(62, 174, 230);
        }
        a:active {
            color: rgb(42, 146, 199);
        }
    </style>
    <link rel="stylesheet" href="https://cdn.staticfile.org/mdui/0.4.3/css/mdui.min.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/highlight.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/player.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/app.css'); ?>">
    <link rel="icon shortcut" type="image/ico" href="https://files.penguin-logistics.cn/lty.png">
    <?php $this->header(); ?>
</head>
<body class="mdui-theme-primary-light-blue mdui-theme-accent-light-blue">
<div class="mdui-container" id="container">
<?php endif; ?>