<?php 
session_start();
// visualizzo il contenuto della pagina solo se è stato effettuato il login
if ($_SESSION['login'] === true) {

require 'config.php'; 

?>
<!DOCTYPE html>
<html lang="it">
<head>
	<title>Salco Italia - Lista commissioni</title>
	<meta charset="utf-8">
	<meta name="robots" content="index, follow" />
	
	<meta name="author" content="Matteo Currò - curromatteo@gmail.com">

	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="Project Name">
	<meta name="DC.subject" content="What you're about.">
	<meta name="DC.creator" content="Matteo Currò - curromatteo@gmail.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<?php
include_once('menu.php');
?>
	<div class="wrapper">
	<table class="clients">
		<tr>
		<th>ID</th>
		<th>Nome</th>
		<th>Data</th>
		<th></th>
		<th></th>
		<th></th>
		</tr>

<?php
// effettuo una query per recuperare i dati relativi ai clienti
	$clienti = query('SELECT * FROM clienti', array(), $conn);
	if ($clienti) {
		echo "<h2>Clienti</h2>";
		// ciclo il cliente
		foreach ($clienti as $cliente) {
			// print_r($cliente);
			?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['nome']; ?></td>
			<td><?php echo $cliente['data']; ?></td>
			<td><a class="button" href="single.php?id=<?php echo $cliente['id']; ?>">View</a></td>
			<td><a class="button" href="edit.php?id=<?php echo $cliente['id']; ?>">Edit</a></td>
			<td><a class="button red delete" href="delete.php?id=<?php echo $cliente['id']; ?>">Delete</a></td>
		</tr>
		<?php }
	} ?>
	</table>
	</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
// azioni all'invio del form
$('.delete').on('click', function (e) {
  e.preventDefault();
  var $this = $(this);
  // conferma
    if (confirm("Sei sicuro di voler eliminare l'elemento selezionato?")) {
	  // effettuo la chiamata ajax
	  $.ajax({
	      type: 'GET',
	      url: $this.attr('href'),
	      cache: false,
	      // traditional: true,
	      data: {
	        // commissioni: array_commissioni
	      },
	      success: function(data) {
	        $this.parent().parent('tr').fadeOut(400);
	         return false;
	      }
	  });
     }     
});
</script>
</body>

</html>
<?php
// fine verifica login
} else {
	header('LOCATION:login.php'); 
    die();
}
?>