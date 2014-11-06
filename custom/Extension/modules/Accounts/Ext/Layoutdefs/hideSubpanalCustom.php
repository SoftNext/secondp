<?php
unset($layout_defs['Accounts']['subpanel_setup']['accounts']);
unset($layout_defs['Accounts']['subpanel_setup']['bugs']);
unset($layout_defs['Accounts']['subpanel_setup']['project']);
unset($layout_defs['Accounts']['subpanel_setup']['cases']);
//unset($layout_defs['Accounts']['subpanel_setup']['history']);
// unset($layout_defs['Accounts']['subpanel_setup']['documents']);
 unset($layout_defs['Accounts']['subpanel_setup']['contacts']);
 unset($layout_defs['Accounts']['subpanel_setup']['opportunities']);
//unset($layout_defs['Accounts']['subpanel_setup']['leads']);

$layout_defs['Accounts']['subpanel_setup']['activities']['top_buttons'] = array(
	array('widget_class' => 'SubPanelTopScheduleCallButton'),
	//array('widget_class' => 'SubPanelTopCreateTaskButton'),
	//array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
	//array('widget_class' => 'SubPanelTopComposeEmailButton'),
);

?>