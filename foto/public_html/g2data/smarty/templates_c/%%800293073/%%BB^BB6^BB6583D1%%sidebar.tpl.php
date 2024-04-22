<?php /* Smarty version 2.6.10, created on 2006-09-19 03:20:20
         compiled from gallery:themes/floatrix/templates/sidebar.tpl */ ?>
<div id="gsSidebar" class="inner gcBorder1 gcBackground3" style="overflow: auto;">
  <a href="javascript:return true;" id="hideSidebarTab"
      onclick="MM_changeProp('gsSidebarCol','','style.display','none','DIV');
            MM_changeProp('showSidebarTab','','style.display','block','DIV');
            return false;">
      <img src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/images/tab_close_sidebar.gif" alt="Hide album options"/></a>
    <?php $_from = $this->_tpl_vars['theme']['params']['sidebarBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
    <?php echo $this->_reg_objects['g'][0]->block(array('type' => $this->_tpl_vars['block']['0'],'params' => $this->_tpl_vars['block']['1'],'class' => 'gbBlock'), $this);?>

  <?php endforeach; endif; unset($_from); ?>
  <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.NavigationLinks",'class' => 'gbBlock'), $this);?>

</div>
<!--[if lte IE 6.5]><iframe></iframe><![endif]-->