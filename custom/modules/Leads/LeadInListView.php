 <?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class LeadInListView extends Lead {
    function LeadInListView() {
        parent::Lead();
    }

    function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean, $singleSelect = false){    	
    	$ret_array = parent::create_new_list_query($order_by, $where,$filter,$params, $show_deleted,$join_type, $return_array,$parentbean, $singleSelect);
        if (empty($where)) {
    		$ret_array['where'] .= " AND converted = 0";
        }
    	return $ret_array;
    }
}
?> 