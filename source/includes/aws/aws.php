<?php 

	require_once("cred.php");

	if(isset($_REQUEST['cred']['s3k']) && isset($_REQUEST['cred']['s3s'])){
		$key = base64_decode($_REQUEST['cred']['s3k']);
		$secret = base64_decode($_REQUEST['cred']['s3s']);
	}

	if(IsNullOrEmpty($key) || IsNullOrEmpty($secret)) exit("AWS credentails missing!");

    require 'aws-autoloader.php';

    use Aws\S3\S3Client;  
    use Aws\Exception\AwsException;

	$bucket = isset($_REQUEST['bucket']) ? $_REQUEST['bucket'] : null;
	$object_key = isset($_REQUEST['object_key']) ? $_REQUEST['object_key'] : null;
	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
	$expire = isset($_REQUEST['expire']) ? $_REQUEST['expire'] : null;
	$region = isset($_REQUEST['region']) ? $_REQUEST['region'] : 'us-east-1';

	if($action == 'get_url'){

		getObjectUrl($key, $secret, $bucket, $object_key, $expire, $region);

	}else if($action == 'get_url_thumb'){

		getObjectUrl2($key, $secret, $bucket, $object_key, $expire, $region);

	}else if($action == 'list_bucket'){

		listObject($key, $secret, $bucket, $region);

	}

	function getObjectUrl($key, $secret, $bucket, $object_key, $expire, $region){

		$s3Client = new Aws\S3\S3Client([
		    /*'profile' => 'default',*/
		    'region'  => $region,
		    'version' => 'latest',
		    'credentials' => array(
			    'key' => $key,
			    'secret'  => $secret,
			  )
		]);

		$cmd = $s3Client->getCommand('GetObject', [
		    'Bucket' => $bucket,
		    'Key'    => $object_key
		]);

		$request = $s3Client->createPresignedRequest($cmd, $expire);
		$presignedUrl = (string) $request->getUri();

		echo json_encode($presignedUrl);
		exit;

	}

	function getObjectUrl2($key, $secret, $bucket, $object_key, $expire, $region){

		$s3Client = new Aws\S3\S3Client([
		    /*'profile' => 'default',*/
		    'region'  => $region,
		    'version' => 'latest',
		    'credentials' => array(
			    'key' => $key,
			    'secret'  => $secret,
			  )
		]);

		$cmd = $s3Client->getCommand('GetObject', [
		    'Bucket' => $bucket,
		    'Key'    => $object_key
		]);

		$request = $s3Client->createPresignedRequest($cmd, $expire);
		$presignedUrl = (string) $request->getUri();

		echo json_encode($presignedUrl);
		exit;

	}
		  
	function listObject($key, $secret, $bucket, $region){

		$s3 = new S3Client([
		    'version' => 'latest',
		    'region'  => $region,
		    'credentials' => array(
			    'key' => $key,
			    'secret'  => $secret,
			 )
		]);

		$data = array();

		// Use the high-level iterators (returns ALL of your objects).
		try {
		    $results = $s3->getPaginator('ListObjects', [
		        'Bucket' => $bucket,
		        'Delimiter' => '/'
		    ]);

		    foreach ($results as $result) {
		        foreach ($result['Contents'] as $object) {
		            $data[] = $object['Key'];
		        }
		    }

			echo json_encode($data);
			exit;

		} catch (S3Exception $e) {
		    echo $e->getMessage() . PHP_EOL;
		}

		// Use the plain API (returns ONLY up to 1000 of your objects).
		/*
		try {
		    $objects = $s3->listObjects([
		        'Bucket' => $bucket
		    ]);
		    foreach ($objects['Contents']  as $object) {
		        echo $object['Key'] . PHP_EOL;
		    }
		} catch (S3Exception $e) {
		    echo $e->getMessage() . PHP_EOL;
		}*/

	}

	function IsNullOrEmpty($v){
		return (!isset($v) || trim($v)==='');
	}

?>