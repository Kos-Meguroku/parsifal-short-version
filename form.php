<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel="stylesheet" href="style.css" type="text/css">
<BASE target="_top">
</head>


<body>
<div align=center>


<?
/*送信ボタンが押されたとき */
if ($_POST{action} == "sendmail") {
    $ng = 0;

    /* 入力のチェック */
    if (!$_POST{name}) {
        print("<BR>氏名が入力されていません。<BR>\n");
        $ng++;
    }

    if (!$_POST{mail}) {
        print("<BR>メールアドレスが入力されていません。<BR>\n");
        $ng++;
    }

    if (!$_POST{comment}) {
        print("<BR>お問い合わせ内容が入力されていません。<BR>\n");
        $ng++;
    }

    if ($ng) {
        print ("<BR>お問い合わせに失敗しました。<BR>\n");
        print ('<input type="button" value="前の画面に戻る" onClick="JavaScript:history.back(-1);">');
        print ("</body></html>\n");
        exit;
    }

    $currentdate = date("Y/m/d H:i");
    $ordernum = date("Ymd");
    $message  = "ホームページからお問い合わせがありました。\n\n";
    $message .= "■ 送信者は以下の通りです。\n";
    $message .= "--------------------------------------------------\n";
    $message .= "送信日時 ：".$currentdate."\n";
    $message .= "氏名：".$_POST{name}."\n";
    $message .= "メールアドレス：".$_POST{mail}."\n";
    $message .= "お問い合わせ内容：".$_POST{comment}."\n";
    $message .= "--------------------------------------------------\n\n";

    mb_language("ja");
    $from = mb_convert_kana($_POST{mail},"KVrna");
    $to   = "kos6@fg8.so-net.ne.jp";
    $subject = "ホームページからお問い合わせがありました";
    $subject = '=?ISO-2022-JP?B?' . base64_encode(mb_convert_encoding($subject, 'ISO-2022-JP', 'AUTO')) . '?=';
    $message = stripslashes($message);
    mail($to,$subject,$message,"From:$from");
    print ("<BR><BR>\n");
    print ("お問い合わせを受け付けました。<BR>近日中にご返信させていただきます。<BR><BR>\n");
    print ('<A HREF="index.html"> >> トップページに戻る</A> <BR>');
    print ("</body></html>\n");
    exit;
}
?>


</div>
</body>
</html>
