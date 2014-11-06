<?php /* Smarty version 2.6.11, created on 2014-10-27 16:31:11
         compiled from cache/modules/Import/Leadsmemberid_c.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'cache/modules/Import/Leadsmemberid_c.tpl', 8, false),)), $this); ?>

<?php if (strlen ( $this->_tpl_vars['fields']['memberid_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['memberid_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['memberid_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['memberid_c']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['memberid_c']['name']; ?>
' size='30' maxlength='7' value='<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='1'    >