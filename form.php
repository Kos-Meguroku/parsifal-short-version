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
/*���M�{�^���������ꂽ�Ƃ� */
if ($_POST{action} == "sendmail") {
    $ng = 0;

    /* ���͂̃`�F�b�N */
    if (!$_POST{name}) {
        print("<BR>���������͂���Ă��܂���B<BR>\n");
        $ng++;
    }

    if (!$_POST{mail}) {
        print("<BR>���[���A�h���X�����͂���Ă��܂���B<BR>\n");
        $ng++;
    }

    if (!$_POST{comment}) {
        print("<BR>���₢���킹���e�����͂���Ă��܂���B<BR>\n");
        $ng++;
    }

    if ($ng) {
        print ("<BR>���₢���킹�Ɏ��s���܂����B<BR>\n");
        print ('<input type="button" value="�O�̉�ʂɖ߂�" onClick="JavaScript:history.back(-1);">');
        print ("</body></html>\n");
        exit;
    }

    $currentdate = date("Y/m/d H:i");
    $ordernum = date("Ymd");
    $message  = "�z�[���y�[�W���炨�₢���킹������܂����B\n\n";
    $message .= "�� ���M�҂͈ȉ��̒ʂ�ł��B\n";
    $message .= "--------------------------------------------------\n";
    $message .= "���M���� �F".$currentdate."\n";
    $message .= "�����F".$_POST{name}."\n";
    $message .= "���[���A�h���X�F".$_POST{mail}."\n";
    $message .= "���₢���킹���e�F".$_POST{comment}."\n";
    $message .= "--------------------------------------------------\n\n";

    mb_language("ja");
    $from = mb_convert_kana($_POST{mail},"KVrna");
    $to   = "kos6@fg8.so-net.ne.jp";
    $subject = "�z�[���y�[�W���炨�₢���킹������܂���";
    $subject = '=?ISO-2022-JP?B?' . base64_encode(mb_convert_encoding($subject, 'ISO-2022-JP', 'AUTO')) . '?=';
    $message = stripslashes($message);
    mail($to,$subject,$message,"From:$from");
    print ("<BR><BR>\n");
    print ("���₢���킹���󂯕t���܂����B<BR>�ߓ����ɂ��ԐM�����Ă��������܂��B<BR><BR>\n");
    print ('<A HREF="index.html"> >> �g�b�v�y�[�W�ɖ߂�</A> <BR>');
    print ("</body></html>\n");
    exit;
}
?>


</div>
</body>
</html>
