<?php

use App\Server\Database;

require __DIR__.'/vendor/autoload.php';

$obDatabase = new Database('swoole');
echo '<pre>';
print_r($obDatabase);
echo '</pre>';
exit;
