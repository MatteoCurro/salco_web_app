<?php
session_start();
// visualizzo il contenuto della pagina solo se è stato effettuato il login
if ($_SESSION['login'] === true) {
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<title>Salco Italia - Aggiungi commissione</title>
	<meta charset="utf-8">
	<meta name="robots" content="index, follow" />
	
	<meta name="author" content="Matteo Currò - curromatteo@gmail.com">

	<!-- Dblin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="Project Name">
	<meta name="DC.subject" content="What you're about.">
	<meta name="DC.creator" content="Matteo Currò - curromatteo@gmail.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" href="css/style.css">

	<!-- <link rel="stylesheet" href="css/style.css"> -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>

<?php
include_once('menu.php');
?>

<div class="wrapper">

<h1>Aggiungi commissione</h1>
<form id="copia_commissione" action="process.php" method="POST">
<fieldset class="normale">
  <legend>Cliente</legend>
  <ol>
    <li>
      <label for="name">Cliente / Buyer</label>
      <input id="name" name="name" type="text" placeholder="First and last name" autofocus>
    </li>
    <li>
      <label for="indirizzo">Indirizzo / Address</label>
      <input id="indirizzo" name="indirizzo" type="text" placeholder="Via Roma 123">
    </li>
    <li>
      <label for="tel">Telefono</label>
      <input id="tel" name="tel" type="text" placeholder="Eg. +39 04220000000">
    </li>
    <li>
      <label for="fax">Fax</label>
      <input id="fax" name="fax" type="text" placeholder="Eg. +39 04220000000">
    </li>
    <li>
      <label for="piva">P.IVA</label>
      <input id="piva" name="piva" type="text" placeholder="Eg. 1234567890">
    </li>
  </ol>
</fieldset>
 
<fieldset class="normale">
  <legend>Ordine</legend>
  <ol>
    <li>
      <label for="spedizione_mezzo">Spedizione a Mezzo / Delivery Throught</label>
      <input id="spedizione_mezzo" name="spedizione_mezzo" type="text" placeholder="">
    </li>
    <li>
      <label for="pagamento">Pagamento / Payment</label>
      <input id="pagamento" name="pagamento" type="text" placeholder="Eg. Bonifico">
    </li>
    <li>
      <label for="banca">Banca / Bank</label>
      <input id="banca" name="banca" type="text" placeholder="Eg. Unicredit Banca - via Roma 123, Milano (MI)">
    </li>
    <li>
      <label for="abi">ABI</label>
      <input id="abi" name="abi" type="text" placeholder="Eg. 1234">
    </li>
    <li>
      <label for="cab">CAB</label>
      <input id="cab" name="cab" type="text" placeholder="Eg. 12345">
    </li>
    <li>
      <label for="porto">Porto / Carriage</label>
      <input id="porto" name="porto" type="text" placeholder="Eg. Genova">
    </li>
    <li>
      <label for="consegna_decorrenza">Consegna anticipata / Con decorrenza</label>
      <input id="consegna_decorrenza" name="consegna_decorrenza" type="text" placeholder="Eg. Maggio 2014">
    </li>
  </ol>
</fieldset>
 
<fieldset class="normale">
  <legend>Altro</legend>
  <ol>
    <li>
      <label for="agente">Agente / Agent</label>
      <input id="agente" name="agente" type="text" placeholder="">
    </li>
    <li>
      <label for="note">Notes</label>
      <textarea id="note" name="note" type="text" placeholder=""></textarea>
    </li>
    <li>
      <label for="data">Data</label>
      <input id="data" name="data" type="date" placeholder="">
    </li>
    <li>
      <label for="numero">N</label>
      <input id="numero" name="numero" type="text" placeholder="">
    </li>
  </ol>
</fieldset>

<fieldset class="commissioni">
  <legend>Commissione</legend>
  <ol class="clonedSection commissione" id="commissione_1">
    <li>
      <label for="modello">Modello / Model</label>
      <input id="modello" name="modello" type="text" placeholder="">
    </li>
    <li>
      <label for="tessuto">Tessuto / Fabric</label>
      <input id="tessuto" name="tessuto" type="text" placeholder="">
    </li>
    <li>
      <label for="colore">Colore / Colour</label>
      <input id="colore" name="colore" type="text" placeholder="">
    </li>
    <li>
      <label for="misura">Misura / Size</label>
      <select name="misura" >
        <option value="38" selected="selected">38</option>
        <option value="40">40</option>
        <option value="42">42</option>
        <option value="44">44</option>
        <option value="46">46</option>
        <option value="48">48</option>
        <option value="50">50</option>
        <option value="52">52</option>
        <option value="54">54</option>
      </select>
    </li>
    <li>
      <label for="totale">Totate / Total</label>
      <input id="totale" name="totale" type="text" placeholder="">
    </li>
    <li>
      <label for="prezzo">Prezzo / Price &euro;</label>
      <input id="prezzo" name="prezzo" type="text" placeholder="1000.00">
    </li>
  </ol>
  
</fieldset>
<div class="footer_nav">
  <button id="btnAdd">Aggiungi Elemento</button>
  <br><br>
  <button type="submit">Invia</button>
</div>

</form>	
</div> <!--fine wrapper-->
<div class="risultato"></div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
// $('#copia_commissione').on('submit', function(e) {
//     //prevent the default submithandling
//     e.preventDefault();
//     //send the data of 'this' (the matched form) to yourURL
//     $.ajax(
//       type: 'POST',
//       url: 'process.php', $(this).serialize());
// });

// $('.test').on('click', function() {
//         var array_commissioni = new Array();
//         // $('#copia_commissione').serializeObject();
//         $(".commissione").each(function(){
//             array_commissioni.push( $(this).find('input, select').serializeArray() );
//         });
//         console.log(array_commissioni);
// });


// console.log(array_commissioni);

// azioni all'invio del form
$('#copia_commissione').on('submit', function (e) {
  e.preventDefault();
  // creo nuovo array per i dati delle commissioni
  var array_commissioni = new Array();
  array_commissioni[0] = new Array();
  // ciclo le commizzioni e le aggiungo all'array
  $(".commissione").each(function(){
      array_commissioni[0].push( $(this).find('input, select').serializeArray() );
  });

  $(".normale").each(function(){
      array_commissioni.push( $(this).find('input, select, textarea').serializeArray() );
  });
  



  // effettuo la chiamata ajax
  $.ajax({
      type: 'POST',
      url: $('#copia_commissione').attr('action'),
      cache: false,
      // traditional: true,
      data: {
        commissioni: array_commissioni
      },
      success: function(data) {
        // $('.risultato').html(data);
         
        $('.wrapper').fadeOut(400,function() {
          $(window).scrollTop(0);
          // $(this).html(data).fadeIn(400);
          window.location.href = 'index.php';
        });
         return false;
      }
  });
        
});



var newNum = 0;
$('#btnAdd').click(function (e) {
        e.preventDefault();
        
        newNum++;

        $('.commissioni').append('<ol id="commissione_'+newNum+'" class="commissione"><a href="#" class="remove_element">Rimuovi</a><li>'+
      '<label for="modello_'+newNum+'">Modello / Model</label>'+
      '<input id="modello_'+newNum+'" name="modello_'+newNum+'" type="text" placeholder="">'+
    '</li>'+
    '<li>'+
      '<label for="tessuto_'+newNum+'">Tessuto / Fabric</label>'+
      '<input id="tessuto_'+newNum+'" name="tessuto_'+newNum+'" type="text" placeholder="">'+
    '</li>'+
    '<li>'+
      '<label for="colore_'+newNum+'">Colore / Colour</label>'+
      '<input id="colore_'+newNum+'" name="colore_'+newNum+'" type="text" placeholder="">'+
    '</li>'+
    '<li>'+
      '<label for="misura_'+newNum+'">Misura / Size</label>'+
      '<select name="misura_'+newNum+'" >'+
        '<option value="38" selected="selected">38</option>'+
        '<option value="40">40</option>'+
        '<option value="42">42</option>'+
        '<option value="44">44</option>'+
        '<option value="46">46</option>'+
        '<option value="48">48</option>'+
        '<option value="50">50</option>'+
        '<option value="52">52</option>'+
        '<option value="54">54</option>'+
      '</select>'+
    '</li>'+
    '<li>'+
      '<label for="totale_'+newNum+'">Totate / Total</label>'+
      '<input id="totale_'+newNum+'" name="totale_'+newNum+'" type="text" placeholder="">'+
    '</li>'+
    '<li>'+
      '<label for="prezzo_'+newNum+'">Prezzo / Price</label>'+
      '&euro;<input id="prezzo_'+newNum+'" name="prezzo_'+newNum+'" type="text" placeholder="1000.00">'+
    '</li>'+
  '</ol>');
        
        $('.remove_element').on('click', function(e) {
          e.preventDefault();
          $(this).parent('ol').fadeOut(400, function() {
            $(this).remove();
          })
        });

        // if (newNum == 5) $('#btnAdd').prop('disabled', 'disabled');
    });
</script>

</body>

</html>

<?php
// fine verifica login
} else {
  // die();
  header('LOCATION:login.php'); 
    die();
}
?>