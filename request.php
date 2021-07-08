<?php

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://lsfs.co.in/taskmanager/api/http.php/tickets.json',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{"name": "John Doe",
                "email": "johndoe@lorem.com",
                "subject": "Lorem Ipsum",
                "topicId": "1",
                "message": "data:text/html,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lobortis sagittis turpis vel bibendum. Nunc eget tincidunt leo. Suspendisse a nibh vulputate, ultrices leo mollis, maximus nisl."

                }',
          CURLOPT_HTTPHEADER => array(
            'X-API-Key: 80C1F5C66E2F0B00E756BCA8D46C6DA8',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
?>