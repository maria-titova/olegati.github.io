<?php /* Smarty version 2.6.10, created on 2006-09-19 02:35:33
         compiled from gallery:modules/core/templates/UserChangePassword.tpl */ ?>
<div class="gbBlock gcBackground1">
  <h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Change Password'), $this);?>
 </h2>
</div>

<?php if (isset ( $this->_tpl_vars['status']['changedPassword'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
  <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Password changed successfully'), $this);?>

</h2></div>
<?php endif; ?>

<div class="gbBlock">
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "You must enter your current password to prove that it's you, then enter your new password twice to make sure that you didn't make a mistake."), $this);?>

  </p>

  <div>
    <h4>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Current Password'), $this);?>

      <span class="giSubtitle">
	<?php echo $this->_reg_objects['g'][0]->text(array('text' => "(required)"), $this);?>

      </span>
    </h4>

    <input type="password" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[currentPassword]"), $this);?>
"/>

    <?php if (isset ( $this->_tpl_vars['form']['error']['currentPassword']['missing'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter your current password'), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['currentPassword']['incorrect'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Incorrect password'), $this);?>

    </div>
    <?php endif; ?>
  </div>

  <div>
    <h4>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'New Password'), $this);?>

      <span class="giSubtitle">
	<?php echo $this->_reg_objects['g'][0]->text(array('text' => "(required)"), $this);?>

      </span>
    </h4>

    <input type="password" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[password1]"), $this);?>
"/>

    <?php if (isset ( $this->_tpl_vars['form']['error']['password1']['missing'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a new password'), $this);?>

    </div>
    <?php endif; ?>
  </div>

  <div>
    <h4>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Verify New Password'), $this);?>

      <span class="giSubtitle">
	<?php echo $this->_reg_objects['g'][0]->text(array('text' => "(required)"), $this);?>

      </span>
    </h4>

    <input type="password" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[password2]"), $this);?>
"/>

    <?php if (isset ( $this->_tpl_vars['form']['error']['password2']['missing'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "You must enter your new password again!"), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['password2']['mismatch'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The passwords you entered did not match'), $this);?>

    </div>
    <?php endif; ?>
  </div>
</div>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Change'), $this);?>
"/>
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][cancel]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Cancel'), $this);?>
"/>
</div>