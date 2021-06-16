@php
    use \Illuminate\Support\Facades\Auth;
    $userGapCard = \App\Models\GapCardItem::where('user_id', '=',Auth::user()->user_id)->count();
@endphp
@if($userGapCard)
    @include('admin.banner-entrepreneur.create.input-disabled')
@else
    @include('admin.banner-entrepreneur.create.input-enable')
@endif
