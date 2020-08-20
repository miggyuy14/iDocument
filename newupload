<body>

<div class="container">
<div class="span12">...</div>
    <div class="row-fluid">
    <div class="span4">
<!----- form ---->	
<form action="upload.php" method="post" enctype="multipart/form-data" name="upload">
<label> File</label>
<input name="uploaded_file" type="file" class="input-xlarge" required/>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<label>File Name</label>
<input type="text" name="fname" required>
<label> Description</label>
<textarea name="desc" cols="" rows="" class="input-xlarge" required></textarea>
<br/>
<input name="Upload" type="submit" value="Upload" class="btn btn-success btn-large" />
</form>
<!---- end form -->
</div>
    <div class="span8">
	
	    <table class="table table-bordered">

    <thead>
    <tr>
    <th>File Name</th>
    <th>Description</th>
    <th>Date Upload</th>
    </tr>
    </thead>
    <tbody>
	<?php $query=mysql_query("select * from up_files")or die(mysql_error());
while($row=mysql_fetch_array($query)){
	?>
    <tr>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['fdesc']; ?></td>
    <td><?php echo $row['fdatein']; ?></td>

    </tr>
	<?php } ?>
    </tbody>
    </table>
	
	</div>
    </div>




</div>
</body>
</html>