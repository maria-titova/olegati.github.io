<?php /* Smarty version 2.6.10, created on 2006-09-19 03:47:49
         compiled from gallery:themes/tile/templates/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'gallery:themes/tile/templates/edit.tpl', 59, false),array('modifier', 'default', 'gallery:themes/tile/templates/edit.tpl', 63, false),)), $this); ?>
<p class="giDescription" style="margin-top: 1em">
  <?php echo $this->_reg_objects['g'][0]->text(array('text' => "A tile display consists of a background image shown as a grid of tiles with thumbnails for other images placed in any tile position over the background.  Set the size and number of tiles, select the background image and assign thumbnail positions below.  Row 1, Column 1 is the upper left corner."), $this);?>

</p>

<table class="gbDataTable"><tr>
  <td>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Rows'), $this);?>

  </td><td>
    <input type="text" size="4"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[rows]"), $this);?>
" value="<?php echo $this->_tpl_vars['theme']['param']['rows']; ?>
"/>
  </td>
</tr><tr>
  <td>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Columns'), $this);?>

  </td><td>
    <input type="text" size="4"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[cols]"), $this);?>
" value="<?php echo $this->_tpl_vars['theme']['param']['cols']; ?>
"/>
  </td>
</tr><tr>
  <td>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Cell Width'), $this);?>

  </td><td>
    <input type="text" size="4"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[cellWidth]"), $this);?>
" value="<?php echo $this->_tpl_vars['theme']['param']['cellWidth']; ?>
"/>
  </td>
</tr><tr>
  <td>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Cell Height'), $this);?>

  </td><td>
    <input type="text" size="4"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[cellHeight]"), $this);?>
" value="<?php echo $this->_tpl_vars['theme']['param']['cellHeight']; ?>
"/>
  </td>
</tr></table>

<table class="gbDataTable" style="margin-top: 1em"><tr>
  <th colspan="2" style="text-align:right"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Background'), $this);?>
 </th>
  <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Title'), $this);?>
 </th>
  <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Row'), $this);?>
 </th>
  <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Column'), $this);?>
 </th>
</tr>
<?php $_from = $this->_tpl_vars['theme']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['it']):
 if (isset ( $this->_tpl_vars['it']['image'] )): ?>
  <tr><td>
    <?php if (isset ( $this->_tpl_vars['it']['thumbnail'] )): ?>
      <?php echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['it'],'image' => $this->_tpl_vars['it']['thumbnail'],'maxSize' => 100,'class' => 'giThumbnail'), $this);?>

    <?php else: ?>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'no thumbnail'), $this);?>

    <?php endif; ?>
  </td><td>
    <input type="radio"<?php if ($this->_tpl_vars['theme']['param']['backgroundId'] == $this->_tpl_vars['it']['image']['id']): ?> checked="checked"<?php endif; ?>
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[backgroundId]"), $this);?>
" value="<?php echo $this->_tpl_vars['it']['image']['id']; ?>
"/>
  </td><td>
    <span class="giTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['it']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
</span>
  </td><td>
    <?php $this->assign('key', "row_".($this->_tpl_vars['it']['id'])); ?>
    <input type="text" size="3"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[row_".($this->_tpl_vars['it']['id'])."]"), $this);?>
" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['theme']['param'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/>
  </td><td>
    <?php $this->assign('key', "col_".($this->_tpl_vars['it']['id'])); ?>
    <input type="text" size="3"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[col_".($this->_tpl_vars['it']['id'])."]"), $this);?>
" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['theme']['param'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/>
  </td></tr>
  <?php endif;  endforeach; else: ?>
  <tr><td colspan="5"><h4 class="giWarning">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Add some photos!"), $this);?>

  </h4></td></tr>
<?php endif; unset($_from); ?>
</table>