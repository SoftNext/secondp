<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:10
         compiled from cache/modules/Import/Leadsaccount_name.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['account_name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['account_name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['account_name']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['account_name']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['account_name']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >