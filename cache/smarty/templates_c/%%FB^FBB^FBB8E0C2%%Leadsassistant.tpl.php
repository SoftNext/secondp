<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:11
         compiled from cache/modules/Import/Leadsassistant.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['assistant']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['assistant']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['assistant']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['assistant']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['assistant']['name']; ?>
' size='30' 
    maxlength='75' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >