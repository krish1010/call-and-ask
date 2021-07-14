<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins:wght@100;200;300;700&display=swap" rel="stylesheet">

    
        
    <title>Thank You 🙏</title>
</head>
<body>
    
    <div class="thank">
        <h1>Thank You !</h1>
    </div>
    <canvas id="canvas"></canvas>  
    <div class="text">
        <h2>We will reach out to you within 2 working days. 📨</h2>
    </div> 
    
    <br>
    <h2>Team LSFS</h2>
    <div class="home">
        <a href="index.html"><input type="button" value="Home &nbsp ▶" id="btn"></a>
    </div>

</body>
</html>
<style>
    body {
  margin: 0;
  width: 100vw;
	height: 86vh;
  position: relative;
  background: #fff;
}

h1{
    font-family: 'DM Serif Display', serif;
    font-size: 64px;
    text-align: center;
    color:#262626;
    margin-top: 100px;
    animation-name: popdown;
    animation-duration: 1s ;
    /* animation-iteration-count: infinite; */
}

h2{
    font-family: 'Poppins', sans-serif;
    font-size: 24px;
    font-weight:300;
    text-align: center;
    color:#262626;
}

.home{
    text-align: center;
    
}

#btn{
    position:relative;
    margin-top: 100px;
    background: linear-gradient(99.33deg, #ffa800 -11.07%, #ffc700 115.13%);
    cursor: pointer;
    color:#fff;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    border:none;
    border-radius: 5px;
    padding: 12px;
    transition: 0.4s;
    z-index: 99;
    opacity: 0.5;
}

#btn:hover{
    color:#fff;
    cursor: pointer;
    opacity: 1;
    
}


canvas {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
}

.title {
  position: absolute;
  margin: 0;
  width: 100vw;
  height: 100vh;

  font-family: 'Helvetica';
  line-height: 100vh;
  text-transform: uppercase;
  font-weight: lighter;
  color: #ccc;
  text-align: center;
}

/* @keyframes colorchange {
  0%   {color: #fff;}
  25%  {color: #df7823;}
  50%  {color: rgb(48, 233, 140);}
  100% {color: #019098;}
} */

@keyframes popdown {
    0% {transform:scale(0)}
    100% {transform:scale(1)}
}

@media all and (max-width: 480px){
    h1{
        font-size: 48px;
        
    }

    h2{
        font-size: 18px;
        font-weight: 300;
    }

    .text{
        margin: auto;
        width: 280px;
    }
    
    @keyframes popdown {
        0% {transform:scale(0)}
        100% {transform:scale(1)}
    }
}
</style>





<?php
        error_reporting(0);
        $curl = curl_init();
        
        
        $fileContent = base64_encode(file_get_contents($_FILES['files']['tmp_name']));
        // $attach[]=array($_FILES['files']['name']=> "data:".$_FILES['files']['type']."".$fileContent);
        $parts = $_POST['topic'];
        $arr = explode(':', $parts);
    
        $mime = 'data:'.$_FILES['files']['type'].';';
        $attach[]=array($_FILES['files']['name'] => $mime.'base64,'.$fileContent);
        $data = array(
                
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['mobile'],
                'subject' => $arr[0],
                'topicId' => $arr[1],
                'message'=> $_POST['message'],
                'attachments' => $attach
            );
        
        $request = json_encode($data);
        
      
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://lsfs.co.in/taskmanager/api/http.php/tickets.json',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $request,
          CURLOPT_HTTPHEADER => array(
            'X-API-Key: 80C1F5C66E2F0B00E756BCA8D46C6DA8',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        
        // echo $request;
        // echo $file;
        
        
?>