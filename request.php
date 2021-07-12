<?php

        $curl = curl_init();
        
        
        $fileContent = base64_encode(file_get_contents($_FILES['files']['tmp_name']));
        // $attach[]=array($_FILES['files']['name']=> "data:".$_FILES['files']['type']."".$fileContent);
        
        $mime = 'data:'.$_FILES['files']['type'].';';
        $attach[]=array($_FILES['files']['name'] => $mime.'base64,'.$fileContent);
        $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['mobile'],
                'subject' => $_POST['topic'],
                'topicId' => $_POST['topic'],
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
        echo $response;
        // echo $request;
        // echo $file;
?>