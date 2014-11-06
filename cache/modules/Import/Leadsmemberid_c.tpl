
{if strlen($fields.memberid_c.value) <= 0}
{assign var="value" value=$fields.memberid_c.default_value }
{else}
{assign var="value" value=$fields.memberid_c.value }
{/if}  
<input type='text' name='{$fields.memberid_c.name}' 
id='{$fields.memberid_c.name}' size='30' maxlength='7' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='1'    >