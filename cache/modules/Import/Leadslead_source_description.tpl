
{if empty($fields.lead_source_description.value)}
{assign var="value" value=$fields.lead_source_description.default_value }
{else}
{assign var="value" value=$fields.lead_source_description.value }
{/if}  




<textarea  id='{$fields.lead_source_description.name}' name='{$fields.lead_source_description.name}'
rows="4" 
cols="60" 
title='' tabindex="1" 
 >{$value}</textarea>


