<?php
require 'vendor/autoload.php';
	$name=$_POST['Firstname'];
	$email=$_POST['Email'];
	$mobno=$_POST['MobileNo'];
	$gender=$_POST['Gender'];
	$sdk = new Aws\Sns\SnsClient([
		'region'  => 'ap-southeast-1',
		'version' => 'latest',
		'credentials' => ['key' => 'Your_Key', 'secret' => 'Your_Secret']
	]);
	$result1 = $sdk->SetSMSAttributes([
        'attributes' => [
            'DefaultSMSType' => 'Transactional',
        ],
    ]);
$result = $sdk->publish([
    'Message' => 'Hi '.$name.' '.$email.' '.$gender, // you can add your message in single quotes e.g. 'Hi this is my repo'.
    'PhoneNumber' => '+91'.$mobno, // you can try default mobile number e.g. '+919876543210'
    'MessageAttributes' => ['AWS.SNS.SMS.SenderID' => [
         'DataType' => 'String',
         'StringValue' => 'WebNiraj'
      ]
  ]]);
	print_r( $result );
?>
