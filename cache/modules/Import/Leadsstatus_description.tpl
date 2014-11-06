
{if empty($fields.status_description.value)}
{assign var="value" value=$fields.status_description.default_value }
{else}
{assign var="value" value=$fields.status_description.value }
{/if}  




<textarea  id='{$fields.status_description.name}' name='{$fields.status_description.name}'
rows="4" 
cols="20" 
title='' tabindex="1" 
 >{$value}</textarea>


