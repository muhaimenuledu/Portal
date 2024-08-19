<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    // $name = htmlspecialchars($_POST['name']);
    // $email = htmlspecialchars($_POST['email']);
    // $message = htmlspecialchars($_POST['message']);


    $name = htmlspecialchars($_POST['employee_name']);
    $email = htmlspecialchars($_POST['email_address']);
    $sales_department = htmlspecialchars($_POST['sales_department']);
    $date = htmlspecialchars($_POST['date']);
    $profile_name = htmlspecialchars($_POST['profile_name']);
    $client_user_id = htmlspecialchars($_POST['client_user_id']);
    $client_name = htmlspecialchars($_POST['client_name']);
    $order_number = htmlspecialchars($_POST['order_number']);
    $order_link = htmlspecialchars($_POST['order_link']);
    $remarks = htmlspecialchars($_POST['remarks']);
    $assigned_team = htmlspecialchars($_POST['assigned_team']);
    $order_status = htmlspecialchars($_POST['order_status']);
    $service_line = htmlspecialchars($_POST['service_line']);
    $delivered_by = htmlspecialchars($_POST['delivered_by']);
    $deli_date = htmlspecialchars($_POST['deli_date']);
    $deli_amount = htmlspecialchars($_POST['deli_amount']);
    $deadline = htmlspecialchars($_POST['deadline']);
    $platform_status = htmlspecialchars($_POST['platform_status']);
    
    // Prepare data to send to Odoo API
    // $data = array(
    //     "params" => array(
    //         "name" => $name,
    //         "email" => $email
    //     )
    // );

    // print_r($data);

    // Convert data to JSON
    // $json_data = json_encode($data);

    // Odoo API endpoint URL
    $url = 'http://localhost:8069/hww/customerSyncAPI/'; // Replace with your Odoo API endpoint

    $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'localhost:8069/hww/customerSyncAPI/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => '{
                "params":{
                            "name": "' . $name . '",
                            "email": "' . $email . '",
                            "sales_department": "' . $sales_department . '",
                            "date": "' . $date . '",
                            "profile_name": "' . $profile_name . '",
                            "client_user_id": "' . $client_user_id . '",
                            "client_name": "' . $client_name . '",
                            "order_number": "' . $order_number . '",
                            "order_link": "' . $order_link . '",
                            "remarks": "' . $remarks . '",
                            "assigned_team": "' . $assigned_team . '",
                            "order_status": "' . $order_status . '",
                            "service_line": "' . $service_line . '",
                            "delivered_by": "' . $delivered_by . '",
                            "deli_date": "' . $deli_date . '",
                            "deli_amount": "' . $deli_amount . '",
                            "deadline": "' . $deadline . '",
                            "platform_status": "' . $platform_status . '"
                        }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

    curl_close($curl);


// header("Location: http://lms.hww/"); 
header("Location: https://portal-e4dv.vercel.app/"); 
}
?>
