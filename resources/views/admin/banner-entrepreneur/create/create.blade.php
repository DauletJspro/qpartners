@extends('admin.layout.layout')
@section('content')
    @php
        use \Illuminate\Support\Facades\Auth;
        $userGapCard = \App\Models\GapCardItem::where('user_id', '=',Auth::user()->user_id)->first();
    @endphp
    @include('admin.banner-entrepreneur.create.content-header')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8" style="padding-left: 0px">
                    <div class="box box-primary">
                        @include('admin.banner-entrepreneur.create.validation-messages')
                        <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                         @include('admin.banner-entrepreneur.create.from-users-to-date')
                         @include('admin.banner-entrepreneur.create.input')
                         </form>
                    </div>
                </div>
                @include('admin.banner-entrepreneur.create.show-image')
            </div>
        </div>
    </section>

@endsection


