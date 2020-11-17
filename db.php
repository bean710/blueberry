<?php

$db = (function() {
  $parts = (parse_url(getenv('DATABASE_URL') ?: 'postgres://osaxydmvbsxvdn:a4abf5a952a69a534ef4a7c6593519f6eba0f16cfd9dc216dd4e6b700610143f@ec2-52-207-124-89.compute-1.amazonaws.com:5432/d6s648r538kctj'));
  extract($parts);
  $path = ltrim($path, "/");

  return new PDO("pgsql:host={$host};port={$port};dbname={$path};sslmode=require;sslcert=;sslkey=;", $user, $pass);
})();

 ?>
