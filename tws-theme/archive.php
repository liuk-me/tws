<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="content">
  <?php if($this->have()){ ?>
  <?php while($this->next()){ ?>
  <div class="content-row">
    <div class="content-row-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
    <div class="content-row-author"><?php _e('作者: '); ?><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></div>
    <div class="content-row-date"><?php _e('时间: '); ?><?php $this->date(); ?></div>
    <div class="content-row-category"><?php _e('分类: '); ?><?php $this->category(','); ?></div>
    <div class="content-row-text">
      <?php $this->content('- 阅读剩余部分 -'); ?>
    </div>
  </div>
  <?php } ?>
<?php }else{ ?>
  <br><br><center><?php _e('没有找到对应内容'); ?></center>
<?php } ?>
  <div id="pageNav"><?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
