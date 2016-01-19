<?php
$list = '';
foreach ($nations->selectAllNations() as $country)
{
	$list .= "<option value='{$country['id']}'>{$country['name']} ({$country['iso']})</option>";
}

return $list;