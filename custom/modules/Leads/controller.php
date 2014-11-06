 <?PHP
require_once('include/MVC/Controller/SugarController.php');
require_once('custom/modules/Leads/LeadInListView.php');

class LeadsController extends SugarController {
//     function action_listview(){
//         $this->view_object_map['bean'] = $this->bean;
//         $this->view = 'list';
//         $GLOBALS['view'] = $this->view;
//         $this->bean = new LeadInListView();
//     }

    protected function callLegacyCode(){
    	if(strtolower($this->do_action) == 'convertlead'){
    		if(file_exists('modules/Leads/ConvertLead.php') && !file_exists('custom/modules/Leads/metadata/convertdefs.php')){
    			if(!empty($_REQUEST['emailAddressWidget'])) {
    				foreach($_REQUEST as $key=>$value) {
    					if(preg_match('/^Leads.*?emailAddress[\d]+$/', $key)) {
    						$_REQUEST['Leads_email_widget_id'] = 0;
    						break;
    					}
    				}
    			}
    			$this->action_default();
    			$this->_processed = true;
    		}else{
    			$this->view = 'convertlead';
    			$this->_processed = true;
    		}
    	}else{
    		parent::callLegacyCode();
    	}
    }
    
}
?> 