<?php /* Smarty version 2.6.10, created on 2006-11-01 16:54:32
         compiled from gallery:modules/icons/templates/IconsSiteAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gallery:modules/icons/templates/IconsSiteAdmin.tpl', 27, false),)), $this); ?>
<div class="gbBlock gcBackground1">
  <h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Icon Settings'), $this);?>
 </h2>
</div>

<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
  <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Settings saved successfully'), $this);?>

</h2></div>
<?php endif; ?>

<div class="gbBlock">
<?php if (empty ( $this->_tpl_vars['IconsSiteAdmin']['iconpacks'] )): ?>
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "No icon packs are available."), $this);?>

  </p>
<?php else: ?>
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Select an icon pack to use for this Gallery."), $this);?>

  </p><p>
    <select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[iconpack]"), $this);?>
">
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['IconsSiteAdmin']['iconpacks'],'selected' => $this->_tpl_vars['form']['iconpack']), $this);?>

    </select>
  </p>
</div>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][reset]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
<?php endif; ?>
</div>