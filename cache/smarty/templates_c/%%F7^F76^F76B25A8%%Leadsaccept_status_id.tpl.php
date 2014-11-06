<?php /* Smarty version 2.6.11, created on 2014-06-11 17:23:20
         compiled from cache/modules/Import/Leadsaccept_status_id.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['accept_status_id']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['accept_status_id']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['accept_status_id']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['accept_status_id']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['accept_status_id']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >