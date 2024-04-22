<?php /* Smarty version 2.6.10, created on 2007-10-08 16:17:38
         compiled from gallery:modules/core/templates/ItemAddFromWeb.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'gallery:modules/core/templates/ItemAddFromWeb.tpl', 83, false),array('modifier', 'replace', 'gallery:modules/core/templates/ItemAddFromWeb.tpl', 83, false),array('function', 'cycle', 'gallery:modules/core/templates/ItemAddFromWeb.tpl', 103, false),array('function', 'counter', 'gallery:modules/core/templates/ItemAddFromWeb.tpl', 105, false),)), $this); ?>
<script type="text/javascript">
  // <![CDATA[
<?php if (! empty ( $this->_tpl_vars['form']['webPageUrls'] )): ?>
  function toggleSelections() {
    form = document.getElementById('itemAdminForm');
    state = form.elements['selectionToggle'].checked;
    for (i = 1; i <= <?php echo $this->_tpl_vars['ItemAddFromWeb']['webPageUrlCount']; ?>
; i++) {
        cb = document.getElementById('cb_' + i);
        cb.checked = state;
    }
  }
<?php endif; ?>

  function selectUrl(url) {
    document.getElementById('itemAdminForm').elements['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[webPage]"), $this);?>
'].value = url;
  }
  // ]]>
</script>

<div class="gbBlock">
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Import files into Gallery from another website.  Enter a URL below to a web page anywhere on the net and Gallery will allow you to upload any media files that it finds on that page.  Note that if you're entering a URL to a directory, you should end the URL with a trailing slash (eg, http://example.com/directory/). "), $this);?>

  </p>

  <?php if (empty ( $this->_tpl_vars['form']['webPageUrls'] )): ?>
    <h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'URL'), $this);?>
 </h4>

    <input type="text" size="80"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[webPage]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['webPage']; ?>
"/>

    <?php if (isset ( $this->_tpl_vars['form']['error']['webPage']['missing'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'You must enter a URL to a web page'), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['webPage']['invalid'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The URL entered must begin with http://"), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['webPage']['unavailable'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'The web page you specified is unavailable'), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['webPage']['noUrlsFound'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Nothing to add found from this URL'), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['webPage']['nothingSelected'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Nothing added since no items were selected'), $this);?>

    </div>
    <?php endif; ?>

    <?php if (! empty ( $this->_tpl_vars['ItemAddFromWeb']['recentUrls'] )): ?>
      <h4> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Recent URLs'), $this);?>
 </h4>
      <p>
      <?php $_from = $this->_tpl_vars['ItemAddFromWeb']['recentUrls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['url']):
?>
	<a href="javascript:selectUrl('<?php echo $this->_tpl_vars['url']; ?>
')"> <?php echo $this->_tpl_vars['url']; ?>
 </a>
	<br/>
      <?php endforeach; endif; unset($_from); ?>
      </p>
    <?php endif; ?>

    <?php ob_start(); ?>
      <input type="submit" class="inputTypeSubmit"
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][findFilesFromWebPage]"), $this);?>
"
       value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Find Files'), $this);?>
"/>
    <?php $this->_smarty_vars['capture']['submitButtons'] = ob_get_contents(); ob_end_clean(); ?>
  <?php else: ?>     <strong>
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "URL: %s",'arg1' => $this->_tpl_vars['form']['webPage']), $this);?>

      &nbsp;
      <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ItemAdmin",'arg2' => "subView=core.ItemAdd",'arg3' => "itemId=".($this->_tpl_vars['ItemAdmin']['item']['id']),'arg4' => ((is_array($_tmp=((is_array($_tmp="form[webPage]=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['webPage']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['webPage'])))) ? $this->_run_mod_handler('replace', true, $_tmp, "&amp;", "&") : smarty_modifier_replace($_tmp, "&amp;", "&")),'arg5' => "form[formName]=ItemAddFromWeb",'arg6' => "addPlugin=ItemAddFromWeb"), $this);?>
">
	<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'change'), $this);?>

      </a>
    </strong>

    <input type="hidden" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[webPage]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['webPage']; ?>
"/>
    <br/>

    <?php echo $this->_reg_objects['g'][0]->text(array('one' => "%d url found",'many' => "%d urls found",'count' => $this->_tpl_vars['ItemAddFromWeb']['webPageUrlCount'],'arg1' => $this->_tpl_vars['ItemAddFromWeb']['webPageUrlCount']), $this);?>


    <table class="gbDataTable" style="margin-top: 0.5em"><tr>
      <th> </th>
      <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'URL'), $this);?>
 </th>
      <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Type'), $this);?>
 </th>
    </tr>
    <?php $_from = $this->_tpl_vars['form']['webPageUrls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['url']):
?>
    <tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
      <td>
	<?php echo smarty_function_counter(array('assign' => 'idCount'), $this);?>

	<input type="checkbox" id="cb_<?php echo $this->_tpl_vars['idCount']; ?>
"
	 name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[webPageUrls][".($this->_tpl_vars['url']['url'])."]"), $this);?>
"/>
      </td><td>
	<label for="cb_<?php echo $this->_tpl_vars['idCount']; ?>
">
	  <?php echo $this->_tpl_vars['url']['url']; ?>

	</label>
      </td><td>
	<?php echo $this->_tpl_vars['url']['itemType']; ?>

      </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <tr>
      <th>
	<input type="checkbox" id="checkAll" name="selectionToggle" onclick="toggleSelections()"/>
      </th>
      <th colspan="2">
	<label for="checkAll">
	  <?php echo $this->_reg_objects['g'][0]->text(array('text' => "(Un)check all"), $this);?>

	</label>
      </th>
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
       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][addFromWebPage]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add URLs'), $this);?>
"/>
    <?php $this->_smarty_vars['capture']['submitButtons'] = ob_get_contents(); ob_end_clean(); ?>
    <?php $this->assign('showOptions', 'true'); ?>
  <?php endif; ?> </div>

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

<div class="gbBlock gcBackground1">
  <?php echo $this->_smarty_vars['capture']['submitButtons']; ?>

</div>