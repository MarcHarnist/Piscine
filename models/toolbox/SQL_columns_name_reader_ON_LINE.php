<?php
$con=mysqli_connect("marcharnssmarc.mysql.db","marcharnssmarc","Bumiere753","marcharnssmarc");
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
    printf("Name: %s\n",$fieldinfo->name);
	echo "<br />";
    printf("max. Len: %d\n",$fieldinfo->max_length); //we can show other details: si footer
	echo "<br />";
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