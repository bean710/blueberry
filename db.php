<?php

$db = (function() {
  $parts = (parse_url(getenv('DATABASE_URL')));
  extract($parts);
  $path = ltrim($path, "/");

  return new PDO("pgsql:host={$host};port={$port};dbname={$path};sslmode=require;sslcert=;sslkey=;", $user, $pass);
})();

 ?>
