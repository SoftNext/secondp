 <?PHP
require_once('include/MVC/Controller/SugarController.php');
require_once('custom/modules/Leads/LeadInListView.php');

class LeadsController extends SugarController {
    function action_listview(){
        $this->view_object_map['bean'] = $this->bean;
        $this->view = 'list';
        $GLOBALS['view'] = $this->view;
        $this->bean = new LeadInListView();
    }
}
?> 