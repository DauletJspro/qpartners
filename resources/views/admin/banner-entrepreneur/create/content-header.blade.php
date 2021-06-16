@php
    use \Illuminate\Support\Facades\Auth;
    $userGapCard = \App\Models\GapCardItem::where('user_id', '=',Auth::user()->user_id)->first();
@endphp
<section class="content-header">
    @if($userGapCard->is_checked == false)
         <h1>
            Данный момент админ проверять ваш баннер
         </h1>
    @elseif($userGapCard->is_checked == 1)
         <h1 style="color: green">
            Ваш баннер успешно прошел проверку
         </h1>
    @elseif($userGapCard->is_checked == 2)
        <h1 style="color: red;">
            Ваш баннер не прошел проверку
        </h1>
    @else
         <h1>
             Создание баннера
         </h1>
    @endif
</section>