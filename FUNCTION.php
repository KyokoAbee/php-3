<?php 
// DB に接続するための情報
function connect_to_db()
{
  $dbn='mysql:dbname=people_info;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
  }
}

?>