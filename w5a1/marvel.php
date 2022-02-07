<html>
 	<head>
 		<genre>Marvel Movie List</genre>
 	</head>
 	<body>
 <?php
 mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("db") or die(mysql_error()); 


$number = $_GET['number'];
$genre = $_GET['genre'];
$title = $_GET['title'];
$actor = $_GET['actor'];
$id = $_GET['id'];
$self = $_SERVER['PHP_SELF'];


if ( $number=="add") 
 {
 Print '<h2>Add Movie</h2>
 <p> 
 <form action=';
 echo $self; 
 Print '
 method=GET> 
 <table>
 <tr><td>genre:</td><td><input type="text" genre="genre" /></td></tr> 
 <tr><td>title:</td><td><input type="text" genre="title" /></td></tr> 
 <tr><td>actor:</td><td><input type="text" genre="actor" /></td></tr> 
 <tr><td colspan="2" align="center"><input type="submit" /></td></tr> 
 <input type=hidden genre=number value=added>
 </table> 
 </form> <p>';
 } 

 if ( $number=="added") 
 {
 mysql_query ("INSERT INTO moviename (genre, title, actor) VALUES ('$genre', '$title', '$actor')");
 }

 if ( $number=="edit") 
 { 
 Print '<h2>Edit Contact</h2> 
 <p> 
 <form action=';
 echo $self; 
 Print '
 method=GET> 
 <table> 
 <tr><td>genre:</td><td><input type="text" value="'; 
 Print $genre; 
 print '" genre="genre" /></td></tr> 
 <tr><td>title:</td><td><input type="text" value="'; 
 Print $title; 
 print '" genre="title" /></td></tr> 
 <tr><td>actor:</td><td><input type="text" value="'; 
 Print $actor; 
 print '" genre="actor" /></td></tr> 
 <tr><td colspan="2" align="center"><input type="submit" /></td></tr> 
 <input type=hidden genre=number value=edited> 
 <input type=hidden genre=id value='; 
 Print $id; 
 print '> 
 </table> 
 </form> <p>'; 
 } 

 if ( $number=="edited") 
 { 
 mysql_query ("UPDATE moviename SET genre = '$genre', title = '$title', actor = '$actor' WHERE id = $id"); 
 Print "Data Updated!<p>"; 
 } 

if ( $number=="remove") 
 {
 mysql_query ("DELETE FROM moviename where id=$id");
 Print "Entry has been removed <p>";
 }


 $data = mysql_query("SELECT * FROM moviename ORDER BY genre ASC") 
 or die(mysql_error()); 
 Print "<h2>Marvle Movie List</h2><p>"; 
 Print "<table border cellpadding=3>"; 
 Print "<tr><th width=100>genre</th><th width=100>title</th><th width=200>actor</th><th width=100 colspan=2>Admin</th></tr>"; Print "<td colspan=5 align=right><a href=" .$_SERVER['PHP_SELF']. "?number=add>Add Contact</a></td>"; 
 while($info = mysql_fetch_array( $data )) 
 { 
 Print "<tr><td>".$info['genre'] . "</td> "; 
 Print "<td>".$info['title'] . "</td> "; 
 Print "<td> <a href=mailto:".$info['actor'] . ">" .$info['actor'] . "</a></td>"; 
 Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&genre=" . $info['genre'] . "&title=" . $info['title'] ."&actor=" . $info['actor'] . "&number=edit>Edit</a></td>"; Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&number=remove>Remove</a></td></tr>"; 
 } 
 Print "</table>"; 
 ?> 

<p>


 	</body> 
 </html> 