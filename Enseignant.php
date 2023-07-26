<!DOCTYPE html public "// W3C//DTD html4.01 TRANSITIONAL//EN" />
<html>
<head>
    <title>Enseignant</title>
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
<br/>
<Form name="fEnseignant" action="Enseignant.php" method="POST">
    <table align="Center" >
<tr>
    <td><label for Matricule="Matricule">Matricule</label></td>
    <td><input name="txtMatricule" type="text" size="25" placeholder="Taper le Matricule ici svp"/></td>
</tr>
<tr>
    <td><label for Nom="Nom">Nom</label></td>
    <td><input name="txtNom" type="text" size="45" placeholder="Votre nom ici svp!"/></td>
</tr>
<tr>
    <td><label for PostNom="PostNom">PostNom</label></td>
    <td><input name="txtPostNom" type="text" size="45" placeholder="Votre PostNom ici svp!"/></td>
</tr>
<tr>
    <td><label for Prenom="Prenom">Prenom</label></td>
    <td><input name="txtPrenom" type="text" size="45" placeholder="Votre Prenom ici svp!"/></td>
</tr>
<tr>
    <td><label for Genre="Genre">Genre</label></td>
    <td><input name="rdGenre" type="radio" value="F" checked="checked"/>Feminin
    <input name="rdGenre" type="radio" value="M"/>Masculin</td>
</tr>
<tr>
    <td><label for Grade="Grade">Grade</label></td>
    <td><select name="cboGrade" >
        <option value="Ass1">ASSISTANT 1</option>
        <option value="Ass2">ASSISTANT 2</option>
        <option value="CT">CHEF DE TRAVAUX</option>
        <option value="PA">PROFESSEUR ASSOCIE</option>
        <option value="P">PROFESSEUR</option>
        <option value="PO">PROFESSEUR ORDINAIRE</option>
        <option value="PE">PROFESSEUR EMERITE</option>

    </select></td>
</tr>
<tr>
    <td><label for Domaine="Domaine">Domaine</label></td>
    <td><input name="txtDomaine" type="text" size="45" placeholder="Votre Domaine ici svp!"/></td>
</tr>
<tr>
    <td><label for Telephone="Telephone">Telephone</label></td>
    <td><input name="txtTelephone" type="text" size="45" placeholder="Votre Telephone ici svp!"/></td>
</tr>
<tr>
    <td>
        <input type="submit" name="btnEnvoi" value="Enregistrer"/>
        <input type="submit" name="btnModifier" value="Modifier"/>
    </td>
    <td>
    <input type="submit" name="btnSupprimer" value="Supprimer"/>
    <input type="reset" name="btnEffacer" value="Effacer"/>
    </td>
</tr>
    </table>
    <?php
    if(isset($_POST["btnEnvoi"])){
//Déclaration des variables
$Matricule=$_POST['txtMatricule'];
$Nom=$_POST['txtNom'];
$PostNom=$_POST['txtPostNom'];
$Prenom=$_POST['txtPrenom'];
$Genre=$_POST['rdGenre'];
$Grade=$_POST['cboGrade'];
$Domaine=$_POST['txtDomaine'];
$Telephone=$_POST['txtTelephone'];
//connexion au serveur
$Con=mysql_connect("localhost","G3InfoA2023","G3InfoA2023@");
// Select de la BD
mysql_select_db("dbGestionEnseignement",$Con);
// Requette SQL pour l'insertion des données
$req="insert into Enseignant values('$Matricule','$Nom','$PostNom','$Prenom','$Genre','$Grade','$Domaine','$Telephone')";
//Execution de la requête SQL
if(mysql_query($req,$Con)){
    echo"<h2> Enregistrement effectué avec succès</h2><br/>";
    echo"<h3> Vous venez d'enregistrer l'enseignant suivant:</h3><br/>";
    echo"<h3>Matricule:$Matricule</h3><br/>"; 
    echo"<h3>Nom:$Nom</h3><br/>";
    echo"<h3>PostNom:$PostNom</h3><br/>";
    echo"<h3>Prenom:$Prenom</h3><br/>";
    echo"<h3>Genre:$Genre</h3><br/>";
    echo"<h3>Grade:$Grade</h3><br/>";
    echo"<h3>Domaine:$Domaine</h3><br/>";
    echo"<h3>Telephone:$Telephone</h3><br/>";
    
    
}
else
{
    echo"<h2>Erreur d'Enregistrement </h2><br/>".mysql_error();   
}
mysql_close($Con);
    }
    // Programmation du bouton modifier
    if(isset($_POST["btnModifier"])){
        $Nom=$_POST['txtNom'];
        $PostNom=$_POST['txtPostNom'];
        $Prenom=$_POST['txtPrenom'];
        $Genre=$_POST['rdGenre'];
        $Grade=$_POST['cboGrade'];
        $Domaine=$_POST['txtDomaine'];
        $Telephone=$_POST['txtTelephone'];
    if(mysql_query($req,$Con)){
        echo"<h2> Modification effectuée avec succès</h2><br/>";
        echo"<h3> Vous venez de modifier l'enseignant suivant:</h3><br/>";
        echo"<h3>Matricule:$Matricule</h3><br/>"; 
        echo"<h3>Nom:$Nom</h3><br/>";
        echo"<h3>PostNom:$PostNom</h3><br/>";
        echo"<h3>Prenom:$Prenom</h3><br/>";
        echo"<h3>Genre:$Genre</h3><br/>";
        echo"<h3>Grade:$Grade</h3><br/>";
        echo"<h3>Domaine:$Domaine</h3><br/>";
        echo"<h3>Telephone:$Telephone</h3><br/>";
        
        
    }
    else
    {
        echo"<h2>Erreur de modification </h2><br/>".mysql_error();   
    }
    mysql_close($Con);
        }
        
        //Programmation du bouton supprimer
    if(isset($_POST["btnSupprimer"])){
        //Déclaration des variables
        $Matricule=$_POST['txtMatricule'];
        //connexion au serveur
        $Con=mysql_connect("localhost","G3InfoA2023","G3InfoA2023@");
        // Select de la BD
        mysql_select_db("dbGestionEnseignement",$Con);
        // Requette SQL pour l'insertion des données
        $req="delete from Enseignant WHERE Matricule='$Matricule'";
            //Execution de la requête SQL
        if(mysql_query($req,$Con)){
            echo"<h2> Suppression effectuée avec succès</h2><br/>";
            echo"<h3> Vous venez de supprimer le matricule suivant:</h3><br/>";
            echo"<h3>Matricule:$Matricule</h3><br/>"; 
        }
        else{
            echo"<h2>Erreur de suppression </h2><br/>".mysql_error();   
        }
        mysql_close($Con);
        }
    ?>
</Form>

        </div>
        <div class="Pied">
            copyright &copy by studiants of G3 computer science: <a href="mailto://saambililievin@gmail.com">Cliquer ici pour nous contacter</a>
        </div>
    </div>
  </div>  
</body>
</html>