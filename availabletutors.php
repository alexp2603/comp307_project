
<html>


<head>
        <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

 </head>

<?php
    include("includes/header.php");
?>



 <body>
 <font size="6" style="font-family: 'Montserrat', sans-serif"><center>Search For a Class</center></font>
 

    <div class="content">
        <div class = "searchBar"><input type="text" name="course" id="course" autocomplete="off"></div>
    <form action="showavailabletutors.php" method="POST">
             <div id="output"></div>
             <br></br>
             <div class = "submit"> <input type="submit" value="Search for class"></div>
    </form>
    </div>

</body>

</html>

<script>
$(document).ready(function(){
    $('#course').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            $.ajax({
                url:"php/search.php",
                method: "POST",
                data: {query:query},
                success:function(data)
                {
                    $('#output').fadeIn();
                    $('#output').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){
        $('#course').val($(this).text());
        $('#output').fadeOut();
    });
});
</script>



<style>
#output ul{
    background-color:#eee;
    cursor:pointer;
}
#output li{
    padding:12px;
}

</style>

<?php

include("includes/footer.php");
?>
