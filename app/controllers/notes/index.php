<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Notes";

$notes = $db->query("SELECT * FROM notes WHERE user_id = 1")->all();

require 'views/notes/index.view.php';