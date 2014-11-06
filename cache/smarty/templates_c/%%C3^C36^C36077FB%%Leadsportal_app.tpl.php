<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:11
         compiled from cache/modules/Import/Leadsportal_app.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['portal_app']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['portal_app']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['portal_app']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['portal_app']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['portal_app']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >