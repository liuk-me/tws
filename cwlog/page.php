<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="content">
  <div class="content-row">
    <div class="content-row-title"><?php $this->title() ?></div>
    <div class="content-row-text">
      <?php $this->content(); ?>
    </div>
  </div>
  <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
