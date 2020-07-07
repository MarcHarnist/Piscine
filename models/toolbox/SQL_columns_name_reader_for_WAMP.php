
<h4>Après des heures et des jours de recherche en ligne: un code pour afficher les champs des colonnes sql: toolbox/SQL_columns_name_reader_for_WAMP (existe le même on line : faire un seul)</a> grâce à Dieu bien sûr et au site: <a href="https://www.w3schools.com/php/func_mysqli_fetch_field.asp">w3schools</a></h4>
<?php
$con=mysqli_connect("localhost","root","","ludacm");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM player ORDER BY id";

if ($result=mysqli_query($con,$sql))
  {
  // Get field information for all fields
  while ($fieldinfo=mysqli_fetch_field($result))
    {
    printf("Name: %s\n",$fieldinfo->name); // nom des champs !
	echo "<br />";
    printf("max. Len: %d\n",$fieldinfo->max_length);// largeur ! pour donne size aux input !
	echo "<br />"; // il faudra explorer ci-dessous les autres options: %d\n = ?
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);

/*Return Value:	Returns an object containing field definition information. FALSE if no info is available. The object has the following properties:
name - name of the column
orgname - original column name (if an alias is specified)
table - name of table
orgtable - original table name (if an alias is specified)
def - reserved for default values, currently always ""
db - database (new in PHP 5.3.6)
catalog - catalog name, always "def" (since PHP 5.3.6)
max_length - maximum width of field
length - width of field as specified in table definition
charsetnr - character set number for the field
flags - bit-flags for the field
type - data type used for the field
decimals - for integer fields; the number of decimals used
PHP Version:	5+
*/
?>