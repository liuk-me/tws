<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="content">
  <div class="content-row">
    <div class="content-row-title"><a><?php $this->title() ?></a></div>
    <div class="content-row-text">
      <?php $this->content(); ?>
    </div>
  </div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
