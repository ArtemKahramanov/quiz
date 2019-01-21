<?php
//var_dump($_POST);

//$method = $_SERVER['REQUEST_METHOD'];
//$project_name = 'BBS';
////Script Foreach
//$c = true;
//if ( $method === 'POST' ) {
//
//	// $project_name = trim($_POST["data"]);
//	$admin_email  = 'test@mail.ru';
//	$form_subject = 'Данные квиза';
//
//	foreach ( $_POST as $key => $value ) {
//		if (!empty($value)) {
//			$message .= "
//			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
//				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
//				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
//			</tr>
//			";
//		}
//	}
//}
//$message = "<table style='width: 100%;'>$message</table>";
//
//function adopt($text) {
//	return '=?UTF-8?B?'.Base64_encode($text).'?=';
//}
//
//$headers = "MIME-Version: 1.0" . PHP_EOL .
//"Content-Type: text/html; charset=utf-8" . PHP_EOL .
//'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
//'Reply-To: '.$admin_email.'' . PHP_EOL;
//
//mail($admin_email, adopt($form_subject), $message, $headers );



$data = implode(',', $_POST['array']);

define('TELEGRAM_TOKEN', '708170876:AAFCCS7aT0mLEJCeUKKY6veQgrqKhJrFHME');
define('TELEGRAM_CHATID', '346079427');
message_to_telegram($data);
function message_to_telegram($text) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}
if(curl_errno($ch))
{
    echo 'Ошибка curl: ' . curl_error($ch);
}else{
    echo 'Ошибок нет';
}
curl_close($ch);
