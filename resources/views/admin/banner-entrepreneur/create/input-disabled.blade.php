@php
    use \Illuminate\Support\Facades\Auth;
    $userGapCard = \App\Models\GapCardItem::where('user_id', '=',Auth::user()->user_id)->first();
@endphp
<div class="box-body">
    <div class="form-group">
        <label>Город <h style="color: red">*</h></label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->city_id}}"
               aria-label="Disabled input" disabled readonly>
    </div>
    <div class="form-group">
        <label>Раздел <h style="color: red">*</h></label><br>
        <input class="form-control" type="text" placeholder="{{$userGapCard->gap_card_sub_category_id}}"
               aria-label="Disabled input" disabled readonly>
    </div>
    <div class="form-group">
        <label>Скидка <h style="color: red">*</h></label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->discount_percentage}}"
               aria-label="Disabled input"
               disabled readonly>

    </div>
    <div class="form-group">
        <label>Район</label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->district}}"
               aria-label="Disabled input" disabled readonly>

    </div>
    <div class="form-group">
        <label>Улица <h style="color: red">*</h></label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->street}}" aria-label="Disabled input"
               disabled readonly>

    </div>
    <div class="form-group">
        <label>Дом <h style="color: red">*</h></label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->house}}"
               aria-label="Disabled input" disabled readonly>

    </div>
    <div class="form-group">
        <label>Офис <h style="color: red">*</h></label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->office}}"
               aria-label="Disabled input" disabled readonly>

    </div>
    <div class="form-group">
        <label>Instagram</label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->instagram}}"
               aria-label="Disabled input" disabled readonly>

    </div>
    <div class="form-group">
        <label>Сайт</label>
        <input class="form-control" type="text" placeholder="{{$userGapCard->site}}"
               aria-label="Disabled input" disabled readonly>

    </div>

    <div class="form-group">
        <label>Описание <h style="color: red">*</h></label>
        <textarea rows="10" class="form-control"
                  name="full_description_ru" disabled readonly >
            {{$userGapCard->full_description_ru}}
        </textarea>

    </div>
{{--    <div class="form-group">--}}
{{--        <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >--}}
{{--        @if ($errors->has('image'))--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $errors->first('file') }}</strong>--}}
{{--            </span>--}}
{{--        @endif--}}
{{--    </div>--}}
</div>
