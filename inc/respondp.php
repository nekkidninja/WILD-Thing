<form action="../Functions/resprop.php" method="post" enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" /> 
	<input type="hidden" name="id" value=<?= $id ?>" />
	<br />
	<input type="submit" name="submit" value="Submit" />
</form>
