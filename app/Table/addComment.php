<?php

$commentTable = app::getInstance()->getTable('comment');

$sql = [	'content' => $_POST['content'],
			'bil_id'  => $_POST['billetID'],
			'usr_id'  => $_POST['usr_id']
		];

var_dump($sql);//affiche les informations structurées d'une variable, y compris son type

if (!empty($_POST)){
	$commentTable->create($sql);		
}