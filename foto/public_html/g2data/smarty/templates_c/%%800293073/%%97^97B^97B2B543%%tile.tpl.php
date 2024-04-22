<?php /* Smarty version 2.6.10, created on 2006-09-19 03:47:44
         compiled from gallery:themes/tile/templates/tile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'gallery:themes/tile/templates/tile.tpl', 31, false),)), $this); ?>
<table border="0" cellspacing="0" cellpadding="0">
<tr valign="top"><td id="gsSidebarCol">
  <div id="gsSidebar" class="gcBorder1">
        <?php $_from = $this->_tpl_vars['theme']['params']['sidebarBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
      <?php echo $this->_reg_objects['g'][0]->block(array('type' => $this->_tpl_vars['block']['0'],'params' => $this->_tpl_vars['block']['1'],'class' => 'gbBlock'), $this);?>

    <?php endforeach; endif; unset($_from); ?>
  </div>
</td><td id="gsContent">

<noscript><p class="giError">
  <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning: This site requires javascript."), $this);?>

</p></noscript>

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
  <?php endif;  endforeach; endif; unset($_from); ?>
</div>

<div id="image" class="gcBackground1" onclick="ui_vis('image',0)">
  <div class="gbBlock gcBackground2">
    <p id="title" class="giTitle"></p>
  </div>
  <div id="image_view"></div>
</div>

<div class="gbBlock gcBackground2">
  <p class="giTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['theme']['item']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</p>
</div>

<div class="gbBlock">
<?php if (isset ( $this->_tpl_vars['theme']['param']['bgSerialNumber'] )): ?>
  <table id="tile" style="background-image:url(<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.DownloadItem",'arg2' => "itemId=".($this->_tpl_vars['theme']['param']['backgroundId']),'arg3' => "serialNumber=".($this->_tpl_vars['theme']['param']['bgSerialNumber'])), $this);?>
)" cellspacing="0">
  <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['theme']['map']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
   <tr>
   <?php unset($this->_sections['col']);
$this->_sections['col']['name'] = 'col';
$this->_sections['col']['loop'] = is_array($_loop=$this->_tpl_vars['theme']['map'][$this->_sections['row']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['col']['show'] = true;
$this->_sections['col']['max'] = $this->_sections['col']['loop'];
$this->_sections['col']['step'] = 1;
$this->_sections['col']['start'] = $this->_sections['col']['step'] > 0 ? 0 : $this->_sections['col']['loop']-1;
if ($this->_sections['col']['show']) {
    $this->_sections['col']['total'] = $this->_sections['col']['loop'];
    if ($this->_sections['col']['total'] == 0)
        $this->_sections['col']['show'] = false;
} else
    $this->_sections['col']['total'] = 0;
if ($this->_sections['col']['show']):

            for ($this->_sections['col']['index'] = $this->_sections['col']['start'], $this->_sections['col']['iteration'] = 1;
                 $this->_sections['col']['iteration'] <= $this->_sections['col']['total'];
                 $this->_sections['col']['index'] += $this->_sections['col']['step'], $this->_sections['col']['iteration']++):
$this->_sections['col']['rownum'] = $this->_sections['col']['iteration'];
$this->_sections['col']['index_prev'] = $this->_sections['col']['index'] - $this->_sections['col']['step'];
$this->_sections['col']['index_next'] = $this->_sections['col']['index'] + $this->_sections['col']['step'];
$this->_sections['col']['first']      = ($this->_sections['col']['iteration'] == 1);
$this->_sections['col']['last']       = ($this->_sections['col']['iteration'] == $this->_sections['col']['total']);
?>
    <td>
    <?php $this->assign('id', $this->_tpl_vars['theme']['map'][$this->_sections['row']['index']][$this->_sections['col']['index']]); ?>
    <?php if ($this->_tpl_vars['id'] > 0): ?>
      <?php $this->assign('it', $this->_tpl_vars['theme']['itemMap'][$this->_tpl_vars['id']]); ?>
      <a href="#" onclick="image_show(<?php echo $this->_tpl_vars['it']['imageIndex']; ?>
);return false">
	<?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['it'],'image' => $this->_tpl_vars['it']['thumbnail'],'class' => 'thumb'), $this);?>

      </a>
    <?php else: ?>
      <div class="emptyTile"></div>
    <?php endif; ?>
    </td>
   <?php endfor; endif; ?>
  </tr>
  <?php endfor; endif; ?>
  </table>
  <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.GuestPreview",'class' => 'gbBlock'), $this);?>

<?php else: ?>
  <?php ob_start(); ?><a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ItemAdmin",'arg2' => "subView=core.ItemEdit",'arg3' => "editPlugin=ItemEditTheme",'arg4' => "itemId=".($this->_tpl_vars['theme']['item']['id']),'arg5' => "return=true"), $this);?>
"><?php $this->_smarty_vars['capture']['link'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The theme has not been %sconfigured%s.",'arg1' => $this->_smarty_vars['capture']['link'],'arg2' => "</a>"), $this);?>

<?php endif; ?>
</div>
</td></tr></table>

<script type="text/javascript">app_init();</script>