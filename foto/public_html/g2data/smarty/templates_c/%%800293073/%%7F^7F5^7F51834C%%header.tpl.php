<?php /* Smarty version 2.6.10, created on 2006-09-19 03:47:44
         compiled from gallery:themes/tile/templates/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'gallery:themes/tile/templates/header.tpl', 15, false),)), $this); ?>
<script type="text/javascript">
<?php if ($this->_tpl_vars['theme']['imageCount'] == 1): ?>
var image_width = new Array(1); image_width[0] = <?php echo $this->_tpl_vars['theme']['imageWidths']; ?>
;
var image_height = new Array(1); image_height[0] = <?php echo $this->_tpl_vars['theme']['imageHeights']; ?>
;
<?php else: ?>
var image_width = new Array(<?php echo $this->_tpl_vars['theme']['imageWidths']; ?>
);
var image_height = new Array(<?php echo $this->_tpl_vars['theme']['imageHeights']; ?>
);
<?php endif; ?>
var view = <?php echo ((is_array($_tmp=@$this->_tpl_vars['theme']['viewIndex'])) ? $this->_run_mod_handler('default', true, $_tmp, -1) : smarty_modifier_default($_tmp, -1)); ?>
;
</script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/tile.js"></script>
<style type="text/css">
div.emptyTile {
  width: <?php echo $this->_tpl_vars['theme']['param']['cellWidth']; ?>
px;
  height: <?php echo $this->_tpl_vars['theme']['param']['cellHeight']; ?>
px
}
</style>