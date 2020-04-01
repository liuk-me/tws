<?php
if(!defined('__TYPECHO_ROOT_DIR__')) exit;
if(!in_array('phoneSidebar', $this->options->sidebarSet)){?>
<style>@media screen and (max-width: 760px){ #sidebar { display: none;}}</style>
<?php } ?>
<div id="sidebar">
  <?php if(in_array('ShowNewPosts', $this->options->sidebarSet)){ ?>
  <div class="sidebar-list">
    <label><?php _e('最新文章'); ?></label>
    <ul>
      <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li class="sidebar-link"><a href="{permalink}">{title}</a></li>'); ?>
    </ul>
  </div>
  <?php } ?>
  <?php if(in_array('ShowHotPosts', $this->options->sidebarSet)){ ?>
  <div class="sidebar-list">
    <label><?php _e('热门文章'); ?></label>
    <ul>
      <?php getHotPosts($this->options->hotPosts); ?>
    </ul>
  </div>
  <?php } ?>
  <?php if(in_array('ShowCategory', $this->options->sidebarSet)){ ?>
  <div class="sidebar-list">
    <label><?php _e('分类'); ?></label>
    <ul>
      <?php
      $this->widget('Widget_Metas_Category_List')->to($categorys);
      while($categorys->next()){
        if($categorys->levels == 0){
          $children = $categorys->getAllChildren($categorys->mid);
          if(empty($children)){ ?>
            <li class="sidebar-link"><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
          <?php }else{ ?>
            <li class="sidebar-link"><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
          <?php foreach ($children as $mid) {
            $child = $categorys->getCategory($mid); ?>
            <li class="sidebar-link"><a href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>">&nbsp;-><?php echo $child['name']; ?></a></li>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>
  <?php } ?>
  <?php if(in_array('ShowTags', $this->options->sidebarSet)){ ?>
  <div class="sidebar-list">
    <label><?php _e('标签'); ?></label>
    <ul>
      <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud','ignoreZeroCount=1&limit=20')->to($tags); ?>
      <?php if($tags->have()){ ?>
        <?php while ($tags->next()){ ?>
          <li class="sidebar-tag"><a href="<?php $tags->permalink();?>"><?php $tags->name(); ?></a></li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
  <?php } ?>
  <?php if(in_array('ShowDatePosts', $this->options->sidebarSet)){ ?>
  <div class="sidebar-list">
    <label><?php _e('归档'); ?></label>
    <ul>
      <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
    </ul>
  </div>
  <?php } ?>
  <?php if(in_array('ShowOther', $this->options->sidebarSet)){ ?>
  <div class="sidebar-list">
    <label><?php _e('其它'); ?></label>
    <ul>
      <?php if($this->user->hasLogin()): ?>
          <li><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
          <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
      <?php else: ?>
          <li><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
      <?php endif; ?>
      <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
      <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
    </ul>
  </div>
  <?php } ?>
</div>
