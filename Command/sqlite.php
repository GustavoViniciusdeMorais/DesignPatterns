<?php

$db_name = "gustavo";

$db = new SQLite3($db_name);

$query = "CREATE TABLE IF NOT EXISTS products(name STRING, price INTEGER)";

$result = $db->exec($query);

var_dump($result);