<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:11
         compiled from cache/modules/Import/Leadsalt_address_postalcode.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['alt_address_postalcode']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['alt_address_postalcode']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['alt_address_postalcode']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['alt_address_postalcode']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['alt_address_postalcode']['name']; ?>
' size='30' 
    maxlength='20' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >