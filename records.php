<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Book</title>
</head>
<body>
<style>
  *{box-sizing:border-box;}
  body{margin:0;background:rgba(35,208,197,1);}
  h1{text-align:center;}
  #records{text-align:center;}
  #records ul{
    margin: 0;
    padding: 0;
  }
  #records .head li{    
    background: black;
    color: #fff;
  }
  #records ul.head{
    font-weight: bold;
    text-transform: uppercase;
  }
  #records ul li{
    display: inline-block;
    padding: 10px;
    min-width: 20%;
    text-align:center;
    border: 1px solid #000;
    color: #fff;
    background: #47d03a;
    font-size:20px;
  }
  .fetchd{
    font-weight: bold;
    margin: 10px;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 20px;
    background: #8c5a46;
    cursor: pointer;
    color: #fff;
  }
  .pagination{text-align:center;}
</style>  
<?php
        echo "<h1>Contact Book</h1>";
        
        $db = mysqli_connect('localhost', 'root', '','test');

        if (!$db) {
            die('Could not connect: ' . mysqli_error());
        }

        $result = mysqli_query($db,"SELECT * FROM contact_book");
        $total_records=$result->num_rows;
        $limit=5;
        $page_numbers=ceil($total_records/$limit);
        $initial_recs = mysqli_query($db,"SELECT * FROM `contact_book` limit 5 offset 0");
?>

    <div id="records">
      <ul class="head">
        <li>Name</li>
        <li>Contact</li>
        <li>Email Id</li>
        <li>Address</li>
      </ul>
        <?php
          while($data = mysqli_fetch_array($initial_recs)) {
            ?>
            <ul>
              <li><?php echo $data['name'];?></li>
              <li><?php echo $data['contact_number'];?></li>
              <li><?php echo $data['email_id'];?></li>
              <li><?php echo $data['address'];?></li>
            </ul>
            <?php
          } 
        ?>
    </div>
    <div class="pagination">
    <?php
      for($i=1;$i<=$page_numbers;$i++){
          ?><input type="button" class="fetchd <?php if($i==1){echo 'active';} ?>" value=<?php echo $i; ?>><?php
      }
    ?>
    </div>
<script type="text/javascript">
  document.querySelectorAll('.fetchd').forEach(function(cls,inx){
    cls.addEventListener('click',function(event){
        current_value=cls.value;
        document.querySelectorAll('.fetchd').forEach(function(content){
          if(content.classList.contains("active")){
              content.classList.remove("active");
          }
          if(parseInt(content.value)===parseInt(current_value)){
              content.classList.add("active");
          }
        });
        limit_val=5;offset_value=(current_value-1)*limit_val;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var results=JSON.parse(this.responseText);
            var output='<ul class="head">';
            output+='<li>Name</li>';
            output+='<li>Contact</li>';
            output+='<li>Email Id</li>';
            output+='<li>Address</li></ul>';
            for(key in results){
              output += '<ul>';
              output += '<li>'+results[key]['name']+'</li>';
              output += '<li>'+results[key]['contact_number']+'</li>';
              output += '<li>'+results[key]['email_id']+'</li>';
              output += '<li>'+results[key]['address']+'</li>';
              output += '</ul>';
            }
            document.getElementById('records').innerHTML=output;     
          }
        };
        xhttp.open("GET", "db.php?limit="+limit_val+"&offset="+offset_value, true);
        xhttp.send();
    });
  });
</script>    
</body>
</html>