<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $icp = new Typecho_Widget_Helper_Form_Element_Text('icpNum', NULL, NULL, _t('ICP备案号'), _t('如果网站进行了备案，请在此填写ICP备案号'));
    $form->addInput($icp);
    
    $hotPosts = new Typecho_Widget_Helper_Form_Element_Text('hotPosts', NULL, 10, _t('热门文章列表条数'), _t('如果开启了热门文章列表，则输出此条数的记录'));
    $form->addInput($hotPosts);

    $sidebarSet = new Typecho_Widget_Helper_Form_Element_Checkbox(
      'sidebarSet',
      array(
      	'phoneSidebar' => _t('移动端显示侧边栏'),
        'ShowNewPosts' => _t('显示最新文章'),
        'ShowHotPosts' => _t('显示热门文章'),
        'ShowCategory' => _t('显示分类'),
        'ShowTags' => _t('显示标签云'),
        'ShowDatePosts' => _t('显示归档'),
        'ShowOther' => _t('显示其它杂项')),
      array('phoneSidebar', 'ShowNewPosts', 'ShowHotPosts', 'ShowCategory', 'ShowTags', 'ShowDatePosts', 'ShowOther'), _t('侧边栏显示')
    );

    $form->addInput($sidebarSet->multiMode());
}

function getHotPosts($limit = 10){
    $db = Typecho_Db::get();
    $res = $db->fetchAll($db->select()->from('table.contents')
      ->where('status = ?','publish')
      ->where('type = ?', 'post')
      ->where('created <= unix_timestamp(now())', 'post')
      ->limit($limit)
      ->order('commentsNum', Typecho_Db::SORT_DESC)
    );
    if($res){
      foreach($res as $val){            
        $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
        $title = htmlspecialchars($val['title']);
        echo '<li class="sidebar-link"><a href="'.$val['permalink'].'" title="'.$title.'" target="_blank">'.$title.'</a></li>';        
      }
    }
}

//获取Gravatar头像
function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
    preg_match_all('/((\d)*)@qq.com/', $email, $vai);
    if (empty($vai['1']['0'])) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
    }else{
        $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';
    }
    return  $url;
}