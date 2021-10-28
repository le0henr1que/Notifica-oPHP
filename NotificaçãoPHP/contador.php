<?php

$query = "SELECT * from notifica_area1 order by id desc limit 40";
$query_count = "SELECT * from notifica_area1 ";
$result_count = mysqli_query($conexao, $query_count);

$result = mysqli_query($conexao, $query);
@$linha1 = mysqli_num_rows($result);
@$linha_count1 = mysqli_num_rows($result_count);


$query = "SELECT * from notifica_area2 order by id desc limit 40";
$query_count = "SELECT * from notifica_area2 ";
$result_count = mysqli_query($conexao, $query_count);

$result = mysqli_query($conexao, $query);
@$linha2 = mysqli_num_rows($result);
@$linha_count1 = mysqli_num_rows($result_count);


?>