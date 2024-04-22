<?php /* Smarty version 2.6.10, created on 2006-09-25 00:59:36
         compiled from gallery:modules/migrate/templates/SelectGallery.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'gallery:modules/migrate/templates/SelectGallery.tpl', 70, false),)), $this); ?>
<div class="gbBlock gcBackground1">
  <h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Import from Gallery 1'), $this);?>
 </h2>

  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Copy all or part of an existing Gallery 1 installation into your Gallery 2.  It won't modify your Gallery 1 data in any way."), $this);?>

  </p>
</div>

<?php if (( ! $this->_tpl_vars['SelectGallery']['hasToolkit'] )): ?>
<div class="gbBlock"><p class="giError">
  <?php ob_start(); ?>
    <?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SiteAdmin",'arg2' => "subView=core.AdminModules"), $this);?>

  <?php $this->_smarty_vars['capture']['url'] = ob_get_contents(); ob_end_clean(); ?>
  <?php echo $this->_reg_objects['g'][0]->text(array('text' => "You don't have any Graphics Toolkit activated to handle JPEG images.  If you import now, you will not have any thumbnails.  Visit the <a href=\"%s\">Modules</a> page to activate a Graphics Toolkit.",'arg1' => $this->_smarty_vars['capture']['url']), $this);?>

</p></div>
<?php endif; ?>

<div class="gbBlock">
  <h1 class="giTitle"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Path to Gallery 1 albums directory'), $this);?>
 </h1>
  <p class="giDescription">
    <i><?php echo $this->_reg_objects['g'][0]->text(array('text' => "Example: /var/www/albums"), $this);?>
</i>
  </p>

  <div>
    <input type="text" size="60"
     name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[albumsPath]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['albumsPath']; ?>
"
      id='giFormPath' autocomplete="off"/>
    <?php $this->_tag_stack[] = array('autoComplete', array('element' => 'giFormPath'), $this); $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true); while ($_block_repeat) { ob_start();?>
      <?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.SimpleCallback",'arg2' => "command=lookupDirectories",'arg3' => "prefix=__VALUE__",'htmlEntities' => false), $this);?>

    <?php $_obj_block_content = ob_get_contents(); ob_end_clean(); echo $this->_reg_objects['g'][0]->autoComplete($this->_tag_stack[count($this->_tag_stack)-1][1], $_obj_block_content, $this, $_block_repeat=false);} array_pop($this->_tag_stack);?>


    <?php if (isset ( $this->_tpl_vars['form']['error']['albumsPath']['missing'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "You did not enter a path."), $this);?>

    </div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['form']['error']['albumsPath']['invalid'] )): ?>
    <div class="giError">
      <?php echo $this->_reg_objects['g'][0]->text(array('text' => "The path that you entered is invalid."), $this);?>

    </div>
    <?php endif; ?>
  </div>

  <span>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "<b>Note:</b> Before you import any data you should make sure your Gallery 1 is installed correctly by adding a photo through the Gallery 1 web interface.  Make sure you resolve any errors you see there first."), $this);?>

  </span>

  <?php if (! empty ( $this->_tpl_vars['SelectGallery']['recentPaths'] )): ?>
  <script type="text/javascript">
    // <![CDATA[
    function selectPath(path) {
      document.getElementById('siteAdminForm').elements['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[albumsPath]"), $this);?>
'].value = path;
    }
    // ]]>
  </script>

  <h4 class="giTitle">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Recently Used Paths'), $this);?>

  </h4>
  <p>
  <?php $_from = $this->_tpl_vars['SelectGallery']['recentPaths']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['path'] => $this->_tpl_vars['count']):
?>
    <?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['path'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\\", "\\\\") : smarty_modifier_replace($_tmp, "\\", "\\\\"));  $this->_smarty_vars['capture']['escapedPath'] = ob_get_contents(); ob_end_clean(); ?>
    <a href="javascript:selectPath('<?php echo $this->_smarty_vars['capture']['escapedPath']; ?>
')"><?php echo $this->_tpl_vars['path']; ?>
</a>
    <br/>
  <?php endforeach; endif; unset($_from); ?>
  </p>
  <?php endif; ?>
</div>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][select]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Select'), $this);?>
"/>
</div>

<?php if ($this->_tpl_vars['SelectGallery']['mapCount'] > 0 || isset ( $this->_tpl_vars['status']['mapDeleted'] )): ?>
<div class="gbBlock">
  <h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'URL Redirection'), $this);?>
 </h3>

  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Gallery can redirect old Gallery1 URLs to the new Gallery2 pages."), $this);?>

  </p>

  <?php if ($this->_tpl_vars['SelectGallery']['mapCount'] > 0): ?>
    <span>
      <?php echo $this->_reg_objects['g'][0]->text(array('one' => "There is one G1->G2 map entry",'many' => "There are %d G1->G2 map entries",'count' => $this->_tpl_vars['SelectGallery']['mapCount'],'arg1' => $this->_tpl_vars['SelectGallery']['mapCount']), $this);?>

    </span>
    &nbsp;
    <span>
      <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "controller=migrate.SelectGallery",'arg2' => "form[action][deleteMap]=1"), $this);?>
"
	 onclick="return confirm('<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Deleting map entries will cause old G1 URLs to produce HTTP Not Found errors instead of redirecting to G2 pages.  Delete all entries?"), $this);?>
')">
	<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Delete All'), $this);?>

      </a>
    </span>
  <?php endif; ?>
  <?php if (isset ( $this->_tpl_vars['status']['mapDeleted'] )): ?>
    <p class="giError">
	<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Map entries deleted successfully'), $this);?>

    </p>
  <?php endif; ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/migrate/templates/Redirect.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php endif; ?>