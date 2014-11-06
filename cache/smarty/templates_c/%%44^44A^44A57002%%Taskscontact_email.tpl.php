<?php /* Smarty version 2.6.11, created on 2014-05-19 12:27:13
         compiled from cache/modules/Import/Taskscontact_email.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['contact_email']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['contact_email']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['contact_email']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['contact_email']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['contact_email']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >