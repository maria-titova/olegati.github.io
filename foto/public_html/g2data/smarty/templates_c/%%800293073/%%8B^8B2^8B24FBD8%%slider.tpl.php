<?php /* Smarty version 2.6.10, created on 2006-09-19 03:46:10
         compiled from gallery:themes/slider/templates/slider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'gallery:themes/slider/templates/slider.tpl', 17, false),)), $this); ?>
<div style="display: none">
<?php $_from = $this->_tpl_vars['theme']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['it']):
?>
  <?php if (isset ( $this->_tpl_vars['it']['image'] )): ?>
    <?php if (isset ( $this->_tpl_vars['it']['renderItem'] )): ?>
      <a id="img_<?php echo $this->_tpl_vars['it']['imageIndex']; ?>
" href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=".($this->_tpl_vars['it']['id']),'arg3' => "renderId=".($this->_tpl_vars['it']['image']['id'])), $this);?>
"></a>
    <?php else: ?>
      <a id="img_<?php echo $this->_tpl_vars['it']['imageIndex']; ?>
" href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['it']['image']['id']),'arg3' => "serialNumber=".($this->_tpl_vars['it']['image']['serialNumber'])), $this);?>
"></a>
    <?php endif; ?>
    <span id="title_<?php echo $this->_tpl_vars['it']['imageIndex']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['it']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</span>
    <select id="links_<?php echo $this->_tpl_vars['it']['imageIndex']; ?>
">
     <?php $_from = $this->_tpl_vars['it']['itemLinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
      <option label="<?php echo $this->_tpl_vars['link']['text']; ?>
" value="<?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['link']['params']), $this);?>
"><?php echo $this->_tpl_vars['link']['text']; ?>
</option>
     <?php endforeach; endif; unset($_from); ?>
    </select>
  <?php endif;  endforeach; endif; unset($_from); ?>
</div>

<div id="imagearea" class="gcBackground1"><div id="image"></div></div>

<div id="titlebar" class="gcBackground2 gcBorder2">
  <div id="tools_left">
    <img id="opts" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/tool.png" width="18" height="18"
     onclick="options_onoff()" alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Options'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Options'), $this);?>
"
  /><img id="slide_poz" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/poz.png" width="18" height="18"
     onclick="slide_onoff()"
     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Pause Slideshow'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Pause Slideshow'), $this);?>
"
  /><img id="slide_fwd" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/fwd.png" width="18" height="18"
     onclick="slide_onoff()"
     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Start Slideshow'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Start Slideshow'), $this);?>
"
  /><img id="slide_rev" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/rev.png" width="18" height="18"
     onclick="slide_onoff()"
     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Start Slideshow'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Start Slideshow'), $this);?>
"
  /><img id="slide_rand" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/rand.png" width="18" height="18"
     onclick="slide_onoff()"
     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Start Slideshow'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Start Slideshow'), $this);?>
"
  /></div>
  <div id="tools_right">
    <img id="full_size" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/full.png" width="18" height="18"
     onclick="image_zoom(1)" alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Full Size'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Full Size'), $this);?>
"
  /><img id="fit_size" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/fit.png" width="18" height="18"
     onclick="image_zoom(0)" alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Fit Size'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Fit Size'), $this);?>
"
  /><img id="prev_off" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/prev-off.png" width="18" height="18"
     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No Previous Image'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No Previous Image'), $this);?>
"
  /><img id="prev_img" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/prev.png" width="18" height="18"
     onclick="image_prev()"
     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Previous Image'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Previous Image'), $this);?>
"
  /><img id="next_off" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/next-off.png" width="18" height="18"
     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No Next Image'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No Next Image'), $this);?>
"
  /><img id="next_img" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/next.png" width="18" height="18"
     onclick="image_next()" alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Next Image'), $this);?>
" title="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Next Image'), $this);?>
"
  /></div>
  <div id="title" class="giTitle">&nbsp;</div>

  <div id="thumbs" class="gcBackground1 gcBorder2 sliderHoriz">
    <noscript><p class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning: This site requires javascript."), $this);?>

    </p></noscript>
    <?php $_from = $this->_tpl_vars['theme']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['it']):
 echo '';  if (isset ( $this->_tpl_vars['it']['image'] )):  echo '<a href="" onclick="image_show(';  echo $this->_tpl_vars['it']['imageIndex'];  echo ');return false">';  if (isset ( $this->_tpl_vars['it']['thumbnail'] )):  echo '';  echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['it'],'image' => $this->_tpl_vars['it']['thumbnail'],'class' => 'hthumb'), $this); echo '';  else:  echo '<p>';  echo $this->_reg_objects['g'][0]->text(array('text' => 'no thumbnail'), $this); echo '</p>';  endif;  echo '</a>';  endif;  echo '';  endforeach; endif; unset($_from); ?>
  </div>
</div>

<div id="options" class="gcBorder2">
  <?php echo $this->_reg_objects['g'][0]->theme(array('include' => "sidebar.tpl"), $this);?>

</div>

<script type="text/javascript">app_init();</script>[0]->theme(array('include' => "sidebar.tpl"), $this);?>

</div>

<script type="text/javascript">app_init();</script>