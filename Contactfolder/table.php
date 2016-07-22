<style type = "text/css"> table, th, td {border: 2px solid black}; </style>
<style type = "text/css"> table {width: 75%}; </style>
<style type = "text/css"> table {margin: 0 auto}; </style>
<style type = "text/css"> td {text-align: center}; </style>
<style type = "text/css"> tr:nth-child(even) {background-color: #f2f2f2}; </style>
<style type = "text/css"> div {height: 340px; width: 90%; background-color: lightgray}; </style>

<div style="overflow-x:auto;">
<?php
        // create a self populating table of users
  try {
  $con= new PDO('mysql:host=localhost;dbname=contact_form;port=3306',"root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM users";
 
  // gets the column names
  print "<table> \n";
  $result = $con->query($query);
      
  //return only the first row 
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print " <tr> \n";
  foreach ($row as $field => $value){
   print " <th>$field</th> \n";
  } 
  // end foreach
  print " </tr> \n";
      
  // query gets the data
  $data = $con->query($query);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   print " <tr> \n";
   foreach ($row as $name=>$value){
   print " <td>$value</td> \n";
   } // end field loop
   print " </tr> \n";
  } // end record loop
  print "</table> \n";
  } catch(PDOException $e) {
   echo 'ERROR: ' . $e->getMessage();
  } // end try
 ?>
</div>