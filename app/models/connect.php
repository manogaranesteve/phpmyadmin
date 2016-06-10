<?php
/**
* Created by PhpStorm.
* User: stevemanogarane
* Date: 02/06/2016
* Time: 14:41
*/

function connect_bdd()
{
  try
  {
    $bdd = new PDO("mysql:host=localhost;dbname=information_schema;charset=utf8", 'root', 'root');
  }
  catch(PDOException $e)
  {
    die('Erreur : '.$e->getMessage());
  }
  return ($bdd);
}

function show_dB($bdd)
{
  $reponse = $bdd->query('SHOW DATABASES');
  $donnees = $reponse->fetchAll(PDO::FETCH_COLUMN);
  return ($donnees);
}

function show_tb($bdd,$db_name)
{
  $reponse = $bdd->query("SELECT TABLE_NAME,TABLE_TYPE,TABLE_COLLATION FROM TABLES WHERE TABLE_SCHEMA = '" . $db_name . "'");
  $result = $reponse->fetchAll();
  return ($result);
}

function create_dB($bdd, $db_name)
{
  $bdd->query("CREATE DATABASE $db_name");
}

function supp_dB($bdd, $db_name)
{
  $bdd->query("DROP DATABASE $db_name");
}

function stats($bdd)
{
  $reponse = $bdd->query("SELECT TABLE_SCHEMA,COUNT(TABLE_NAME),MIN(CREATE_TIME),SUM(DATA_LENGTH) FROM information_schema.TABLES GROUP BY TABLE_SCHEMA");
  $res = $reponse->fetchAll(PDO::FETCH_ASSOC);
  return ($res);
}

function create_tb($bdd,$tb_name,$colonne,$type,$colonne1,$type1,$colonne2,$type2)
{
  $bdd->query("CREATE TABLE $tb_name ('$colonne''$type','$colonne1''$type1','$colonne2''$type2')");
}

function supp_tb($bdd, $tb_name)
{
    $bdd->query("DROP TABLE $tb_name");
}