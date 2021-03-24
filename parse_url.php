<?php
$url = 'https://www.zend.com/en/services/training/?id=1&view=index&component=user';
$info = parse_url($url);
if (!empty($info['query'])) {
	parse_str($info['query'], $query);
	$info['query'] = $query;
}
var_dump($info);

