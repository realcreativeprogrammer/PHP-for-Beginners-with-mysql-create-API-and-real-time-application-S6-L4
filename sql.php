<?php

$sql='INSERT INTO `user`(`email`,`password`) VALUES (?,?)';
$exc=$pdo->prepare($sql);
$exc->execute(array($email,'pass'));