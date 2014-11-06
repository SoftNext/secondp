<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:11
         compiled from cache/modules/Import/Leadsopportunity_id.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['opportunity_id']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['opportunity_id']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['opportunity_id']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['opportunity_id']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['opportunity_id']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >