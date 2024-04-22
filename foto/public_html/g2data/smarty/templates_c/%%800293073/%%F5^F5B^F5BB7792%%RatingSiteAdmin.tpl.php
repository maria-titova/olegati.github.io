<?php /* Smarty version 2.6.10, created on 2006-09-19 03:05:17
         compiled from gallery:modules/rating/templates/RatingSiteAdmin.tpl */ ?>
<div class="gbBlock gcBackground1">
	<h2> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Rating Settings'), $this);?>
 </h2>
</div>

<?php if (! empty ( $this->_tpl_vars['status'] )): ?>
<div class="gbBlock"><h2 class="giSuccess">
	<?php if (isset ( $this->_tpl_vars['status']['saved'] )): ?>
		<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Settings saved successfully'), $this);?>

	<?php endif; ?>
</h2></div>
<?php endif; ?>

<div class="gbBlock">
	<p style="line-height: 2.5em; margin-left: 1em">
	<input type="checkbox" id="allowAlbumRating"
		<?php if ($this->_tpl_vars['form']['allowAlbumRating']): ?> checked="checked"<?php endif; ?>
		name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[allowAlbumRating]"), $this);?>
"/>
	<label for="allowAlbumRating">
		<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Allow users to rate entire albums, in addition to individual items."), $this);?>

	</label>
  	</p>
</div>

<div class="gbBlock gcBackground1">
	<input type="submit" class="inputTypeSubmit" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
"
		value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
	<input type="submit" class="inputTypeSubmit" name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][reset]"), $this);?>
"
		value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>