<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
  <title><?php $this->archiveTitle(array(
          'category'  =>  _t('分类 %s 下的文章'),
          'search'    =>  _t('包含关键字 %s 的文章'),
          'tag'       =>  _t('标签 %s 下的文章'),
          'author'    =>  _t('%s 发布的文章')
      ), '', ' - '); ?><?php $this->options->title(); ?></title>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/common.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/header.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/content.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/sidebar.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/comment.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/widgets.css'); ?>">
  <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
  <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('js/header.js'); ?>"></script>
  <?php if(in_array('BackTop', $this->options->sidebarSet)){ ?>
    <script type="text/javascript">$('document').ready(function(){$('#back-top').attr('state', 'on');});</script>
  <?php } ?>
  <script type="text/javascript" src="<?php $this->options->themeUrl('js/widgets.js'); ?>"></script>
  <?php if(in_array('ActivePjax', $this->options->sidebarSet)){ ?>
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
    <script type="text/javascript">
      $(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[no-pjax])', {
        container: '#pjax-container',
        fragment: '#pjax-container',
        timeout: 8000
      });
    </script>
  <?php } ?>
  <?php $this->header(); ?>
</head>
<body>
<div id="pjax-container">
<div id="nav-fixed">
  <div id="nav">
    <div id="nav-title"><?php $this->options->title(); ?></div>
    <div id="nav-search">
      <form action="<?php $this->options->siteUrl(); ?>" method="post">
        <input type="text" name="s" id="nav-search-input">
        <button type="submit" id="nav-search-submit"><i class="fa fa-search"></i></button>
        <button type="button" id="nav-search-btn"><i id="nav-search-i" class="fa fa-search"></i></button>
      </form>
    </div>
    <div id="nav-link">
      <ul>
        <li><a href="<?php if($this->is('index')){ echo "#"; }else{ $this->options->siteUrl(); }?>"><?php _e('首页'); ?></a></li>
        <li id="nav-category">
          <a href="#"><?php _e('分类'); ?></a>
          <div id="nav-category-list">
            <ul>
              <?php
              $this->widget('Widget_Metas_Category_List')->to($categorys);
              while($categorys->next()){
                if($categorys->levels == 0){
                  $children = $categorys->getAllChildren($categorys->mid);
                  if(empty($children)){ ?>
                    <li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
                  <?php }else{ ?>
                    <li>
                      <a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
                      <div id="nav-category-list-list">
                        <ul>
                          <?php foreach ($children as $mid) {
                            $child = $categorys->getCategory($mid); ?>
                            <li><a href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>">&nbsp;-><?php echo $child['name']; ?></a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </li>
                  <?php
                  }
                }
              } ?>
            </ul>
          </div>
        </li>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
<hr>
</div>
<div id="bodyer">
