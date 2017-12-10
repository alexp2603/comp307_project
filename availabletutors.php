
<html>


<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
 </head>

<?php

include("includes/header.php");
include("includes/head.html");

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
