</div>
<div id="footer">
  <p><i class="fa fa-copyright"></i> <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> Powered by <a href="http://typecho.org" target="_blank">Typecho</a> & <a href="https://cwlog.net" target="_blank">cwlog.net</a></p>
  <?php if($this->options->icpNum){ ?>
    <p><a href="http://www.beian.miit.gov.cn/" target="_blank"><?php $this->options->icpNum(); ?></a></p>
  <?php }?>
</div>
<div id="back-top" state="off"><button type="buttom" id="back-top-btn"><i class="fa fa-chevron-up"></i></button></div>
</div>
<?php $this->footer(); ?>
</body>
</html>
