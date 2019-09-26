
<?php
require 'vendor/autoload.php';
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
    'Message' => 'Your Message',
    'PhoneNumber' => 'Your Phonenumber',
    'MessageAttributes' => ['AWS.SNS.SMS.SenderID' => [
         'DataType' => 'String',
         'StringValue' => 'WebNiraj'
      ]
  ]]);
	print_r( $result );
?>