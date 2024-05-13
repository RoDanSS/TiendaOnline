<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Comentarios</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/dev.png" alt="">
      </div>

      <div class="content">
         <h3>Mensaje del desarrollador</h3>
         <p>Hola somos Estudiantes del ITB de la carrera Ingeniria de Software del curso DL-013-14, y esta es nuestra primer aplicacion completa </p>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Reseñas de clientes.</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">
      /*poner un link en para ver info la persona que a dado su reseña y una foto*/
      <div class="swiper-slide slide">
         <img src="images/pic-1.png" alt="">
         <p>Llevo bastante tiempo utilizando sus servicios y nunca he tenido problemas con la calidad de sus productos. Los productos electrónicos en línea también funcionan muy bien. El único problema que tengo es que normalmente hacen entregas cuando estoy un poco al día, aunque he establecido un tiempo de entrega preferido. Todo lo demás ha estado bien.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3> <a href="" target="_blank">Pamela Perez</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="" alt="">
         <p>Es el primer servicio en línea en Ecuador en el que podemos confiar completamente. Siempre descomprimo un video y me quejo al instante si hay algún problema. A veces ni siquiera es necesario devolver el artículo y procesan el reembolso. TECNOLOGIC multa mucho a los vendedores que envían productos incorrectos, por eso su plataforma mejora día a día.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="" target="_blank">Daniela Santillan</a></h3>
      </div>
      
      <div class="swiper-slide slide">
         <img src="" alt="">
         <p>Usando TECNOLOGIC para compras online desde y puedo decir que tengo una experiencia excepcional con ellos. Los vales de juego y el punto de recogida como entrega con 0 gastos de envío son servicios de gran ahorro.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="" target="_blank">George Villavicencio</a></h3>
      </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>