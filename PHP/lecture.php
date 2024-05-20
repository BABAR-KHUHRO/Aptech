<?php 
/*
Arrays:
        Index Array
        Associative Array -> Object 
        Multi Dimensional Array


        LOOP
        1 For
        2 While
        3 Do While
        4 Foreach
*/
    // $age = 20;

    //     if($age > 17){
    //         echo "You Are Able To Vote";
    //     }else{
    //         echo "You Are Not Able To Vote";
    //     }

        // Index Array  -> Single Dimensional Array
    // $data = ["Abc","Abc@gmail.com",20];

    //     // echo $data[1]

    //     foreach($data as $value){
    //         echo $value;
    //     }



    // Multidimensional Index Array

    $data = [
        ["Abc","Abc@gmail.com",20],
        ["Ali","Ali@gmail.com",20],
        ["Ahmed","Ahmed@gmail.com",20],
        ["Faraz","Faraz@gmail.com",20]
    ];

        // echo $data[1]

        // foreach($data as $value){
        //    foreach($value as $newvalue){
        //         echo $newvalue;
        //    }
        // }

       // echo $data[2][0].$data[0][1];
            $count = 0;
        foreach($data as $value){
                if($count == 0){

                }else{
                    echo $value[0]."&nbsp;&nbsp;&nbsp;".$value[1].$value[2]."&nbsp;&nbsp;&nbsp;"."<br>";
                }
            $count++;
        }

// key => value


// $StudentData = ["Name"=>"Abc","Email"=> "Abc@gmail.com"];

// echo $data["email"];

// foreach($StudentData as $a){
//     echo $a;
// }


// Multi Dimensional Associate Array

$StudentData = [
    ["Name"=>"Abc","Email"=> "Abc@gmail.com","Password"=>"Abc123"],
    ["Name"=>"Ali","Email"=> "Ali@gmail.com","Password"=>"Ali123"],
    ["Name"=>"Ahmed","Email"=> "Ahmed@gmail.com","Password"=>"Abc123"],
    ["Name"=>"Majid","Email"=> "Majid@gmail.com","Password"=>"Abc123"]
];

$count = 0;
foreach($StudentData as $value){

    if($count == 2){
        echo $value["Email"]."<br>";
    }
 //else{
    //     echo $value["Name"].  $value["Email"]."<br>";
    // }
    $count++;
}
?>
