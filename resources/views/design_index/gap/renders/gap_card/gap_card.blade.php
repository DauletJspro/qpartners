@foreach($gapItems as $item)
    <li>
        <div id="gap-card" class="mt-product1 large"
             style="padding: 0 0 20px 0">
            <div class="box">
                <div class="b1">
                    <div class="b2">
                        <div
                                id="gap-card-photo"
                                style="
                                        background-image: url({{asset('/admin/image/gap_item/' . $item->image)}});
                                        background-repeat: no-repeat;
                                        background-size: 100% 100%;
                                        background-position: center;
                                        border: 4px solid red;
                                        width: 275px;
                                        height: 275px;
                                        position: relative;
                                        ">
                                                    <span style="font-family: Montserrat;position: absolute; left: 0; background: red; color: white; padding: 2px 10px; top: 18px">
                                                       Скидка {{$item->discount_percentage}} %
                                                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <strong class="title"><a href="{{ route('gap_card.detail', $item->id) }}" style="color: black">Super Elixir For Woman</a></strong>
                <span class="cut-text" style="">Крем обладает рассасывающим, выравнивающим эффектом и также убирает складки и морщины на коже. Очень полезен как средство профилактики целлюлита.</span>
            </div>
        </div>
    </li>
@endforeach