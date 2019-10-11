<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'biblioteca') or die(mysqli_error($db));

// insert data into the movie table
$query = 'INSERT INTO juegos
        (juegos_id, juegos_name, juegos_type, juegos_year, juegos_protaid,
        juegos_directorid)
    VALUES
        (1, "borderlands 3", 3, 2019, 1, 1),
        (2, "fortnite", 1, 2017, 2, 2),
        (3, "apex", 1, 2019, 3, 3)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO juegostype 
        (juegostype_id, juegostype_label)
    VALUES 
        (1,"shooter"),
        (2, "rpg"), 
        (3, "looter-shooter"),
        (4, "War"), 
        (5, "Comedy"),
        (6, "Horror"),
        (7, "Action"),
        (8, "Kids")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO people
        (people_id, people_fullname, people_isprota, people_isdirector)
    VALUES
        (1, "Dane DeHaan", 1, 2),
        (2, "Luc Besson", 2, 2),
        (3, "Michael Dougherty", 3, 3),
        (4, "Millie Bobby Brown", 1,3),
        (5, "Ryan Gosling", 2, 2),
        (6, "Denis Villeneuve", 1, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted successfully!';
?>
