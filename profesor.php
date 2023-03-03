<?php
if (isset($_GET['NomProfe'])) {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="profesor.css">
    <script src="https://kit.fontawesome.com/ce9d78d38d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Profesor</title>
</head>
<body>
     <header class="header">
        <a href="#" class="logo">
            <img src="logo.png" alt="">
        </a>

        <nav class="navbar">
            <a href="principal.php">Home</a>
            <a href="#about us">About Us</a>
            <a href="#contact">Contact</a>
            <a href="#help">Help</a>
        </nav>

        <div class="icons">
            <i class="fa-solid fa-magnifying-glass"></i>
            <i class="fa-solid fa-bars"></i>
        </div>
    </header>

    <main>
        <div class="container-teacher">
            <h1 class="teacher-name"><?php echo $_GET['NomProfe'];?></h1>
        </div>
    </main>


    <section class="container-rating">
        <div class="card">
            <div class="card-header">
                <h3>Estadísticas</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1 class="text-warning mt-4 mb-4">
                            <span id="average_rating">0.0</span>/5
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star star-light fa-xl main_star"></i>
                            <i class="fas fa-star star-light fa-xl  main_star"></i>
                            <i class="fas fa-star star-light fa-xl  main_star"></i>
                            <i class="fas fa-star star-light fa-xl  main_star"></i>
                            <i class="fas fa-star star-light fa-xl  main_star"></i>
                        </div>
                        <h3><span id="total_review">0</span> Valoraciones</h3>
                    </div>
                    <div class="col-sm-4">
                        <p>
                        <div class="number"><b>5 </b><i class="fas fa-star text-warning fa-lg "></i><span class="total-five-star-review" style="margin-left:195px;">0</span></div>
                        <div class="progress" style="width: 240px;">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemax="100" id="five-star-progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="number"><b>4 </b><i class="fas fa-star text-warning fa-lg "></i><span class="total-four-star-review" style="margin-left:195px;">0</span></div>
                        <div class="progress" style="width: 240px;">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemax="100" id="four-star-progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="number"><b>3 </b><i class="fas fa-star text-warning fa-lg "></i><span class="total-three-star-review" style="margin-left:195px;">0</span></div>
                        <div class="progress" style="width: 240px;">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemax="100" id="three-star-progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="number"><b>2 </b><i class="fas fa-star text-warning fa-lg "></i><span class="total-two-star-review" style="margin-left:195px;">0</span></div>
                        <div class="progress" style="width: 240px;">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemax="100" id="two-star-progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="number"><b>1 </b><i class="fas fa-star text-warning fa-lg "></i><span class="total-one-star-review" style="margin-left:195px;">0</span></div>
                        <div class="progress" style="width: 240px;">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemax="100" id="one-star-progress"></div>
                        </div>
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h3 class="mt-4 mb-3">Escribe tu valoración aquí</h3>
                        <button type="button" name="add-review" id="add-review" class="btn btn-warning btn-lg">Valorar</button>
                    </div>
                </div>
            </div>
            <div class="mt-5" id="review-content"></div>
        </div>
    </section>

    <div id="myModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enviar valoración</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control">Escribe tu opinión</textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="button" id="save_review" class="btn btn-warning">Subir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="rate.js"></script>
</body>
</html>
<?php
}else{
    echo "Error";
}
?>