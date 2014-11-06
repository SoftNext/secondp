<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:11
         compiled from cache/modules/Import/Leadsopportunity_amount.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['opportunity_amount']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['opportunity_amount']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['opportunity_amount']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['opportunity_amount']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['opportunity_amount']['name']; ?>
' size='30' 
    maxlength='50' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >