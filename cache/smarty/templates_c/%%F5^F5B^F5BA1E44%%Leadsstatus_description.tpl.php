<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:11
         compiled from cache/modules/Import/Leadsstatus_description.tpl */ ?>

<?php if (empty ( $this->_tpl_vars['fields']['status_description']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['status_description']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['status_description']['value']);  endif; ?>  




<textarea  id='<?php echo $this->_tpl_vars['fields']['status_description']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['status_description']['name']; ?>
'
rows="4" 
cols="20" 
title='' tabindex="1" 
 ><?php echo $this->_tpl_vars['value']; ?>
</textarea>

