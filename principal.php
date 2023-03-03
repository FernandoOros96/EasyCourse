<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="principal.css">
    <script src="https://kit.fontawesome.com/ce9d78d38d.js" crossorigin="anonymous"></script>
    <title>Landing Page</title>
</head>
<body>
    <!--Header-->
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
        <div class="info-container">
            <div class="info">
                <div class="texts">
                    <h1 class="title">EasyCourse</h1>
                    <h2 class="subtitle">¡Valora profesores, materias y escuelas!</h2>
                    <p class="text">Ofrece valoraciones para cada una de las asignaturas de tu escuela y de esta manera brinda ayuda a los estudiantes que deseen cursar alguna de estas. Además, recomienda profesores y asiste con consejos a los nuevos alumnos.</p>
                    <button class="more">
                        <a href="#">Ver más</a>
                    </button>
                </div>
            </div>
            <div class="image">
                <img src="help.jpg" alt="">
            </div>
        </div>
    </main>

    <section class="form-search">
        <form action="" method="GET">
            <h3>Busca tus profesores, materias y escuela</h3>
            <div class="fields">
                <input class="controls" type="text" name="NomProfe" value="<?php if(isset($_GET['NomProfe'])) {
                    echo trim($_GET['NomProfe']);}?> "placeholder="Ingrese el nombre del profesor">
            </div>
            <button type="submit" class="search">Buscar</button>
        </form>
    </section>

    <section class="info-teacher">
                    <div class="info-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Materia</th>
                                    <th>Escuela</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        $host = 'localhost';
        $user = "root";
        $password = "1234";
        $bd = "easycourse";

        $connect = mysqli_connect($host, $user, $password, $bd);

        if(isset($_GET['NomProfe'])){
            $name = trim($_GET['NomProfe']);
            $query = "SELECT * FROM materia m, profesores p WHERE m.NomProfe=p.NomProfe AND m.NomProfe='$name' ";
            $query_run = mysqli_query($connect, $query);

            if(mysqli_num_rows($query_run)>0){
                foreach($query_run as $row){
                    ?>
                                    <tr>
                                        <td><a href="profesor.php?NomProfe=<?php echo $row['NomProfe'] ?>"><?php echo $row['NomProfe'];?></a></td>
                                        <td><?php echo $row['NomMat'];?></td>
                                        <td><?php echo $row['NomEsc'];?></td>
                                    </tr>
                <?php
                }
            }else{ ?>
                <script>
                     alert("No hay datos");
                </script>
                <?php
            }
        }
        ?>
                            </tbody>
                        </table>
                    </div>
    </section>
</body>
</html>