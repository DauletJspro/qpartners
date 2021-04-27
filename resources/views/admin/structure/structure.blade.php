@extends('admin.layout.layout')

@section('breadcrump')

    <section class="content-header">
        <h1>
            Структура
        </h1>
    </section>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="structure-list">
                <div class="obsdiv" style="padding: 0 10px">
                    <div class="ulist">
                        <?php
                        use App\Models\Packet;use App\Models\UserPacket;use Illuminate\Support\Facades\Auth;$user_id = Auth::user()->user_id;
                        if (Auth::user()->role_id == 1) $user_id = 1;
                        $user_list = \App\Models\Users::where('recommend_user_id', $user_id)->take(20)->get();

                        $user = \App\Models\Users::leftJoin('user_status', 'user_status.user_status_id', '=', 'users.status_id')
                            ->where('user_id', $user_id)
                            ->first();
                        ?>

                        <ul class="level_1">
                            <li class="parent">

                                <?php
                                $LOProfitId = UserPacket::where('is_active', 1)
                                    ->where('user_id', Auth::user()->user_id)
                                    ->whereIn('packet_id', [23, 24, 25, 26, 27])
                                    ->max('packet_id');

                                $LOProfit = Packet::where('packet_id', $LOProfitId)->first();
                                $LOProfit = $LOProfit ? $LOProfit->packet_price : 0;

                                $gaps = 0;
                                ?>


                                @if(count($user_list) > 0)
                                    <span onclick="opUl(this)">+</span>
                                    <div class="dval act user-name">
                                        <div class="object-image client-image">
                                            <a @if(Auth::user()->role_id == 1) href="/admin/profile/{{$user->user_id}}"
                                               target="_blank" @endif>
                                                <img src="{{$user->avatar}}">
                                            </a>
                                        </div>
                                        <div class="left-float client-name">
                                            {{$user->login}}  @if(Auth::user()->user_id == 1)
                                                ({{$user->name}} {{$user->last_name}}
                                                ) @endif @include('admin.structure.user_packet_list_loop')
                                            <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                                                <p style="color: #009551; margin: 0px">
                                                    Квалификация: {{$user->user_status_name}}</p>
                                                <p style="color: #00a5f4; margin: 0px">Статус
                                                    GAP: {{isset($user->gap_status) ? \App\Models\UserStatus::getStatusName($user->gap_status)  : ' нету'}}
                                                </p>
                                                <div>
                                                    <p style="font-weight: 900; margin: 0px">
                                                        ЛО: {{ $LOProfit + $gaps }} $
                                                        ({{round(($LOProfit+$gaps) * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)}}
                                                        тг)</p>
                                                    @if(isset($user->pv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            ЛО: {{$user->pv_balance }} PV</p>
                                                    @endif
                                                    @if(isset($user->gv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            ГО: {{$user->gv_balance }} GV</p>
                                                    @endif
                                                    @if(isset($user->personal_sv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            Л-SV: {{$user->personal_sv_balance }} SV</p>
                                                    @endif
                                                    @if(isset($user->group_sv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            Г-SV: {{$user->group_sv_balance }} SV</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="left-float" style="width: 400px; height: auto;padding-top: 3rem;">
                                            @foreach($user->childs as $key=> $child)
                                                <div class="row" style="padding-bottom: 1rem;">
                                                    <div class="col-sm-5 text-center" style="padding-right: 0 !important;">
                                                        <h5 style="font-weight: 900; margin-top: 2px; !important;">
                                                            {{$child->login}}
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-7" style="padding-left: 0 !important;">
                                                        <p style="font-weight: 900; margin-bottom: 1px !important;">
                                                            КО{{$key+1}}: {{$child->gv_balance + $child->pv_balance }}
                                                            GV
                                                        </p>
                                                        <p style="font-weight: 900; margin-bottom: 1px !important;">
                                                            КSV{{$key+1}}
                                                            : {{$child->personal_sv_balance + $child->group_sv_balance }}
                                                            SV
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="clear-float"></div>
                                    </div>
                                    <ul class="level_2">
                                        {!! view('admin.structure.structure-list-loop-ajax',['user_id' => $user_id,'level' => '3']) !!}
                                    </ul>
                                @else
                                    <div class="dval act user-name">
                                        <div class="object-image client-image">
                                            <a @if(Auth::user()->role_id == 1) href="/admin/profile/{{$user->user_id}}"
                                               target="_blank" @endif>
                                                <img src="{{$user->avatar}}">
                                            </a>
                                        </div>
                                        <div class="left-float client-name">
                                            {{$user->login}}  @if(Auth::user()->user_id == 1) {{$user->name}} {{$user->last_name}} @endif @include('admin.structure.user_packet_list_loop')
                                            <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                                                <p style="color: #009551; margin: 0px">
                                                    Квалификация: {{$user->user_status_name}}</p>
                                                <p style="color: #00a5f4; margin: 0px">Статус
                                                    GAP: {{isset($user->gap_status) ? \App\Models\UserStatus::getGapStatusName($user->gap_status)  : ' нету'}}
                                                </p>
                                                <div>
                                                    <p style="font-weight: 900; margin: 0px">ЛО: {{ $LOProfit }} $
                                                        ({{round($LOProfit * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)}}
                                                        тг)</p>
                                                    @if(isset($user->pv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            ЛО: {{$user->pv_balance }} PV</p>
                                                    @endif
                                                    @if(isset($user->gv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            ГО: {{$user->gv_balance }} GV</p>
                                                    @endif
                                                    @if(isset($user->personal_sv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            Л-SV: {{$user->personal_sv_balance }} SV</p>
                                                    @endif
                                                    @if(isset($user->group_sv_balance ))
                                                        <p style="font-weight: 900; margin: 0px">
                                                            Г-SV: {{$user->group_sv_balance }} SV</p>
                                                    @endif
                                                </div>
                                                <div>
                                                    <ul>
                                                        <li>Hola: 12</li>
                                                        <li>Hola: 12</li>
                                                        <li>Hola: 12</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="left-float" style="width: 400px; height: auto;padding-top: 3rem;">
                                            @foreach($user->childs as $key=> $child)
                                                <div class="row" style="padding-bottom: 1rem;">
                                                    <div class="col-sm-5 text-center" style="padding-right: 0 !important;">
                                                        <h5 style="font-weight: 900; margin-top: 2px; !important;">
                                                            {{$child->login}}
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-7" style="padding-left: 0 !important;">
                                                        <p style="font-weight: 900; margin-bottom: 1px !important;">
                                                            КО{{$key+1}}: {{$child->gv_balance + $child->pv_balance }}
                                                            GV
                                                        </p>
                                                        <p style="font-weight: 900; margin-bottom: 1px !important;">
                                                            КSV{{$key+1}}
                                                            : {{$child->personal_sv_balance + $child->group_sv_balance }}
                                                            SV
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="clear-float"></div>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

