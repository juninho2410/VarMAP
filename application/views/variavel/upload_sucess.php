<html>
<head>
<title>Upload Form</title>
</head>
<body>


<?php if($notfound!=null || $notfound == ""):?>
<h3>As vari�veis n�o encontradas s�o:</h3>
<ul>
<?php foreach($notfound as $item):?>
<li><?php echo $item;?> </li>
<?endforeach;?>
</ul>

<?php endif;?>
<h3>As vari�veis encontradas s�o:</h3>
<table>
<tr>
	<th>ID</th>
	<th>NOME</th>
	<th>Descri��o Portugu�s</th>
	<th>Descri��o Ingl�s</th>
	<th>Book</th>
</tr>
	
<?php foreach($variable as $item):?>
<tr>
<td><?php echo $item['ID'];?> </td>
<td><?php echo $item['NOME'];?> </td>
<td><?php echo $item['DESCRICAO_PORTUGUES'];?> </td>
<td><?php echo $item['DESCRICAO_INGLES'];?> </td>
<td><?php echo $item['BOOK_ID'];?> </td>

<?endforeach;?>

</tr>
</table>

<p><?php echo anchor('consulta', 'Upload Another File!'); ?></p>

</body>
</html>