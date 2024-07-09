<?php

    ///////////////////////////////////////////////////////////////////////////
 // SETUP DATA - GET DETAILS FROM ROUTER.CASPERCRM.COM
    $client = 'Amberlake';
    $cid = "4cc42405-ea85-4525-932d-249299cbe425";
    $product = "Ambarlake Campaign";
    //////////////////////////
    //////////////////////////
    $source = $_POST['source'] ? $_POST['source'] : '';
    $subsource = $_POST["sub_source"];
    $media = "Digital";
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    // FORM DATA
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["number"];
    $comment = $_POST["message"];
    $date = $_POST["date"];
    
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    // AUX INPUTS
    $aux_1 = '';
    $aux_2 = '';
    $aux_3 = '';
    $aux_4 = '';
    $aux_5 = '';
    $aux_6 = '';
    $aux_7 = '';
    $aux_8 = '';
    $aux_9 = '';
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    // VALIDATIONS
    if (empty($name))
     {
        // http_response_code(400);
        echo "Please enter Name.";
        exit;
     }
    
    // check Email
    // if (empty($email))
    // {
    //     http_response_code(400);
    //     echo "Please enter valid email id.";
    //     exit;
    // }
    // check Number
    // if (empty($phone))
    // {
    //     // http_response_code(400);
    //     echo "Please enter valid phone no.";
    //     exit;
    // }
    
    // if (strlen($phone) > 10)
    // {
    //     // http_response_code(400);
    //     echo "Please enter valid phone no.";
    //     exit;
    // }
    
    // if ( !preg_match('/^[0-9]{10}+$/', $phone))
    // {
    //     // http_response_code(400);
    //     echo "Please enter valid phone no.";
    //     exit;
    // }
    
    
    //////// DO NOT EDIT BELOW THIS LINE///////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    // UTM INCLUDES
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
        $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';
        $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
        $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
        $utm_placement = isset($_POST['utm_placement']) ? $_POST['utm_placement'] : '';
        $utm_term = isset($_POST['utm_term']) ? $_POST['utm_term'] : '';
        $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
        $ip = isset($_POST['ip']) ? $_POST['ip'] : '';
        $browser = isset($_POST['browser']) ? $_POST['browser'] : '';
        $os = isset($_POST['os']) ? $_POST['os'] : '';
        $gclid = isset($_POST['gclid']) ? $_POST['gclid'] : '';
        $device = isset($_POST['device']) ? $_POST['device'] : '';
        $url = isset($_POST['url']) ? $_POST['url'] : '';
    
    $formdata = array(
            'cid' => $cid,
            'client'=>$client,
            'product' => $product,
            'source' => $source,
            'subsource' => $subsource,
            'country_code' => $country_code,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'comment' => $comment,
            'media' => $media,
            'utm_source' => $utm_source,
            'utm_medium' => $utm_medium,
            'utm_campaign' => $utm_campaign,
            'utm_placement' => $utm_placement,
            'utm_term' => $utm_term,
            'utm_content' => $utm_content,
            'url' => $url,
            'gclid' => $gclid,
            'ip' => $ip,
            'os' => $os,
            'device' => $device,
            'browser' => $browser,
            'aux_1' => $aux_1,
            'aux_2' => $aux_2,
            'aux_3' => $aux_3,
            'aux_4' => $aux_4,
            'aux_5' => $aux_5,
            'aux_6' => $aux_6,
            'aux_7' => $aux_7,
            'aux_8' => $aux_8,
            'aux_9' => $aux_9,
            
            );
    
    // PUSH
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://router.volarlabs.com/api/addLead',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $formdata,
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    // CSV SAVE
    array_push($formdata,$date);
    $handle = fopen("leads.csv", "a");
    fputcsv($handle, $formdata); # $line is an array of strings (array|string[])
    fclose($handle);
         
    http_response_code(200);
    // header("Location: $url");
    // }
?>