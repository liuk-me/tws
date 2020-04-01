<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="content">
  <div class="content-row">
    <div class="content-row-title"><?php $this->title() ?></div>
    <div class="content-row-author"><?php _e('作者: '); ?><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></div>
    <div class="content-row-date"><?php _e('时间: '); ?><?php $this->date(); ?></div>
    <div class="content-row-category"><?php _e('分类: '); ?><?php $this->category(','); ?></div>
    <div class="content-row-text">
      <?php $this->content(); ?>
    </div>
    <p class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
  </div>
  <ul class="postNav">
      <li class="left">上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
      <li class="right">下一篇: <?php $this->theNext('%s','没有了'); ?></li>
  </ul>
  <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
