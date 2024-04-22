<?php /* Smarty version 2.6.10, created on 2006-09-19 03:10:56
         compiled from gallery:modules/rating/templates/RatingInterface.tpl */ ?>
<?php if ($this->_tpl_vars['RatingSummary']['firstCall']):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/rating/templates/RatingImagePreload.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

<div class="giRatingUI">
	<?php $_from = $this->_tpl_vars['RatingSummary']['ratingValues']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ratingValue']):
 if ($this->_tpl_vars['RatingData']['canRate']): ?><a
		href="javascript:rateItem(<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
, <?php echo $this->_tpl_vars['ratingValue']; ?>
,
		'<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=rating.RatingCallback",'arg2' => "command=rate",'arg3' => "itemId=".($this->_tpl_vars['RatingData']['itemId']),'arg4' => "rating=".($this->_tpl_vars['ratingValue']),'forJavascript' => true), $this);?>
')"
		onMouseOver="updateStarDisplay(<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
, <?php echo $this->_tpl_vars['ratingValue']; ?>
); return true"
		onMouseOut="resetStarDisplay(<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
); return true"><?php endif; ?><img
		src="<?php echo $this->_reg_objects['g'][0]->url(array('href' => "modules/rating/images/transparent.gif"), $this);?>
"
		id="rating.star.<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
.<?php echo $this->_tpl_vars['ratingValue']; ?>
" class="giRatingUnit"
		alt=""
		title="Click a star to rate this item!"/><?php if ($this->_tpl_vars['RatingData']['canRate']): ?></a><?php endif;  endforeach; endif; unset($_from); ?>
	<div class="giRatingAverageContainer">
		<div class="giRatingAverage" id="rating.averagePercent.<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
"
			style="width:<?php echo $this->_tpl_vars['RatingData']['averagePercent']; ?>
%"></div></div>
	<div class="giRatingVotes"><?php ob_start(); ?><span
		id="rating.votes.<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
"><?php echo $this->_tpl_vars['RatingData']['votes']; ?>
</span><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('voteSpan', ob_get_contents());ob_end_clean();  echo $this->_reg_objects['g'][0]->text(array('text' => "%s votes",'arg1' => $this->_tpl_vars['voteSpan']), $this);?>
</div>
	<span class="giRatingHidden"
		id="rating.rating.<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
"><?php echo $this->_tpl_vars['RatingData']['rating']; ?>
</span>
	<span class="giRatingHidden"
		id="rating.userRating.<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
"><?php echo $this->_tpl_vars['RatingData']['userRating']; ?>
</span>
</div>

<script type="text/javascript">
// <![CDATA[
resetStarDisplay(<?php echo $this->_tpl_vars['RatingData']['itemId']; ?>
);
// ]]>
</script>