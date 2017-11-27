<?php

$connect = mysqli_connect('localhost','root','','tutor');

if(isset($_POST["query"]))
{
    $output = '';
    $query = "SELECT * FROM courses WHERE COURSE_ID LIKE '%".$_POST["query"]."%'";
    $result = mysqli_query($connect,$query);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .='<li>'.$row['COURSE_ID'].'</li>';
        }
    }
    else
    {
        $output .= '<li>Course not found</li>';
    }

    $output.='</ul>';
    echo $output;
}

?>