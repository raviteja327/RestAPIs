<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> KALAI INFO LOGIC PRIVATE LIMITED -- NURTURING BETTER TECHNOLOGIES -</title>

    <meta name="Description" content="NURTURING BETTER TECHNOLOGIES, Fueling Your Innovative Imaginations">
    <meta name="Keywords" content="NURTURING, BETTER, TECHNOLOGIES, Kalai, info, logic, private, limited ,Fueling Your Innovative Imaginations, industrial,automation, software development, customised software development">

    <link rel="icon" href="https://www.kalai.info//assets/images/logo.png" type="image/png">
    <script src="https://kit.fontawesome.com/12e6170f51.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <script>
      // alert(but);
      $(document).ready(function() {
          
        $('.delete').click(function()
        {
          $('#Deletemodal').modal.show();
          $tr= $(this).closest('tr');
          var data=$tr.children("td").map(function()
          {
            return $(this).text();
          }).get();
          alert(data);
          $('#c_hash').val(data[0]);  
          // $('#c_hash').val(data[1]);  
        });
      });
    </script>

<script>
  $(document).ready(function(){
    $(".my_custome_list").addClass('animate__animated animate__bounceInLeft');
    $("#side_menu_list").click(function(){
      $(".my_custome_list").removeClass('animate__animated animate__bounceInLeft');
      $(".my_custome_list").addClass('animate__animated animate__bounceInLeft').toggle();
    });
  });
</script>
<style>
  .my_custome_list{
    display: none;
    position: fixed;
    width: 260px;
    height: 100vh;
    top: 60px;
    /* background: #212529; */
    /* z-index: 99999; */
    background: mintcream;
    overflow-x: hidden;
    
  }
  .accordion-flush .accordion-item:first-of-type .accordion-button{
    color: #151516;
  }
  ::-webkit-scrollbar .my_custome_list{
  width: 5px;
}
/* Track */
::-webkit-scrollbar-track .my_custome_list{
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb .my_custome_list{
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb .my_custome_list:hover  {
  background: red; 
}
</style>

</head>