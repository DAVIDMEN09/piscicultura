<?php
session_start();
$user= $_SESSION['user'] ?? " ";
if (isset($_SESSION['user'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<title>Login</title>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
               <div class="card-body px-md-4 py-md-0  "> 
                <!-- ------ -->
                <div class="row" style="max-height: 600px ;">
      <div class="col-sm-6 text-black">

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="acceder.php"  method="POST" style="width: 30rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar Sesion</h3>

            <div class="form-outline mb-4">
              <input type="text" id="usuario" class="form-control form-control-lg" name="email" required/>
              <label class="form-label" for="form2Example18">Usuario</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" class="form-control form-control-lg" name="pwd" required/>
              <label class="form-label" for="form2Example28">Contraseña</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
            </div>
          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block ">
        <img src="https://img.freepik.com/foto-gratis/mujeres-turistas-abren-sus-brazos-sostienen-sus-alas_1150-7462.jpg?w=740&t=st=1670519731~exp=1670520331~hmac=7cd6ba9cbc26ff04c7055df9b1ce1f66625e47c20d53927e6e9ff14368935ee3"
          alt="Login image" class="w-100 " style="object-fit: cover; height: 570px;">
      </div>
               
                          <!-- ....... -->

          </div>
        </div>
      </div>
   
</section>


</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       
<style>

 /* Styles para login */
 .bg-image-vertical {
position: relative;
overflow: hidden;
background-repeat: no-repeat;
background-position: right center;
background-size: auto 100%;
}

@media (min-width: 1025px) {
.h-custom-2 {
height: 100%;
}
}



 /* .Styles para login */

</style>