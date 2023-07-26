<!DOCTYPE html public "// W3C//DTD html4.01 TRANSITIONAL//EN" />
<html>
<head>
    <title>connexion</title>
    <meta name="author" content="etudiants de G3 info/A">
    <meta name="keywords" content="cours,Etudiant,enseignement,isc-Goma">
    <meta charset="UTF-8" />
    <LInk rel="Stylesheet"href="STYLE.css" type="text/css"></LInk>
</head>
<body>
  <div id="ma_page">
    <div id="contenu">
        <div class="Haut">
            <img src="IMAGE/LOGOISC.jpg" alt="Mon logo" width="10%" height="48%" align="left">

            <img src="IMAGE/bango.jpg" alt="Mon logo" width="79%" height="65" align="center"> 

            <img src="IMAGE/LOGOISC.jpg" alt="Mon logo" width="10%" height="48%" align="right">
            <br/>
            <hr size="10" color="Green">
            <a href="Accueil.Html" title="Aller a la page d'acceuil svp! ">Accueil</a>
            <a href="Historique.Html" title="Aller a la page Historique svp! ">Historique</a>
            <a href="Activités.Html" title="Aller a la page d' Activités svp! ">Activités</a>
            <a href="Contacts.Html" title="Aller  nous Contacter svp! ">Contacts</a>
            <hr size="10" color="Green">
        </div>
        <div class="Milieu5">
           <?php
           // chaine de connexion
           $Con=mysql_connect("localhost","G3InfoA2023","G3InfoA2023@");
           //Test de la connexion
           if (!$Con){
            echo "<h2> Erreur de la connexion</h2>".mysql_error();
           }
           else
           {
            echo"<h2> connexion bien etablie</h2><br/>";

           }
           // Creation de la BD
           $BD ="CREATE DATABASE dbGestionEnseignement";
           if (mysql_query($BD,$Con)){
            echo "<h2> la BD créée avec succes</h2><br/>";
           }
           else
           {
            echo "<h2> Erreur de création de la BD</h2><br/>".mysql_error();
           }
           // Selection de la BD
           mysql_select_db("dbGestionEnseignement",$Con);
           // Creation des tables
           $t1="Create table Enseignant(
          Matricule varchar(8) not null primary key,
           Nom varchar(25) not null,
           Postnom varchar(25) not null,
           Prenom varchar(25) not null,
           Genre char(1) not null,
           Grade varchar(20) not null,
           Domaine varchar(40) not null,
           Telephone varchar(13) not null)ENGINE=InnoDB";

           $t2="Create table Etudiant(
           IdEtudiant varchar(6) not null primary key ,
           NomEt varchar(25) not null,
           PostnomEt varchar(25) not null,
           PrenomEt varchar(25) not null,
           GenreEt char(1) not null,
           Datenaiss date not null,
           Lieunaiss varchar(20) not null)ENGINE=InnoDB";

          $t3="Create table Cours(
          IdCours varchar(4) not null primary key,
          Matricule varchar(8) not null,
          Designation varchar(60) not null,
          Categorie varchar(20) not null,
          FOREIGN KEY(Matricule) references Enseignant(Matricule))ENGINE=InnoDB";

          $t4="Create table Suivre(
          IdSuivre int not null AUTO_INCREMENT primary key,
          IdEtudiant varchar(6) not null,
          IdCours varchar(4) not null,
          AnneeAcad varchar(10) not null,
          Volhoraire int not null,
          Promotion varchar(5) not null,
          FOREIGN KEY(IdEtudiant) references Etudiant (IdEtudiant),
          FOREIGN KEY(IdCours) references Cours(IdCours))ENGINE=InnoDB";
          // Execution des tables
          if (mysql_query($t1,$Con)) {
            echo"<h2> La table Enseignant crée avec sucées</h2><br/>";
          
          }else
          {
            echo"<h2> Erreur lors de la creation de table Enseignant</h2><br/>".mysql_error();
          }
           if (mysql_query($t2,$Con)) {
            echo"<h2> La table Etudiant crée avec sucées</h2><br/>";
          
          }else
          {
            echo"<h2> Erreur lors de la creation de table Etudiant</h2><br/>".mysql_error();
          }
           if (mysql_query($t3,$Con)) {
            echo"<h2> La table Cours crée avec sucées</h2><br/>";
          
          }else
          {
            echo"<h2> Erreur lors de la creation de table Cours</h2><br/>".mysql_error();
          }
           if (mysql_query($t4,$Con)) {
            echo"<h2> La table Suivre crée avec sucées</h2><br/>";
          
          }else
          {
            echo"<h2> Erreur lors de la creation de table Suivre</h2><br/>".mysql_error();
          }
          // Fermeture de la connexion
          mysql_close();
          ?>

        </div>
        <div class="Pied">
            copyright &copy by studiants of G3 computer science: <a href="mailto://saambililievin@gmail.com">Cliquer ici pour nous contacter</a>
        </div>
    </div>
  </div>  
</body>
</html>