<?php

include "app/models/connect.php";

if (isset($action) && $action == "home")
{
    $bdd = connect_bdd();
    $donnees = show_dB($bdd);
    $template = "home_principale";
}

elseif (isset($action) && $action == "test" && isset($_POST['db_name']))
{
    $bdd = connect_bdd();
    create_dB($bdd,$_POST['db_name']);
    $donnees = show_dB($bdd);
    $template  = "home";
}
elseif (isset($action) && $action == "show")
{
    $bdd = connect_bdd();
    $donnees = show_dB($bdd);
    $result = show_tb($bdd,$_GET['bdd']);
    $template  = "home";
}

elseif (isset($action) && $action == "delete" && isset($_GET['bdd']))
{
    $bdd = connect_bdd();
    supp_dB($bdd, $_GET['bdd']);
    $donnees = show_dB($bdd);
    $template  = "home";
}

elseif (isset($action) && $action == "rename" && isset($_POST['db_name']))
{
    $bdd = connect_bdd();
    create_dB($bdd, $_POST['db_name']);
    supp_dB($bdd, $_GET['bdd']);
    $donnees = show_dB($bdd);
    $template = "home";
}

elseif (isset($action) && $action == "stat")
{
    $bdd = connect_bdd();
    $res = stats($bdd);
    $donnees = show_dB($bdd);
    $template = "home2";
}

elseif (isset($action) && $action == "add_table" && isset($_GET['bdd']))
{
    $bdd = connect_bdd();
    $donnees = show_dB($bdd);
    $template = "add_table";
}

elseif (isset($action) && $action == "create_tb")
{
    $bdd = connect_bdd();
    $donnees = show_dB($bdd);
    create_tb($bdd,$_POST['tb_name'],$_POST['nom_1'],$_POST['type_1'],$_POST['nom_2'],$_POST['type_2'],$_POST['nom_3'],$_POST['type_3']);
    $template = "home";
}

