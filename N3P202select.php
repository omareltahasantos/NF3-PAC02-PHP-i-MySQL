<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'biblioteca') or die(mysqli_error($db));

// select the movie titles and their genre after 1990
$query = 'SELECT
      juegos_id, juegos_name, juegos_type, juegos_year, people_fullname
    FROM
       juegos j, juegostype t, people p
    WHERE
       (j.juegos_type=t.juegostype_id and j.juegos_directorid=p.people_isdirector and j.juegos_protaid = p.people_isprota) ';
      
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// show the results
while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	echo $juegos_id . '-' . $juegos_name . '-' . $juegos_type . '-' .$juegos_year . '-' . $people_fullname.  '</br>';
}
?>
