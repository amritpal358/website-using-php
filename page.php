<?php
$str=filter_input(INPUT_POST,'str');
if(!empty($str)){
    $co=mysqli_connect("localhost","root","","mgdb");
}
if(isset($_POST['submit'])){
    $str=mysqli_real_escape_string($co,$_POST['str']);
    $sql="SELECT * FROM students_detail where Firstname like 
    '%$str%' or Lastname like '%$str%' or Class like '%$str%'";
    $res=mysqli_query($co,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            //echo '<pre>';
            //print_r($row);
            echo $row['Firstname'];
            echo "<br/>";
            echo $row['Lastname'];
            echo "<br/>";
            echo $row['Class'];
            echo "<br/>";
            echo $row['section'];
            echo "<br/>";
            echo $row['gender'];
            echo "<br/>";
            echo $row['grades'];
            echo "<br/>";
        }
        echo "Yes";
    }
    else{
        echo "No data found";
    }
}
?>