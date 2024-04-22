<?php /* Smarty version 2.6.10, created on 2006-09-19 03:01:12
         compiled from gallery:modules/rewrite/templates/AdminRewrite.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/rewrite/templates/AdminRewrite.tpl', 110, false),array('function', 'counter', 'gallery:modules/rewrite/templates/AdminRewrite.tpl', 210, false),)), $this); ?>
<div class="gbBlock gcBackground1">
  <h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'URL Rewrite Administration'), $this);?>
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
 </h2>

  <div class="giError">
  <?php if (isset ( $this->_tpl_vars['AdminRewrite']['errors'] )): ?>
    <?php $_from = $this->_tpl_vars['AdminRewrite']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['errstr']):
?>
      <?php echo $this->_tpl_vars['errstr']; ?>
<br/>
    <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>

  <?php if (isset ( $this->_tpl_vars['form']['error']['dupe'] )): ?>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Duplicate URL patterns."), $this);?>

  <?php endif; ?>

  <?php if (isset ( $this->_tpl_vars['form']['error']['empty'] )): ?>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Empty URL pattern."), $this);?>

  <?php endif; ?>
  </div>
</div>
<?php endif; ?>

<div class="gbTabBar">
  <?php if (( $this->_tpl_vars['AdminRewrite']['mode'] == 'rules' )): ?>
    <span class="giSelected o"><span>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Rules'), $this);?>

    </span></span>
  <?php else: ?>
    <span class="o"><span>
      <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=rewrite.AdminRewrite",'arg3' => "mode=rules"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Rules'), $this);?>
</a>
    </span></span>
  <?php endif; ?>

  <?php if (( $this->_tpl_vars['AdminRewrite']['mode'] == 'setup' )): ?>
    <span class="giSelected o"><span>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Setup'), $this);?>

    </span></span>
  <?php else: ?>
    <span class="o"><span>
      <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=rewrite.AdminRewrite",'arg3' => "mode=setup"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Setup'), $this);?>
</a>
    </span></span>
  <?php endif; ?>

  <?php if (( $this->_tpl_vars['AdminRewrite']['mode'] == 'test' )): ?>
    <span class="giSelected o"><span>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Test'), $this);?>

    </span></span>
  <?php else: ?>
    <span class="o"><span>
      <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=rewrite.AdminRewrite",'arg3' => "mode=test"), $this);?>
"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Test'), $this);?>
</a>
    </span></span>
  <?php endif; ?>
</div>

<?php if ($this->_tpl_vars['AdminRewrite']['mode'] == 'rules'): ?>
<div class="gbBlock">
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Short URLs are compiled out of predefined keywords. Modules may provide additional keywords. Keywords are escaped with % (eg: %itemId%)."), $this);?>

  </p>

  <?php if ($this->_tpl_vars['AdminRewrite']['parserId'] == 'pathinfo'): ?>
  <p class="giDescription giWarning">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "It is recomended that you don't activate the 'Download Item' URL since it will slow down Gallery."), $this);?>

  </p>
  <?php elseif ($this->_tpl_vars['AdminRewrite']['parserId'] == 'isapirewrite'): ?>
  <p class="giDescription giWarning">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "A pattern may not begin with a keyword."), $this);?>

  </p>
  <?php endif; ?>

  <table class="gbDataTable">
  <?php $this->assign('group', ""); ?>
  <?php $_from = $this->_tpl_vars['form']['rules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['moduleId'] => $this->_tpl_vars['rules']):
?>
  <?php if (! empty ( $this->_tpl_vars['group'] )): ?>
    <tr><td> &nbsp; </td></tr>
  <?php endif; ?>
  <?php $this->assign('group', $this->_tpl_vars['moduleId']); ?>
  <tr><th colspan="6"><h2><?php echo $this->_tpl_vars['AdminRewrite']['modules'][$this->_tpl_vars['moduleId']]; ?>
</h2></th></tr>
  <tr>
    <th colspan="2" style="text-align: center;"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Active'), $this);?>
 </th>
    <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Help'), $this);?>
 </th>
    <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'View'), $this);?>
 </th>
    <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'URL Pattern'), $this);?>
 </th>
    <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Additional Keywords'), $this);?>
 </th>
  </tr>

  <?php $_from = $this->_tpl_vars['rules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ruleId'] => $this->_tpl_vars['rule']):
?>
  <?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd",'assign' => 'rowClass'), $this);?>

  <tr class="<?php echo $this->_tpl_vars['rowClass']; ?>
">
    <td>
      <?php $this->assign('match', $this->_tpl_vars['AdminRewrite']['info'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']]['match']); ?>
      <?php if (isset ( $this->_tpl_vars['form']['error']['dupe'][$this->_tpl_vars['rule']['pattern']] ) || isset ( $this->_tpl_vars['form']['error']['empty'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']] ) || isset ( $this->_tpl_vars['form']['error']['1'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']] ) || isset ( $this->_tpl_vars['form']['error']['3'][$this->_tpl_vars['match']] ) || isset ( $this->_tpl_vars['form']['error']['4'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']] )): ?>
	<img src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/core/data/module-inactive.gif"), $this);?>
" width="13" height="13"
	       alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Error"), $this);?>
" />
      <?php elseif (isset ( $this->_tpl_vars['rule']['active'] )): ?>
	<img src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/core/data/module-active.gif"), $this);?>
" width="13" height="13"
	     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Active"), $this);?>
" />
      <?php else: ?>
	<img src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/core/data/module-install.gif"), $this);?>
" width="13" height="13"
	     alt="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Status: Not Active"), $this);?>
" />
      <?php endif; ?>
    </td>
    <td>
      <input type="checkbox" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[rules][".($this->_tpl_vars['moduleId'])."][".($this->_tpl_vars['ruleId'])."][active]"), $this);?>
" <?php if (isset ( $this->_tpl_vars['rule']['active'] )): ?>checked="checked"<?php endif; ?>/>
    </td>
    <td style="text-align: center;">
      <span id="rules-<?php echo $this->_tpl_vars['moduleId']; ?>
-<?php echo $this->_tpl_vars['ruleId']; ?>
-toggle"
	    class="giBlockToggle gcBackground1 gcBorder2"
	    style="border-width: 1px;"
	    onclick="BlockToggle('rules-<?php echo $this->_tpl_vars['moduleId']; ?>
-<?php echo $this->_tpl_vars['ruleId']; ?>
-help', 'rules-<?php echo $this->_tpl_vars['moduleId']; ?>
-<?php echo $this->_tpl_vars['ruleId']; ?>
-toggle', 'table-row')">+</span>
    </td>
    <td>
      <?php echo $this->_tpl_vars['AdminRewrite']['info'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']]['comment']; ?>

    </td>
    <td>
      <?php if (isset ( $this->_tpl_vars['AdminRewrite']['info'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']]['locked'] )): ?>
        <input type="hidden" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[rules][".($this->_tpl_vars['moduleId'])."][".($this->_tpl_vars['ruleId'])."][pattern]"), $this);?>
" value="<?php echo $this->_tpl_vars['rule']['pattern']; ?>
"/>
        <input type="text" size="40" name="dummy" value="<?php echo $this->_tpl_vars['rule']['pattern']; ?>
" disabled />
      <?php else: ?>
        <input type="text" size="40" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[rules][".($this->_tpl_vars['moduleId'])."][".($this->_tpl_vars['ruleId'])."][pattern]"), $this);?>
" value="<?php echo $this->_tpl_vars['rule']['pattern']; ?>
"/>
      <?php endif; ?>
    </td>
    <td>
      <?php $_from = $this->_tpl_vars['AdminRewrite']['info'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']]['keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword'] => $this->_tpl_vars['tmp']):
?>
	%<?php echo $this->_tpl_vars['keyword']; ?>
%
      <?php endforeach; endif; unset($_from); ?>
    </td>
  </tr>
  <tr class="<?php echo $this->_tpl_vars['rowClass']; ?>
" style="display: none;" id="rules-<?php echo $this->_tpl_vars['moduleId']; ?>
-<?php echo $this->_tpl_vars['ruleId']; ?>
-help">
    <td colspan="2">
      &nbsp;
    </td>
    <td colspan="4">
      <b><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Help'), $this);?>
</b><br/>
      <?php if (isset ( $this->_tpl_vars['AdminRewrite']['info'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']]['help'] )): ?>
	<?php echo $this->_tpl_vars['AdminRewrite']['info'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']]['help']; ?>

      <?php else: ?>
	<i><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No help available'), $this);?>
</i>
      <?php endif; ?><br/><br/>

      <b><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Keywords'), $this);?>
</b><br/>
      <?php $this->assign('hasKeywordHelp', false); ?>
      <?php $_from = $this->_tpl_vars['AdminRewrite']['info'][$this->_tpl_vars['moduleId']][$this->_tpl_vars['ruleId']]['keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword'] => $this->_tpl_vars['info']):
?>
	<?php if (isset ( $this->_tpl_vars['info']['help'] )): ?>
	  %<?php echo $this->_tpl_vars['keyword']; ?>
% : <?php echo $this->_tpl_vars['info']['help']; ?>
<br/>
	  <?php $this->assign('hasKeywordHelp', true); ?>
	<?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
      <?php if (! $this->_tpl_vars['hasKeywordHelp']): ?>
	<i><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'No keyword help available'), $this);?>
</i>
      <?php endif; ?>
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>   <?php endforeach; endif; unset($_from); ?>   </table>
</div>

<div class="gbBlock gcBackground1">
  <input type="submit"class="inputTypeSubmit" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][rules]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['AdminRewrite']['mode'] == 'setup'):  if ($this->_tpl_vars['AdminRewrite']['parserType'] == 'preGallery'): ?>
<div class="gbBlock">
  <h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Approved referers'), $this);?>
 </h3>

  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Some rules only apply if the referer (the site that linked to the item) is something other than Gallery itself. Hosts in the list below will be treated as friendly referers."), $this);?>
<br/>
  </p>

  <p class="giDesciption giWarning">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Warning: If you don't allow empty referer users won't be able to download nor play movies."), $this);?>

  </p>

  <p class="giDescription">
    <input type="checkbox" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[allowEmptyReferer]"), $this);?>
" <?php if (isset ( $this->_tpl_vars['form']['allowEmptyReferer'] )): ?>checked="checked"<?php endif; ?>/>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Allow empty referer?"), $this);?>

  </p>

  <table class="gbDataTable"><tr>
    <td><input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[dummy]"), $this);?>
" size="60" value="<?php echo $this->_tpl_vars['AdminRewrite']['serverName']; ?>
" disabled/></td>
  <?php echo smarty_function_counter(array('start' => 0,'assign' => 'i'), $this);?>

  <?php $_from = $this->_tpl_vars['form']['accessList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['host']):
?>
  </tr><tr>
    <td><input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[accessList][".($this->_tpl_vars['i'])."]"), $this);?>
" size="60" value="<?php echo $this->_tpl_vars['host']; ?>
"/></td>
    <?php echo smarty_function_counter(array('print' => false), $this);?>

  <?php endforeach; endif; unset($_from); ?>
  </tr><tr>
    <td><input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[accessList][".($this->_tpl_vars['i'])."]"), $this);?>
" size="60"/></td>
  </tr><tr>
    <td><input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[accessList][".($this->_tpl_vars['i']+1)."]"), $this);?>
" size="60"/></td>
  </tr><tr>
    <td><input type="text" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[accessList][".($this->_tpl_vars['i']+2)."]"), $this);?>
" size="60"/></td>
  </tr></table>
</div>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][accessList]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
</div>
<?php else: ?>
<div class="gbBlock">
  <h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Approved referers'), $this);?>
 </h3>

  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The parser you have selected does not support a referer check."), $this);?>
<br/>
  </p>
</div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['AdminParser']['template'] )): ?>
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
  <?php endif;  endif;  endif; ?>

<?php if ($this->_tpl_vars['AdminRewrite']['mode'] == 'test'): ?>
<div class="gbBlock">
  <h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Test the Rewrite Parser Configuration'), $this);?>
 </h3>
</div>
<?php if (isset ( $this->_tpl_vars['TestResults']['template'] )): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['TestResults']['template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php if (isset ( $this->_tpl_vars['TestResults']['action'] )): ?>
    <div class="gbBlock gcBackground1">
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][testParser]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
    </div>
  <?php endif; ?>
  <?php if (isset ( $this->_tpl_vars['TestResults']['refresh'] )): ?>
    <input type="submit" class="inputTypeSubmit"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][refresh]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Test again'), $this);?>
"/>
  <?php endif;  else: ?>
<div class="gbBlock">
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The selected URL Rewrite Parser does not provide any tests."), $this);?>
<br/>
  </p>
</div>
<?php endif;  endif; ?>