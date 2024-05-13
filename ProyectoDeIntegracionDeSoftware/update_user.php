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

   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $user_id]);

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $_POST['prev_pass'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass);

   if($old_pass == $empty_pass){
      $message[] = '¡Por favor ingrese la contraseña anterior!';
   }elseif($old_pass != $prev_pass){
      $message[] = '¡La contraseña anterior no coincide!';
   }elseif($new_pass != $cpass){
      $message[] = '¡Confirme que la contraseña no coincide!';
   }else{
      if($new_pass != $empty_pass){
         $update_admin_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_admin_pass->execute([$cpass, $user_id]);
         $message[] = '¡Contraseña actualizada exitosamente!';
      }else{
         $message[] = '¡Por favor ingrese una nueva contraseña!';
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
   <title>Registro</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Actualizar Ahora</h3>
      <input type="hidden" name="Contraseña_anterior" value="<?= $fetch_profile["Contraseña"]; ?>">
      <input type="text" name="name" required placeholder="Ingrese su Usuario" maxlength="20"  class="box" value="<?= $fetch_profile["name"]; ?>">
      <input type="email" name="email" required placeholder="Ingrese su email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_profile["email"]; ?>">
      <input type="password" name="vieja_contraeña" placeholder="Ingrese su vieja contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="nueva_contraeña" placeholder="Ingrese su nueva contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="confirmar_contraseña" placeholder="Confirmar su nueva contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="actualizar ahora" class="btn" name="submit">
   </form>

</section>




<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>