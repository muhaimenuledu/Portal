
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Prepare data to send to Odoo API
    $data = array(
        "params" => array(
            "name" => $name,
            "email" => $email
        )
    );

    // print_r($data);

    // Convert data to JSON
    $json_data = json_encode($data);

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
                            "email": "' . $email . '"

                        }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

    curl_close($curl);


header("Location: https://portal-e4dv.vercel.app/"); 
}
?>
