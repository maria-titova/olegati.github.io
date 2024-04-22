<?php /* Smarty version 2.6.10, created on 2006-09-25 00:58:14
         compiled from gallery:modules/core/templates/ItemDeleteSingle.tpl */ ?>
<div class="gbBlock gcBackground1">
  <h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Delete %s",'arg1' => $this->_tpl_vars['ItemDeleteSingle']['itemTypeNames']['0']), $this);?>
 </h2>
</div>

<div class="gbBlock">
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Are you sure you want to delete this %s?",'arg1' => $this->_tpl_vars['ItemDeleteSingle']['itemTypeNames']['1']), $this);?>

    <?php if ($this->_tpl_vars['ItemDeleteSingle']['childCount'] > 0): ?>
      <?php echo $this->_reg_objects['g'][0]->text(array('one' => "It contains %d item.",'many' => "It contains %d items.",'count' => $this->_tpl_vars['ItemDeleteSingle']['childCount'],'arg1' => $this->_tpl_vars['ItemDeleteSingle']['childCount']), $this);?>

    <?php endif; ?>

    <strong>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "There is no undo!"), $this);?>

    </strong>
  </p>
</div>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][delete]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Delete'), $this);?>
"/>
</div>