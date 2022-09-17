<?php
$conn=new mysqli("localhost","root","","college_social_media_network");
if ($conn->connect_error) {
  die("Connection failure: " 
      . $conn->connect_error);
}
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
?>

<script>
  function confirmdel()
  {
    if(confirm("Are you sure want to delete this record?(Delected record cannot ge recovered)") == true)
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  </script>
//how to add two number in php?
