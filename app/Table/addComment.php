<?php

$commentTable = app::getInstance()->getTable('comment');

$sql = [	'content' => $_POST['content'],
			'bil_id'  => $_POST['billetID'],
			'usr_id'  => $_POST['usr_id']
		];

var_dump($sql);//display the structured information of a variable, including its type

if (!empty($_POST)){
	$commentTable->create($sql);		
}