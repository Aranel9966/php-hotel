<?php
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $getParking = $_GET['parking']??false;
    $getVote = $_GET['vote']??false;

    $filteredHotels=$hotels;

    if($getParking){
        $tempFilteredHotels=[];

        foreach($hotels as $singolHotel){
            if($singolHotel['parking']== true ){
                $tempFilteredHotels[]=$singolHotel;
            }
        }
        $filteredHotels=$tempFilteredHotels;
    };
    
    if($getVote){
        $tempFilteredHotels=[];
        foreach($filteredHotels as $singolHotel){
            if($singolHotel['vote']>= 3 ){
                $tempFilteredHotels[]=$singolHotel;
            }
        }
        $filteredHotels=$tempFilteredHotels;
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <form action="index.php" method="GET">
        <input type="checkbox" id="parking" name="parking" value=true>
        <label for="parking"> con parcheggio</label><br>
        <input type="checkbox" id="vote" name="vote" value=true>
        <label for="vote"> 3 stelle o più</label><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <table class="table table-dark table-striped-columns">
        <thead>
                <?php
                foreach($hotels[0] as $chiave => $valore){
                ?>
                    <th> <?php echo $chiave ?></th>
                <?php
                }
                ?>
        </thead>
        <tbody>
            <?php

            foreach($filteredHotels as $hotel ){
                ?>
                <tr>
                    <?php
                    foreach($hotel as $chiave => $specifications){
                        if($chiave == "parking"){
                            if($specifications == true){
                                echo "<td> yes </td>";
                            }else{
                                echo "<td> no </td>";
                            };
                        }else{
                            echo "<td> {$specifications} </td>";
                        }
                        };
                        ?>
                </tr>    
            <?php
            };
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>