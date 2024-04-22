<?php /* Smarty version 2.6.10, created on 2006-09-19 03:20:20
         compiled from gallery:themes/floatrix/templates/album.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'gallery:themes/floatrix/templates/album.tpl', 14, false),array('modifier', 'entitytruncate', 'gallery:themes/floatrix/templates/album.tpl', 100, false),)), $this); ?>
      <div id="gsContent" class="gcBorder1">
        <div id="gbTitleBar" class="gbBlock gcBackground1">
          <div id="gbSearch">
            <?php echo $this->_reg_objects['g'][0]->block(array('type' => "search.SearchBlock"), $this);?>

          </div>

          <?php if (! empty ( $this->_tpl_vars['theme']['item']['title'] )): ?>
          <h2> <?php echo ((is_array($_tmp=$this->_tpl_vars['theme']['item']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>
 </h2>
          <?php endif; ?>
          <?php if (! empty ( $this->_tpl_vars['theme']['item']['description'] )): ?>
          <p class="giDescription">
            <?php echo ((is_array($_tmp=$this->_tpl_vars['theme']['item']['description'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>

          </p>
          <?php endif; ?>

          <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.ItemInfo",'item' => $this->_tpl_vars['theme']['item'],'showDate' => true,'showSize' => true,'showOwner' => true,'class' => 'giInfo'), $this);?>

	  <?php if (! empty ( $this->_tpl_vars['theme']['userLinks'] )): ?>
            <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.ItemLinks",'useDropdown' => false,'links' => $this->_tpl_vars['theme']['userLinks'],'class' => "floatrix-userLinks"), $this);?>

	  <?php endif; ?>
        </div>

        <?php if (! empty ( $this->_tpl_vars['theme']['navigator'] )): ?>
        <div class="gbBlock gcBackground2 gbNavigator">
          <?php if (! empty ( $this->_tpl_vars['theme']['jumpRange'] )): ?>
        <div class="gbPager">
          <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.Pager"), $this);?>

        </div>
          <?php endif; ?>
          <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.Navigator",'navigator' => $this->_tpl_vars['theme']['navigator'],'reverseOrder' => true), $this);?>

        </div>
        <?php endif; ?>

        <?php if (! count ( $this->_tpl_vars['theme']['children'] )): ?>
        <div class="gbBlock giDescription gbEmptyAlbum">
          <h3 class="emptyAlbum">
          <?php echo $this->_reg_objects['g'][0]->text(array('text' => "This album is empty."), $this);?>

          <?php if (isset ( $this->_tpl_vars['theme']['permissions']['core_addDataItem'] )): ?>
          <br/>
          <a href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ItemAdmin",'arg2' => "subView=core.ItemAdd",'arg3' => "itemId=".($this->_tpl_vars['theme']['item']['id'])), $this);?>
"> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Add a photo!"), $this);?>
 </a>
          <?php endif; ?>
          </h3>
        </div>
        <?php else: ?>
        <div id="gsThumbMatrix">
            <?php $_from = $this->_tpl_vars['theme']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
            <div class="<?php if ($this->_tpl_vars['child']['canContainChildren']): ?>giAlbumCell gcBackground1<?php else: ?>giItemCell<?php endif; ?>" style="width: <?php echo $this->_tpl_vars['theme']['params']['columnWidth']; ?>
px; height: <?php echo $this->_tpl_vars['theme']['params']['rowHeight']; ?>
px;">

            <?php if (( $this->_tpl_vars['child']['canContainChildren'] || $this->_tpl_vars['child']['entityType'] == 'GalleryLinkItem' )): ?>
                <?php $this->assign('frameType', 'albumFrame'); ?>
            <?php else: ?>
                <?php $this->assign('frameType', 'itemFrame'); ?>
            <?php endif; ?>

            <?php echo '';  if (isset ( $this->_tpl_vars['theme']['params'][$this->_tpl_vars['frameType']] ) && isset ( $this->_tpl_vars['child']['thumbnail'] )):  echo '';  $this->_tag_stack[] = array('container', array('type' => "imageframe.ImageFrame",'frame' => $this->_tpl_vars['theme']['params'][$this->_tpl_vars['frameType']],'width' => $this->_tpl_vars['child']['thumbnail']['width'],'height' => $this->_tpl_vars['child']['thumbnail']['height']), $this); $this->_reg_objects['g'][0]->container($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true); while ($_block_repeat) { ob_start(); echo '<a href="';  echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=".($this->_tpl_vars['child']['id'])), $this); echo '">';  echo $this->_reg_objects['g'][0]->image(array('id' => "%ID%",'item' => $this->_tpl_vars['child'],'image' => $this->_tpl_vars['child']['thumbnail'],'class' => "%CLASS% giThumbnail"), $this); echo '</a>';  $_obj_block_content = ob_get_contents(); ob_end_clean(); echo $this->_reg_objects['g'][0]->container($this->_tag_stack[count($this->_tag_stack)-1][1], $_obj_block_content, $this, $_block_repeat=false);} array_pop($this->_tag_stack); echo '';  elseif (isset ( $this->_tpl_vars['child']['thumbnail'] )):  echo '<a href="';  echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=".($this->_tpl_vars['child']['id'])), $this); echo '">';  echo $this->_reg_objects['g'][0]->image(array('item' => $this->_tpl_vars['child'],'image' => $this->_tpl_vars['child']['thumbnail'],'class' => 'giThumbnail'), $this); echo '</a>';  else:  echo '<a href="';  echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=core.ShowItem",'arg2' => "itemId=".($this->_tpl_vars['child']['id'])), $this); echo '"class="giMissingThumbnail">';  echo $this->_reg_objects['g'][0]->text(array('text' => 'no thumbnail'), $this); echo '</a>';  endif;  echo ''; ?>


            <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.ItemLinks",'item' => $this->_tpl_vars['child'],'links' => $this->_tpl_vars['child']['itemLinks']), $this);?>


            <?php if (! empty ( $this->_tpl_vars['child']['title'] )): ?>
            <p class="giTitle">
                <?php if ($this->_tpl_vars['child']['canContainChildren']): ?>
                <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Album: %s",'arg1' => ((is_array($_tmp=$this->_tpl_vars['child']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp))), $this);?>

                <?php else: ?>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['child']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)); ?>

                <?php endif; ?>
            </p>
            <?php endif; ?>

            <?php if (! empty ( $this->_tpl_vars['child']['summary'] )): ?>
            <p class="giDescription"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['child']['summary'])) ? $this->_run_mod_handler('markup', true, $_tmp) : smarty_modifier_markup($_tmp)))) ? $this->_run_mod_handler('entitytruncate', true, $_tmp, 256) : smarty_modifier_entitytruncate($_tmp, 256)); ?>
</p>
            <?php endif; ?>

            <?php if (( $this->_tpl_vars['child']['canContainChildren'] && $this->_tpl_vars['theme']['params']['showAlbumOwner'] ) || ( ! $this->_tpl_vars['child']['canContainChildren'] && $this->_tpl_vars['theme']['params']['showImageOwner'] )): ?>
                <?php $this->assign('showOwner', true); ?>
            <?php else: ?>
                <?php $this->assign('showOwner', false); ?>
            <?php endif; ?>

            <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.ItemInfo",'item' => $this->_tpl_vars['child'],'showDate' => true,'showOwner' => $this->_tpl_vars['showOwner'],'showSize' => true,'showViewCount' => true,'showSummaries' => true,'class' => 'giInfo'), $this);?>

            </div>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <?php endif; ?>
        
                <div id="gbAlbumBlocks">
        <?php $_from = $this->_tpl_vars['theme']['params']['albumBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
          <?php echo $this->_reg_objects['g'][0]->block(array('type' => $this->_tpl_vars['block']['0'],'params' => $this->_tpl_vars['block']['1']), $this);?>

        <?php endforeach; endif; unset($_from); ?>
        </div>

        <?php if (! empty ( $this->_tpl_vars['theme']['navigator'] )): ?>
        <div class="gbBlock gcBackground2 gbNavigator">
          <?php if (! empty ( $this->_tpl_vars['theme']['jumpRange'] )): ?>
        <div class="gbPager">
          <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.Pager"), $this);?>

        </div>
          <?php endif; ?>
          <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.Navigator",'navigator' => $this->_tpl_vars['theme']['navigator'],'reverseOrder' => true), $this);?>

        </div>
        <?php endif; ?>

        <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.GuestPreview",'class' => 'gbBlock'), $this);?>


                <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.EmergencyEditItemLink",'class' => 'gbBlock','checkSidebarBlocks' => true,'checkAlbumBlocks' => true), $this);?>


      </div>