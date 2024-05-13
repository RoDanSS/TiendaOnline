<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name);
   $email = $_POST['email'];
   $email = filter_var($email);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = '¡El Email ya existe!';
   }else{
      if($pass != $cpass){
         $message[] = '¡Confirme que la contraseña no coincide!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = '¡Registrado exitosamente, inicie sesión ahora por favor!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrate</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Registrarse Ahora.</h3>
      <input type="text" name="name" required placeholder="Ingrese su Usuario" maxlength="20"  class="box">
      <input type="email" name="email" required placeholder="Ingrese su email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Ingrese su contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="Confirmar contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Registrarse Ahora" class="btn" name="submit">
      <p>¿Ya tienes una cuenta?</p>
      <a href="user_login.php" class="option-btn">Iniciar Ahora.</a>
   </form>

</section>




<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>