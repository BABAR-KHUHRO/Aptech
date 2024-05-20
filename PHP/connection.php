<?php 

$con = mysqli_connect("localhost","root","","fullstack");

// if($con){
//     echo "connected";
// }

$query = mysqli_query($con,"SELECT * FROM registers");

// var_dump($query)
// print_r()
foreach($query as $data){
    echo $data['id'] . $data['name'];
}
?>