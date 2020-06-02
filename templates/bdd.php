<?php 
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=masterapp;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur de connexion à la BDD');
}
