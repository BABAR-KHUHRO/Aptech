<?php 

$con=mysqli_connect("localhost","root","","task");
if($con){
    echo "connected"."<br>";


$query=mysqli_query($con,"SELECT * FROM admission");
var_dump($query);
echo "<br>";
// print_r()

foreach($query as $data){
    echo $data["std_name"]."<br>";
}

}
?>