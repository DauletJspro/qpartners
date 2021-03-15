<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Баспана</title>
</head>
<body>
@php
    use Illuminate\Support\Facades\DB;

    $gapUsers = DB::table('users')
                    ->join('user_packet', 'users.user_id', '=','user_packet.user_id')
                    ->where('user_packet.packet_id', '=', \App\Models\Packet::GAP)
                    ->get();

@endphp

<table class="row" width="100%" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0"
       style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%;margin-top: 10px;">
    <tr>
        <td style="border-collapse:collapse; border-spacing:0;text-align: right;padding-right: 18px;font-size: 12px !important;line-height: 20px;padding-top: 10px;"> Дата скачивание -  {{date('Y-m-d H:i:s')}}</td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td style='padding:10px 10px 10px 10px; text-align:center'>
            <h3 style="text-align: center; margin-top: 30px;">Список пользователей</h3>
        </td>
    </tr>
</table>

<table cellpadding='1' cellspacing='0' style='border:1px solid #4E4E5B; border-bottom:0;line-height:21px;margin:auto; background:#fff; font-size:12px;text-align:center'>
    <tr style='border-bottom: 1px dashed #CECECE;'>
        <th style='border-bottom: 1px solid #4E4E5B; border-right: 1px solid #4E4E5B; border-top:0; border-left:0;background:#306EBA;color:#fff;width:50%; '>Номер пользователя</th>
        <th style='border-bottom: 1px solid #4E4E5B; border-right: 1px solid #4E4E5B; border-top:0; border-left:0;background:#306EBA;color:#fff; width:100%;'>Имя</th>
        <th style='border-bottom: 1px solid #4E4E5B; border-right: 1px solid #4E4E5B; border-top:0; border-left:0;background:#306EBA;color:#fff; width:100%;'>Фамилия</th>
        <th style='border-bottom: 1px solid #4E4E5B; border-right: 1px solid #4E4E5B; border-top:0; border-left:0;background:#306EBA;color:#fff; width:100%;'>Номер телефона</th>
    </tr>
    @foreach($gapUsers as $gapUser)
        <tr>
            <td style="font-size:12px; text-align:center; border-right: 1px solid #4E4E5B; border-bottom: 1px solid #4E4E5B; word-wrap: break-word;">{{$gapUser->user_id}}</td>
            <td style="font-size:12px; text-align:center; border-right: 1px solid #4E4E5B; border-bottom: 1px solid #4E4E5B; word-wrap: break-word;">{{$gapUser->name}}</td>
            <td style="font-size:12px; text-align:center; border-right: 1px solid #4E4E5B; border-bottom: 1px solid #4E4E5B; word-wrap: break-word;">{{$gapUser->last_name}}</td>
            <td style="font-size:12px; text-align:center; border-right: 1px solid #4E4E5B; border-bottom: 1px solid #4E4E5B; word-wrap: break-word;">{{$gapUser->phone}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
<style>

    p {
        margin-bottom: 0em;
        width:100%;
        text-align:justify;
        text-indent: 20px; /* Отступ первой строки в пикселах */
    }

    td {
        justify-content: space-between;
        margin-left: 20px;
    }

</style>
