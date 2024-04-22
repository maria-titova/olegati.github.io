<?php /* Smarty version 2.6.10, created on 2006-09-19 03:21:09
         compiled from gallery:themes/hybrid/templates/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'gallery:themes/hybrid/templates/header.tpl', 17, false),array('modifier', 'replace', 'gallery:themes/hybrid/templates/header.tpl', 23, false),)), $this); ?>
<script type="text/javascript">
// <![CDATA[
<?php if ($this->_tpl_vars['theme']['imageCount'] == 1): ?>
var data_iw = new Array(1); data_iw[0] = <?php echo $this->_tpl_vars['theme']['imageWidths']; ?>
;
var data_ih = new Array(1); data_ih[0] = <?php echo $this->_tpl_vars['theme']['imageHeights']; ?>
;
<?php else: ?>
var data_iw = new Array(<?php echo $this->_tpl_vars['theme']['imageWidths']; ?>
);
var data_ih = new Array(<?php echo $this->_tpl_vars['theme']['imageHeights']; ?>
);
<?php endif; ?>
var data_count = data_iw.length, data_name = '<?php echo $this->_tpl_vars['theme']['item']['id']; ?>
',
    data_view = <?php echo ((is_array($_tmp=@$this->_tpl_vars['theme']['viewIndex'])) ? $this->_run_mod_handler('default', true, $_tmp, -1) : smarty_modifier_default($_tmp, -1)); ?>
, cookie_path = '<?php echo $this->_tpl_vars['theme']['cookiePath']; ?>
',
    album_showtext = '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Show Details','forJavascript' => true), $this);?>
',
    album_hidetext = '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Hide Details','forJavascript' => true), $this);?>
',
    album_showlinks = '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Show Item Links','forJavascript' => true), $this);?>
',
    album_hidelinks = '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Hide Item Links','forJavascript' => true), $this);?>
',
    item_details = '<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Item Details','forJavascript' => true), $this);?>
',
    keyboard_help = "<?php ob_start();  echo $this->_reg_objects['g'][0]->text(array('text' => "Album view:\\n| space = start slideshow\\n| ctrl-right/left = show/hide sidebar\\n| ctrl-up/down = show/hide item links\\nImage view:\\n| space = start/pause slideshow\\n| escape = return to album view\\n| left/right = next/prev image\\n| up/down = show hide description text\\n| page up/down = scroll description text\\n| ctrl-up/down = select full/fit size\\nArrow keys scroll image in full size; use shift-arrows for funcs above\\nItem Details showing:\\n| escape = close popup"), $this); $this->_smarty_vars['capture']['helptext'] = ob_get_contents(); ob_end_clean();  echo ((is_array($_tmp=$this->_smarty_vars['capture']['helptext'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\"", "\\\"") : smarty_modifier_replace($_tmp, "\"", "\\\"")); ?>
";
// ]]>
</script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/hybrid.js"></script>
<style type="text/css">
#gsAlbumContent td.t { width: <?php echo $this->_tpl_vars['theme']['columnWidthPct']; ?>
%; }
</style>