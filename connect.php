<?php
$host = 'localhost';
$db   = 'form';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$age = filter_input(INPUT_POST, 'age');
$IBAN = filter_input(INPUT_POST, 'IBAN');
$coins = filter_input(INPUT_POST, 'coins');


$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
     $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = "INSERT INTO form (name, email, age, IBAN, coins) VALUES (?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $email, $age, $IBAN, $coins]);

?>
<html>
   <head>
       <style>
           .container{
               width: 30%;
               height: 25%;
              
               margin: auto;
               margin-top: 16%;
               padding-top: 100px;
           }
           h1{
               text-align: center;
           }

       </style>
   </head>
    <body>
        <div class="container">
           <h1>Succes!<br><br>
            <a style="text-decoration:none" href="/frm/">back</a>
            </h1> 
      
          
        </div>
    </body>
</html>