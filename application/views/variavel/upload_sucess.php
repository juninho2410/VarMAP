<html>
<head>
<title>Upload Form</title>
</head>
<body>


<?php if($notfound!=null || $notfound == ""):?>
<h3>As variáveis não encontradas são:</h3>
<ul>
<?php foreach($notfound as $item):?>
<li><?php echo $item;?> </li>
<?endforeach;?>
</ul>

<?php endif;?>
<h3>As variáveis encontradas são:</h3>
<table>
<tr>
	<th>ID</th>
	<th>NOME</th>
	<th>Descrição Português</th>
	<th>Descrição Inglês</th>
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