<?php
    include("../templates/bdd.php");

    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM files WHERE id_blob=" . $_GET['id'] . ';';
		$result = $bdd->query($sql);
		$row = $result->fetch();
		header("Content-type: " . $row["mime"]);
        echo $row["data"];
	}
?>