<?php

declare(strict_types=1); //obligatoire

use function foo\func;

function redirect(string $url = ""){
  if($url == ""){
      header("Location: ". "/");
  }else{
      header("Location: "."/". $url);
  }

  exit();
}

//Section BD

function connectDB()
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
  } catch (PDOException $e) {
    echo "Impossible de se connecter!";
    die();
  }

  return $db;
}

function insertDB($db)
{
  /* 1ère étape : les données */
  $datas = array(
    'name' => "Rencontre",
    'comment' => "Rencontre pour les createurs de contenu"
  );

  /* 2ème étape : préparer la requête */
  $sql = "INSERT INTO event_types (name, comment) VALUE (:name, :comment)";
  $qry = $db->prepare($sql);

  /* 3ème étape: On exécute la requête */
  $qry->execute($datas);
}

function readDB($db, $table)
{
  /* 1ère étape : les données */
  $datas = array();

  /* 2ème étape : préparer la requête */
  $sql = "SELECT * FROM " . $table; //le SQL
  $qry = $db->prepare($sql);

  /* 3ème étape: On exécute la requête */
  $qry->execute($datas);
  $table = $qry->fetchAll();

  return $table;
}

function updateDB($db)
{
  /* 1ère étape : les données */
  $datas = array(
    'id' => 4,
    'name' => "Competition",
    'comment' => "Competition haut niveau de CSGO"
  );

  /* 2ème étape : préparer la requête */
  $sql = "UPDATE event_types SET name = :name, comment = :comment WHERE id=:id"; //le SQL
  $qry = $db->prepare($sql);

  /* 3ème étape: On exécute la requête */
  $count = $qry->execute($datas);
  echo "Nombre d'éléments mis à jour: " . $count . "<br>"; //va afficher le nombre de lignes affectées
}

function deleteDB($db)
{
  /* 1ère étape : les données */
  $datas = array(
    'id' => 3
  );

  /* 2ème étape : préparer la requête */
  $sql = "DELETE FROM event_types WHERE id=:id"; //le SQL
  $qry = $db->prepare($sql);

  /* 3ème étape: On exécute la requête */
  $count = $qry->execute($datas);
  echo "Nombre d'éléments effacés: " . $count . "<br>"; //va afficher le nombre de lignes affectées
}

function getProductInfo($db, $sku){
  debug($db);
  $datas = array(
    'sku' => $sku
  );

  $sql = "SELECT * FROM product WHERE sku=:sku";
  $qry = $db->prepare($sql);
  $qry->execute($datas);

  $product = $qry->fetch();
  return $product;
}
function getAllProduct($db){
  $datas = array(
  );

  $sql = "SELECT * FROM product";
  $qry = $db ->prepare($sql);
  $qry->execute($datas);

  $product = $qry->fetchAll();
  return $product;
}
function insertUser($db){
  $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $datas = array(
    'email' => $_POST["email"],
    'password' => $hashedPassword,
    'first_name' => $_POST["first_name"],
    'last_name' => $_POST["last_name"],
    'shipping_address' => $_POST["shipping_address"]
  );
  $sql = "INSERT INTO user (email, password, first_name, last_name, shipping_address) VALUE (:email, :password, :first_name, :last_name, :shipping_address)";
  $qry = $db->prepare($sql);

  $qry->execute($datas);
}
function getUserInfo($db, $email){
  $datas = array(
    'email' => $email
  );

  $sql = "SELECT * FROM user WHERE email=:email";
  $qry = $db ->prepare($sql);
  $qry->execute($datas);

  $product = $qry->fetch();
  return $product;
}
function getAllUsers($db){
  $datas = array(
  );

  $sql = "SELECT * FROM user";
  $qry = $db ->prepare($sql);
  $qry->execute($datas);

  $product = $qry->fetchAll();
  return $product;
}
function connectUser($email){
  $_SESSION['user'] = $email;
}
function validatePasswordConfirmation($password, $passwordConfirmation){
  return $password == $passwordConfirmation;
}
function doesUserExist($db, $email){
  $userExists = false;
  $users = getAllUsers($db);
  foreach($users as $user){
    if($user["email"]  == $email){
      $userExists = true;
    }
  }
  return $userExists;
}
function emailPasswordValidation($db, $email, $password){
  $userInfo = getUserInfo($db, $email);

  return password_verify($password, $userInfo['password']);
}
function parseOrderToArray($post){
  $array = [];
  for ($i=0; $i < count($post)/2; $i++) { 
    $array[$i] = array('sku' => $post['sku'.$i], 'amount' => $post['amount'.$i]);
  }
  return $array;
}
function addOrderToDB($db, $order, $userId){
  $datas = array(
    'user_id' => $userId
  );
  $sql = "INSERT INTO `order` (user_id) VALUE (:user_id)";
  $qry = $db->prepare($sql);

  $qry->execute($datas);
  $id = $db->lastInsertId();
  for ($i=0; $i < count($order); $i++) { 
    $datas = array(
      'order_id' => $id,
      'product_sku' => $order[$i]['sku'],
      'quantity' => $order[$i]['amount']
    );
    $sql = "INSERT INTO order_item (order_id, product_sku, quantity) VALUE (:order_id, :product_sku, :quantity)";
    $qry = $db->prepare($sql);
    $qry->execute($datas);
  }
}
function addCartPrice($db, $cart){
  $totalPrice = 0;
  for ($i=0; $i < count($cart); $i++){
    $productInfo = getProductInfo($db,$cart[$i]['sku']);
    $totalPrice += $productInfo['price']*$cart[$i]['amount'];
  }
  return $totalPrice;
}
function addItemForCart($post, $cart){
  $found = false;
  for ($i=0; $i < count($cart); $i++) { 
    if($cart[$i]['sku'] == $post['sku']){
      $cart[$i]['amount'] += $post['amount'];
      $found = true;
    }
  }

  if(!$found){
    $cart[count($cart)] = array('sku' => $post['sku'], 'amount' => $post['amount']);
  }
  return $cart;
}
function doesProductExist($sku){
  $db = connectDB();
  $productInfo = getProductInfo($db, $sku);
  
  if(empty($productInfo)){
      return false;
  }
  return true;
}
function removeFromCart($cart, $sku){
  for ($i=0; $i < count($_SESSION['cart']); $i++) { 
    if($_SESSION['cart'][$i]['sku'] == $_POST['sku']){
        unset($_SESSION['cart'][$i]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
  }
  return $cart;
}