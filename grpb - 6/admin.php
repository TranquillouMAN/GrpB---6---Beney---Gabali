<?php require_once "menu.php"; ?>
<?php 
if (!isset($_SESSION['user']) || $_SESSION['user']['admin']==0){
    header('location: index.php');
}
?>
<h1>Liste des Users</h1>
<?php
$sql = "SELECT * FROM user"; //votre requêtes SQL (vous savez faire maintenant héhé !)
$pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
$pre->execute();//on l'execute
$data = $pre->fetchAll(PDO::FETCH_ASSOC);// on stocke les données dans une variable (ici $data)
foreach($data as $user){
?>
<form method='post' action='action/delete_user.php'>
    <h2><?php echo $user['username'] ?></h2>
    <input type="hidden" value="<?php echo $user['id'] ?>" name="id">
    <input type='submit' value='suprimer' />
    </form>
<?php } ?>
