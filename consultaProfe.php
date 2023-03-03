<?php
    $host = 'localhost';
    $user = "root";
    $password = "1234";
    $bd = "easycourse";
    date_default_timezone_set('America/Mexico_City');

$connect = new PDO("mysql:host=$host;dbname=$bd", $user, $password);

if (isset($_POST["rating_data"])) {
    $data = array(
        ':user_name' => $_POST["user_name"],
        ':user_rating' => $_POST["rating_data"],
        ':user_review' => $_POST["user_review"],
        ':teacher'=> $_POST["teacher"],
        ':datetime' => date('Y-m-d H:i:s')
    );

    $query = "INSERT INTO valoraciones(NomUsuario, Rating, Valoracion, FechaTiempo, NomProfe) VALUES (:user_name, :user_rating, :user_review, :datetime, :teacher)";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    echo "La valoración de subió con éxito";
}

if(isset($_POST["action"])){
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();

    $query = "SELECT * FROM valoraciones ORDER BY IdVal DESC";

    $result = $connect->query($query, PDO::FETCH_ASSOC);

    foreach($result as $row){
        $review_content[] = array(
            'user_name' => $row["NomUsuario"],
            'rating' => $row["Rating"],
            'user_review' => $row["Valoracion"],
            //'datetime' => date('l jS, F Y h:i:s A', $row["FechaTiempo"]),
            //'datetime' => date('Y-m-d H:i:s', $row["TiempoFecha"]),
            'teacher' => $row["NomProfe"]
        );

        if($row["Rating"] == '5'){
            $five_star_review++;
        }
        if($row["Rating"] == '4'){
            $four_star_review++;
        }
        if($row["Rating"] == '3'){
            $three_star_review++;
        }
        if($row["Rating"] == '2'){
            $two_star_review++;
        }
        if($row["Rating"] == '1'){
            $one_star_review++;
        }

        $total_review++;

        $total_user_rating = $total_user_rating + $row["Rating"];
    }

    $average_rating = $total_user_rating / $total_review;

    $output = array(
        'average_rating' =>  number_format($average_rating, 1),
        'total_review'   =>  $total_review,
        'five_star_review' => $five_star_review,
        'four_star_review' => $four_star_review,
        'three_star_review' => $three_star_review,
        'two_star_review' => $two_star_review,
        'one_star_review' => $one_star_review,
        'review_data' => $review_content
    );

    echo json_encode($output);

}
?>