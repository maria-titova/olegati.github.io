<?php /* Smarty version 2.6.10, created on 2006-09-19 02:57:13
         compiled from gallery:modules/rewrite/templates/SetupRewrite.tpl */ ?>
<div class="gbBlock gcBackground1">
  <h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'URL Rewrite Setup'), $this);?>
 </h2>
</div>

<?php if (! empty ( $this->_tpl_vars['status'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
  <?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Successfully saved settings'), $this);?>

  <?php endif; ?>
</h2></div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['form']['error'] )): ?>
<div class="gbBlock">
   <h2 class="giError"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'An error occured while trying to save your settings'), $this);?>
 </h3>

  <?php if (isset ( $this->_tpl_vars['SetupRewrite']['errors'] )): ?>
  <div class="giError">
    <?php $_from = $this->_tpl_vars['SetupRewrite']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['errstr']):
?>
      <?php echo $this->_tpl_vars['errstr']; ?>
<br/>
    <?php endforeach; endif; unset($_from); ?>
  </div>
  <?php endif; ?>
</div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['SetupRewrite']['bootstrap'] )):  if ($this->_tpl_vars['SetupRewrite']['server'] != 'IIS'): ?>
<div class="gbBlock">
  <h2> <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=rewrite.SetupRewrite",'arg2' => "form[parser]=modrewrite",'arg3' => "form[action][save]=1"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Apache mod_rewrite'), $this);?>
</a> </h2>

  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The Apache mod_rewrite module is installed on most Apache servers by default. If you are unsure of what method you should choose then select this. Gallery will try to detect if your server supports mod_rewrite."), $this);?>

  </p>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['SetupRewrite']['server'] != 'APACHE'): ?>
<div class="gbBlock">
  <h2> <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=rewrite.SetupRewrite",'arg2' => "form[parser]=isapirewrite",'arg3' => "form[action][save]=1"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'IIS ISAPI_Rewrite'), $this);?>
</a> </h2>

  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "This method allows for short URLs on IIS servers with ISAPI Rewrite installed. Gallery will try to detect if your server supports this method before activating the module."), $this);?>
<br/>
    <ul>
      <li class="giDescription giWarning"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "A pattern may not begin with a keyword."), $this);?>
</li>
    </ul>
  </p>
</div>
<?php endif; ?>

<div class="gbBlock">
  <h2> <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=rewrite.SetupRewrite",'arg2' => "form[parser]=pathinfo",'arg3' => "form[action][save]=1"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'PHP Path Info'), $this);?>
</a> </h2>

  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Using Path Info is supported by most systems. With this method Gallery parses the URL itself during the request."), $this);?>

    <ul>
      <li class="giDescription giWarning"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "It is recomended that you don't activate the 'Download Item' URL since it will slow down Gallery."), $this);?>
</li>
      <li class="giDescription giWarning"><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Block hotlinking is not supported."), $this);?>
</li>
    </ul>
  </p>
</div>

<?php else:  if (isset ( $this->_tpl_vars['AdminParser']['template'] )): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['AdminParser']['template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php if (isset ( $this->_tpl_vars['AdminParser']['action'] )): ?>
      <div class="gbBlock gcBackground1">
        <input type="submit" class="inputTypeSubmit"
         name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][adminParser]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <?php if (isset ( $this->_tpl_vars['TestResults']['template'] )): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['TestResults']['template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div class="gbBlock gcBackground1">
    <input type="submit" class="inputTypeSubmit"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][back]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Back'), $this);?>
"/>

    <?php if (isset ( $this->_tpl_vars['TestResults']['action'] )): ?>
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][testParser]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
    <?php endif; ?>
    <?php if (! $this->_tpl_vars['SetupRewrite']['needsConfiguration']): ?>
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][done]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Done'), $this);?>
"/>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['TestResults']['refresh'] )): ?>
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][refresh]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Test again'), $this);?>
"/>
    <?php endif; ?>
    </div>
  <?php endif;  endif; ?>