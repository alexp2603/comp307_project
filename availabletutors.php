<?php

include("includes/header.php");
include("includes/head.html");

?>

<html>


<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>
    <style type="text/css">
    .content {
        text-align: center;
    }
    </style>
 </head>




 <body>

  <br>
  <br>
  <br>
 	<h1 style="text-align: center;">Search for Class</h1>
    <div class="content">
    <form action="showavailabletutors.php" method="POST">
       <br>
             <input type="text" name="course" id="course" autocomplete="off">
             <div id="output"></div>
             <br>
             <input type="submit" value="Search for class">
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
