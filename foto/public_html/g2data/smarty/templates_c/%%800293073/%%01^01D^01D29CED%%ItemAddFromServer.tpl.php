<?php /* Smarty version 2.6.10, created on 2007-10-08 16:17:15
         compiled from gallery:modules/core/templates/ItemAddFromServer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gallery:modules/core/templates/ItemAddFromServer.tpl', 123, false),array('modifier', 'replace', 'gallery:modules/core/templates/ItemAddFromServer.tpl', 123, false),array('function', 'cycle', 'gallery:modules/core/templates/ItemAddFromServer.tpl', 182, false),)), $this); ?>
<script type="text/javascript">
  // <![CDATA[
<?php if (! empty ( $this->_tpl_vars['form']['localServerFiles'] )): ?>
  var symState = false;
    <?php echo 'var knownTypeCheckboxIds = new Array(';  $this->assign('first', '1');  echo '';  $_from = $this->_tpl_vars['form']['localServerFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fileIndex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fileIndex']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['file']):
        $this->_foreach['fileIndex']['iteration']++;
 echo '';  if (( ( $this->_tpl_vars['file']['type'] == 'file' || ( $this->_tpl_vars['file']['type'] == 'directory' && $this->_tpl_vars['file']['fileName'] != '..' && $this->_tpl_vars['file']['fileName'] != 'CVS' ) ) && empty ( $this->_tpl_vars['file']['unknown'] ) )):  echo '';  if (! $this->_tpl_vars['first']):  echo ',';  else:  echo '';  $this->assign('first', '0');  echo '';  endif;  echo '"';  echo $this->_foreach['fileIndex']['iteration'];  echo '"';  endif;  echo '';  endforeach; endif; unset($_from);  echo ');'; ?>


  <?php echo '
  function toggleSelections() {
    for (i = 0; i < knownTypeCheckboxIds.length; i++) {
      var cb = document.getElementById(\'cb_\' + knownTypeCheckboxIds[i]);
      cb.checked = !cb.checked;
  '; ?>

      <?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>toggleSymlinkEnabled(knownTypeCheckboxIds[i]);<?php endif; ?>
  <?php echo '
    }
  }

  function toggleSymlinkEnabled(a) {
    var cbSymlink = document.getElementById(\'symlink_\' + a );
    var cbSelected = document.getElementById(\'cb_\' + a );
    if (cbSymlink) {
      cbSymlink.disabled = !cbSelected.checked;
    }
  }

  function invertSymlinkSelection() {
    symState = !symState;
    for (i = 0; i < knownTypeCheckboxIds.length; i++) {
      var cb = document.getElementById(\'cb_\' + knownTypeCheckboxIds[i]);
      var cbSymlink = document.getElementById(\'symlink_\' + knownTypeCheckboxIds[i]);
      if (cb.checked == true) {
	if (symState == false) {
	  cbSymlink.checked = false;
	} else {
	  cbSymlink.checked = true;
	}
      }
    }
  }
  '; ?>

<?php endif; ?>

  function selectPath(path) {
  document.getElementById('itemAdminForm').elements['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[localServerPath]"), $this);?>
'].value = path;
  }
  // ]]>
</script>

<div class="gbBlock">
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Transfer files that are already on your server into your Gallery.  The files must already have been uploaded to your server some other way (like FTP) and must be placed in a directory where they are accessibly by any element on the server.  If you're on Unix this means that the files and the directory the files are in should have modes of at least 755."), $this);?>

  </p>

  <?php if (empty ( $this->_tpl_vars['ItemAddFromServer']['localServerDirList'] )): ?>
  <div class="giWarning">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "For security purposes, you can't use this feature until the Gallery Site Administrator configures a set of legal upload directories."), $this);?>

    <?php if ($this->_tpl_vars['ItemAdd']['isAdmin']): ?>
      <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=core.AdminCore"), $this);?>
">
	<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'site admin'), $this);?>

      </a>
    <?php endif; ?>
  </div>
  <?php else: ?>

  <?php if (empty ( $this->_tpl_vars['form']['localServerFiles'] )): ?>
    <h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Server Path'), $this);?>
 </h4>

    <input type="text" size="80"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[localServerPath]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['localServerPath']; ?>
"/>

    <?php if (isset ( $this->_tpl_vars['form']['error']['pathComponent']['missing'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "You must enter a directory."), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['pathComponent']['invalid'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The directory you entered is invalid.  Make sure that the directory is readable by all users."), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['pathComponent']['illegal'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The directory you entered is illegal.  It must be a sub directory of one of the directories listed below."), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['pathComponent']['collision'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "An item with the same name already exists."), $this);?>

    </div>
    <?php endif; ?>

    <br/>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Legal Directories'), $this);?>


    <?php if ($this->_tpl_vars['ItemAdd']['isAdmin']): ?>
    <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=core.AdminCore",'arg3' => "return=true"), $this);?>
">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'modify'), $this);?>

    </a>
    <?php endif; ?>

    <ul style="list-style-type: none; margin-bottom: 1em">
      <?php $_from = $this->_tpl_vars['ItemAddFromServer']['localServerDirList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dir']):
?>
	<?php ob_start();  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, "\\", "\\\\") : smarty_modifier_replace($_tmp, "\\", "\\\\"));  $this->_smarty_vars['capture']['escapedDir'] = ob_get_contents(); ob_end_clean(); ?>
	<li>
	  <a href="javascript:selectPath('<?php echo $this->_smarty_vars['capture']['escapedDir']; ?>
')"> <?php echo ((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </a>
	</li>
      <?php endforeach; endif; unset($_from); ?>
    </ul>

    <?php if (! empty ( $this->_tpl_vars['ItemAddFromServer']['recentPaths'] )): ?>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Recent Directories'), $this);?>


      <ul style="list-style-type: none">
	<?php $_from = $this->_tpl_vars['ItemAddFromServer']['recentPaths']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dir']):
?>
	  <?php ob_start();  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, "\\", "\\\\") : smarty_modifier_replace($_tmp, "\\", "\\\\"));  $this->_smarty_vars['capture']['escapedDir'] = ob_get_contents(); ob_end_clean(); ?>
	  <li>
	  <a href="javascript:selectPath('<?php echo $this->_smarty_vars['capture']['escapedDir']; ?>
')"> <?php echo ((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </a>
	  </li>
	<?php endforeach; endif; unset($_from); ?>
      </ul>
    <?php endif; ?>

    <?php ob_start(); ?>
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][findFilesFromLocalServer]"), $this);?>
"
       value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Find Files'), $this);?>
"/>
    <?php $this->_smarty_vars['capture']['submitLinks'] = ob_get_contents(); ob_end_clean(); ?>
  <?php else: ?> 
    <?php ob_start();  echo '';  $_from = $this->_tpl_vars['ItemAddFromServer']['pathElements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pathElements'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pathElements']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['element']):
        $this->_foreach['pathElements']['iteration']++;
 echo '';  if ($this->_tpl_vars['idx'] > 1):  echo '';  echo $this->_tpl_vars['ItemAddFromServer']['pathSeparator'];  echo '';  endif;  echo '';  if (( $this->_tpl_vars['element']['legal'] && ! ($this->_foreach['pathElements']['iteration'] == $this->_foreach['pathElements']['total']) )):  echo '<a href="';  echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=core.ItemAdd",'arg2' => "addPlugin=ItemAddFromServer",'arg3' => "form[localServerPath]=".($this->_tpl_vars['element']['path']),'arg4' => "itemId=".($this->_tpl_vars['ItemAdmin']['item']['id']),'arg5' => "form[action][findFilesFromLocalServer]=1",'arg6' => "form[formName]=ItemAddFromServer"), $this); echo '">';  echo ((is_array($_tmp=$this->_tpl_vars['element']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo '</a>';  else:  echo '';  echo ((is_array($_tmp=$this->_tpl_vars['element']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo '';  endif;  echo '';  endforeach; endif; unset($_from);  echo '';  $this->_smarty_vars['capture']['path'] = ob_get_contents(); ob_end_clean(); ?>
    <strong>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Directory: %s",'arg1' => $this->_smarty_vars['capture']['path']), $this);?>

    </strong>

    <input type="hidden"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[localServerPath]"), $this);?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['form']['localServerPath'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
    <br/>

    <table class="gbDataTable"><tr>
      <th> </th>
      <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'File name'), $this);?>
 </th>
      <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Type'), $this);?>
 </th>
      <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Size'), $this);?>
 </th>
      <?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>
	<th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Use Symlink'), $this);?>
 </th>
      <?php endif; ?>
    </tr>
    <?php $_from = $this->_tpl_vars['form']['localServerFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fileIndex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fileIndex']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['file']):
        $this->_foreach['fileIndex']['iteration']++;
?>
      <?php $this->assign('key', ((is_array($_tmp=$this->_tpl_vars['file']['fileKey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
      <tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
      <?php if (( $this->_tpl_vars['file']['type'] == 'file' )): ?>
	<td style="text-align: center">
	  <input type="checkbox" id="cb_<?php echo $this->_foreach['fileIndex']['iteration']; ?>
"
	   <?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>
	     onclick="toggleSymlinkEnabled('<?php echo $this->_foreach['fileIndex']['iteration']; ?>
')"
	   <?php endif; ?>
	   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[localServerFiles][".($this->_tpl_vars['key'])."][selected]"), $this);?>
"/>
	</td><td>
	  <label for="cb_<?php echo $this->_foreach['fileIndex']['iteration']; ?>
">
	    <?php echo ((is_array($_tmp=$this->_tpl_vars['file']['fileName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	  </label>
	</td><td>
	  <?php echo $this->_tpl_vars['file']['itemType']; ?>

	</td><td>
	  <?php echo $this->_reg_objects['g'][0]->text(array('one' => "%d byte",'many' => "%d bytes",'count' => $this->_tpl_vars['file']['stat']['size'],'arg1' => $this->_tpl_vars['file']['stat']['size']), $this);?>

	</td>
	<?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>
	  <td align="center">
	    <input type="checkbox" disabled="true"
	     id="symlink_<?php echo $this->_foreach['fileIndex']['iteration']; ?>
"
	     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[localServerFiles][".($this->_tpl_vars['key'])."][useSymlink]"), $this);?>
"/>
	  </td>
	<?php endif; ?>
      <?php else: ?>
	<td>
	  <input type="checkbox" id="cb_<?php echo $this->_foreach['fileIndex']['iteration']; ?>
"
	   <?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>
	     onclick="toggleSymlinkEnabled('<?php echo $this->_foreach['fileIndex']['iteration']; ?>
')"
	   <?php endif; ?>
	   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[localServerDirectories][".($this->_tpl_vars['key'])."][selected]"), $this);?>
"/>
	</td><td>
	  <?php if ($this->_tpl_vars['file']['legal']):  echo '<a href="';  echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=core.ItemAdd",'arg2' => "addPlugin=ItemAddFromServer",'arg3' => "form[localServerPath]=".($this->_tpl_vars['file']['filePath']),'arg4' => "itemId=".($this->_tpl_vars['ItemAdmin']['item']['id']),'arg5' => "form[action][findFilesFromLocalServer]=1",'arg6' => "form[formName]=ItemAddFromServer"), $this); echo '">';  if ($this->_tpl_vars['file']['fileName'] == ".."):  echo '&laquo; ';  echo $this->_reg_objects['g'][0]->text(array('text' => 'Parent Directory'), $this); echo ' &raquo;';  else:  echo '';  echo ((is_array($_tmp=$this->_tpl_vars['file']['fileName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo '';  endif;  echo '</a>';  else: ?>
	    <i><?php echo ((is_array($_tmp=$this->_tpl_vars['file']['fileName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</i>
	  <?php endif; ?>
	</td><td>
	  <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Directory'), $this);?>

	</td><td>
	  &nbsp;
	</td>
	<?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>
	<td style="text-align: center">
	  <input type="checkbox" disabled="true"
	   id="symlink_<?php echo $this->_foreach['fileIndex']['iteration']; ?>
"
	   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[localServerDirectories][".($this->_tpl_vars['key'])."][useSymlink]"), $this);?>
"/>
	</td>
	<?php endif; ?>
      <?php endif; ?>
      </tr>
    <?php endforeach; endif; unset($_from); ?>
    <tr>
      <th>
	<input type="checkbox" id="cbSelectionToggle" onclick="toggleSelections()"/>
      </th>
      <th colspan="<?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>2<?php else: ?>3<?php endif; ?>">
	<label for="cbSelectionToggle">
	  <?php echo $this->_reg_objects['g'][0]->text(array('text' => "(Un)check all known types"), $this);?>

	</label>
      </th>
      <?php if ($this->_tpl_vars['ItemAddFromServer']['showSymlink']): ?>
      <th>
	<label for="cbSymlinkToggle">
	  <?php echo $this->_reg_objects['g'][0]->text(array('text' => "(Un)check symlinks"), $this);?>
<br/><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'for selected items'), $this);?>

	</label>
      </th>
      <th style="text-align: center">
	<input type="checkbox" id="cbSymlinkToggle" onclick="invertSymlinkSelection()"/>
      </th>
      <?php endif; ?>
    </tr></table>
  </div>

  <div class="gbBlock">
    <p class="giDescription">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Copy base filenames to:"), $this);?>

      <br/>
      <input type="checkbox" id="cbTitle"<?php if ($this->_tpl_vars['form']['set']['title']): ?> checked="checked"<?php endif; ?>
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[set][title]"), $this);?>
"/>
      <label for="cbTitle"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Title'), $this);?>
 </label>
      &nbsp;

      <input type="checkbox" id="cbSummary"<?php if ($this->_tpl_vars['form']['set']['summary']): ?> checked="checked"<?php endif; ?>
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[set][summary]"), $this);?>
"/>
      <label for="cbSummary"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Summary'), $this);?>
 </label>
      &nbsp;

      <input type="checkbox" id="cbDescription"<?php if ($this->_tpl_vars['form']['set']['description']): ?> checked="checked"<?php endif; ?>
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[set][description]"), $this);?>
"/>
      <label for="cbDescription"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Description'), $this);?>
 </label>
    </p>

    <?php ob_start(); ?>
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][addFromLocalServer]"), $this);?>
"
       value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add Files'), $this);?>
"/>
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][startOver]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Start Over'), $this);?>
"/>
    <?php $this->_smarty_vars['capture']['submitLinks'] = ob_get_contents(); ob_end_clean(); ?>
    <?php $this->assign('showOptions', 'true'); ?>
  <?php endif; ?>   <?php endif; ?> </div>

<?php if (isset ( $this->_tpl_vars['showOptions'] )): ?>
    <?php $_from = $this->_tpl_vars['ItemAdd']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['option']['file']), 'smarty_include_vars' => array('l10Domain' => $this->_tpl_vars['option']['l10Domain'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endforeach; endif; unset($_from);  endif; ?>

<?php if (! empty ( $this->_smarty_vars['capture']['submitLinks'] )): ?>
<div class="gbBlock gcBackground1">
  <?php echo $this->_smarty_vars['capture']['submitLinks']; ?>

</div>
<?php endif; ?>