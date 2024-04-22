<?php /* Smarty version 2.6.10, created on 2006-09-19 02:58:29
         compiled from Htaccess.tpl */ ?>
# BEGIN Url Rewrite section
# (Automatically generated.  Do not edit this section)
<IfModule mod_rewrite.c>
<?php if ($this->_tpl_vars['Htaccess']['needOptions']): ?>
    Options +FollowSymlinks
<?php endif; ?>
    RewriteEngine On

    RewriteBase <?php echo $this->_tpl_vars['Htaccess']['rewriteBase']; ?>


    RewriteCond %{REQUEST_FILENAME} -f [OR]
    RewriteCond %{REQUEST_FILENAME} -d [OR]
    RewriteCond %{REQUEST_FILENAME} gallery\_remote2\.php
    RewriteCond %{REQUEST_FILENAME} !<?php echo $this->_tpl_vars['Htaccess']['matchBaseFile']; ?>
$
    RewriteRule .   -   [L]


<?php $_from = $this->_tpl_vars['Htaccess']['rules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rule']):
 if (isset ( $this->_tpl_vars['rule']['settings']['restrict'] )): ?>
  <?php $_from = $this->_tpl_vars['rule']['settings']['restrict']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['condition']):
?>
    RewriteCond %{QUERY_STRING} <?php echo $this->_tpl_vars['condition']; ?>

  <?php endforeach; endif; unset($_from); ?>
  <?php $_from = $this->_tpl_vars['rule']['settings']['exempt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['host']):
?>
    RewriteCond %{HTTP_REFERER} !://<?php echo $this->_tpl_vars['host']; ?>
/ [NC]
  <?php endforeach; endif; unset($_from); ?>
  <?php if ($this->_tpl_vars['Htaccess']['allowEmptyReferer']): ?>
    RewriteCond %{HTTP_REFERER} !^$
  <?php endif;  else: ?>
    RewriteCond %{THE_REQUEST} \ <?php echo $this->_tpl_vars['Htaccess']['rewriteBase'];  echo $this->_tpl_vars['rule']['pattern']; ?>
(\?.|\ .)
    RewriteCond %{REQUEST_FILENAME} !<?php echo $this->_tpl_vars['Htaccess']['matchBaseFile']; ?>
$
<?php endif;  if (strpos ( $this->_tpl_vars['rule']['queryString'] , 'view=core.DownloadItem' ) !== false): ?>
    RewriteRule .   <?php echo $this->_tpl_vars['Htaccess']['galleryDirectory'];  echo $this->_tpl_vars['Htaccess']['mainPhp']; ?>
?<?php echo $this->_tpl_vars['rule']['queryString']; ?>
   [<?php echo $this->_tpl_vars['rule']['settings']['flags']; ?>
]
<?php else: ?>
    RewriteRule .   <?php echo $this->_tpl_vars['Htaccess']['directory'];  echo $this->_tpl_vars['Htaccess']['baseFile'];  echo $this->_tpl_vars['rule']['queryString']; ?>
   [<?php echo $this->_tpl_vars['rule']['settings']['flags']; ?>
]
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>
</IfModule>

# END Url Rewrite section
et($_from); ?>
</IfModule>

# END Url Rewrite section
