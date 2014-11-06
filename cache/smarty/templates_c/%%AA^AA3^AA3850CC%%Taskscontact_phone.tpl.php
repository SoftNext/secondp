<?php /* Smarty version 2.6.11, created on 2014-05-19 12:24:34
         compiled from cache/modules/Import/Taskscontact_phone.tpl */ ?>


<?php if (strlen ( $this->_tpl_vars['fields']['contact_phone']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['contact_phone']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['contact_phone']['value']);  endif; ?>  

<input type='text' name='<?php echo $this->_tpl_vars['fields']['contact_phone']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['contact_phone']['name']; ?>
' size='30'  value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='1'	  class="phone" >