<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/style.css"/> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>BANK</title>
   <style>
    body{
    text-align:center;
}


   </style>
</head>
<body class="body">
    <div class = "form_wrapper">
        <h3>ENTER BANK IFSC CODE</h3>
        <hr color="black">
    <form action="" method="post">
        <input type="text" name='ifsc' id="ifsc_code" required >
        <button type="button"  id="search">SUBMIT</button>
        <hr color="black">
        <span><h6 id="msg"></h6></span>
    </form>
     </div>
    <div class="row" id="bank_details" style="display:block">
        <h1>Bank Details</h1>
    <div class="table-responsive ">
        <table class="table table-bordered " >
            <tr>
                <td width="20%" align="left"><b>BANK</b></td>
                <td width="60%" ><span id="bank"></span></td>
            </tr>
            <tr>
                <td width="20%" align="left"><b>BRANCH</b></td>
                <td width="60%" ><span id="branch"></span></td>
            </tr>
            <tr>
                <td width="20%" align="left"><b>ADDRESS</b></td>
                <td width="60%" ><span id="address"></span></td>
            </tr>
            <tr>
                <td width="20%" align="left"><b>CITY</b></td>
                <td width="60%" ><span id="city"></span></td>
            </tr>
            <tr>
                <td width="20%" align="left"><b>DISTRICT</b></td>
                <td width="60%" ><span id="district"></span></td>
            </tr>
            <tr>
                <td width="20%" align="left"><b>CONTACT</b></td>
                <td width="60%" ><span id="contact"></span></td>
            </tr>
            <tr>
                <td width="20%" align="left"><b>BANKCODE</b></td>
                <td width="60%" ><span id="bankcode"></span></td>
            </tr>
        </table>
        </div>
        </div>
    </div>
    <script>
       $(document).ready(function(){
       $('#search').click(function(){
        var id=$('#ifsc_code').val();
          if(id !=""){
            $("#msg").html("");
            $.ajax({
                  url:"ifsc_get.php",
                  method:"POST",
                  data:{ifsc:id},
                  success:function(data){
                     if(data=="INVALID BANK IFSC CODE"){
                        $("#msg").html("INVALID BANK IFSC CODE"); 
                        $("#bank").html("");
                        $("#branch").html("");
                        $("#address").html("");
                        $("#city").html("");
                        $("#district").html("");
                        $("#contact").html("");
                        $("#bankcode").html(""); 
                     }else{
                      var array = data.split("^^");
                     // $("#bank_details").css("display","block");
                      $("#bank").html(array[0]);
                      $("#branch").html(array[1]);
                      $("#address").html(array[2]);
                      $("#city").html(array[3]);
                      $("#district").html(array[4]);
                      $("#contact").html(array[5]);
                      $("#bankcode").html(array[6]);
                     }
                  }

            });
          } else{
                  $("#msg").html("Please Enter IFSC Code");
          }    
       
       });
    });
    </script>
</body>
</html>