<?php
$host = 'localhost';
$user = 'tihp1';
$pass = 'xldkdl1ghavl';
$db = 'tihp1';

// DB서버에 접속
global $db_con;
$con = "mysql:host={$host};dbname={$db};charset=utf8";
try{
  $db_con = new PDO($con, $user, $pass);
  $db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "연결성공";
}catch(PDOException $e){
  echo $e->getMessage();
}


function sql_query($sql){
  global $db_con;

  try{
    $re = $db_con->prepare($sql);
    $re->execute();
    $rs = $re->fetchAll(PDO::FETCH_ASSOC);
    // $re = $db_con->query($sql);
    // $rs = $re->fetchAll(PDO::FETCH_ASSOC);
    return $rs;
  }catch(PDOException $e){
    // return $e->getMessage();
    return false;
  }
}

function sql_fetch($sql){
  global $db_con;

  try{
    $re = $db_con->query($sql);
    $rs = $re->fetch(PDO::FETCH_ASSOC);

    return $rs;

  }catch(PDOException $e){
    // return $e->getMessage();
    return false;
  }
}

function sql_num_rows($sql){
  // return mysqli_num_rows($result);
  global $db_con;

  try{
    $re = $db_con->query($sql);
    $rs = $re->fetchAll(PDO::FETCH_NUM);
    $cnt = count($rs);

    return $cnt;

  }catch(PDOException $e){
    // return $e->getMessage();
    return false;
  }
}

function sql_exec($sql){
  global $db_con;

  try{
    $re = $db_con->prepare($sql);
    $rs = $re->execute();

    // echo $sql;

    return $rs;
    // return true;
  }catch(PDOException $e){
    // return $e->getMessage();
    return false;
  }
}

function sql_exec2($sql){
  global $db_con;

  try{
    $re = $db_con->prepare($sql);
    $re->execute();

    return $rs;
  }catch(PDOException $e){
    // return $e->getMessage();
    return false;
  }
}


?>
