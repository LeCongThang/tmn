<?php

function responseJSON($data=[],$success=true,$msg='SUCCESS',$code=200)
{
    return [
        'success'=>$success,
        'message'=>$msg,
        'code'=>$code,
        'data'=>$data
    ];
}

function responseJSON_EMPTY_OBJECT($success=true,$msg='SUCCESS',$code=200)
{
    return [
        'success'=>$success,
        'message'=>$msg,
        'code'=>$code,
        'data'=>new ArrayObject()
    ];
}

function responseJSON_NO_DATA($success=true,$msg='SUCCESS',$code=200)
{
    return [
        'success'=>$success,
        'message'=>$msg,
        'code'=>$code
    ];
}


function GGPushRequest($fields)
{
    $endpoint = env('GG_ENDPOINT', 'https://fcm.googleapis.com/fcm/send');
    $gg_api_access_key = env('GG_API_ACCESS_KEY','');

    $headers = array(
        'Content-Type' => 'application/json',
        'Authorization' => "key=$gg_api_access_key",
    );


    $client = new \GuzzleHttp\Client([
        'verify' => false,
        'headers' => $headers
    ]);

    $response = $client->post($endpoint,
        ['body' => json_encode($fields)]
    );
    return $response->getBody()->getContents();
}

function PushNotification($deviceToken = '', $title = "Tiêu đề", $body = "Nội dung", $badge = 1, $status = 88, $color = "#990000 ", $options = [])
{
    $msg =
        [
            'title' => $title,
            'body' => $body,
            'badge' => $badge,
            'sound' => 'default',
            'status' => $status,
            'color' => $color,
            'options' => $options
        ];
    $fields =
        [
            'to' => $deviceToken,
            'priority' => 'high',
            'data' => $msg
        ];

    $result = GGPushRequest($fields);
    return $result;
}

function PushNotificationMultiDeviceBase($deviceToken = [],$device_type=1,$title = "Tiêu đề", $body = "Nội dung", $status = 1, $color = "#990000", $options = [])
{
    $msg_name = $device_type ?  'data' : 'notification';
    $msg =
        [
            'title' => $title,
            'body' => $body,
            'sound' => 'default',
            'badge' => 1,
            'status' => $status,
            'color' => $color,
            'options' => $options
        ];
    $fields =
        [
            'registration_ids' => $deviceToken,
            'priority' => 'high',
            $msg_name => $msg
        ];
    $result = GGPushRequest($fields);
    return $result;
}

function PushNotificationMultiDevice($user_device = [],$title = "Tiêu đề", $body = "Nội dung", $status = 1, $color = "#990000", $options = [])
{
    $deviceTokenIOS = [];
    $deviceTokenAndroid = [];
    foreach ($user_device as $item)
    {
        if($item->client)
            $deviceTokenAndroid[] = $item->device_token;
        else
            $deviceTokenIOS[] = $item->device_token;
    }
    if(count($deviceTokenIOS))
        PushNotificationMultiDeviceBase($deviceTokenIOS,0,$title,$body,$status,$color,$options);
    if(count($deviceTokenAndroid))
        PushNotificationMultiDeviceBase($deviceTokenAndroid,1,$title,$body,$status,$color,$options);
}

function PushNotificationForUserMultiDevice($users = [],$title = "Tiêu đề", $body = "Nội dung", $status = 1, $color = "#990000", $options = [])
{
    $user_device_arr = [];
    foreach ($users as $user)
    {
        foreach ($user->user_device as $item)
        {
            if(!in_array($item,$user_device_arr))
                $user_device_arr[] = $item;
        }
    }
    PushNotificationMultiDevice($user_device_arr,$title,$body,$status,$color,$options);
}


function ImageObject($name,$file_path)
{
    $image_path = $file_path.'/'.$name;
    $width = $height = 0;
    $link = '';
    if(!empty($name) && file_exists(public_path('/'.$image_path)))
    {
        $size = getimagesize($image_path);
        $width = $size[0];
        $height = $size[1];
        $link = asset($image_path);
    }
    return [
        'width'=>$width,
        'height'=>$height,
        'name'=>$name,
        'link'=>$link
    ];
}

function AddressObject($name,$coordinate=[0,0])
{
    return [
        'name'=>$name,
        'coordinates'=>[
            'lat'=>$coordinate[0],
            'lng'=>$coordinate[1],
        ]
    ];
}

function DateTimeObject($date)
{
    return Date2String($date,'Y-m-d H:i:s');
}