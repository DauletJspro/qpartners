<div class="text-center text-uppercase">
    <a class="infos-btn ml-2" id="infos-btn" onclick="displayInfo('infos')">Информация</a>
    <a class="conditions-btn ml-2" id="conditions-btn" onclick="displayInfo('conditions')">Получить бонус</a>
    <a class="example-btn ml-2" id="example-btn" onclick="displayInfo('example')">Отзывы</a>
</div>
<div class="mb-7 fs-18 text-black" style="border-top: 3px solid #C4C4C4; font-weight: 300; padding-left: 5%">
    <div class="infos container mt-2" id="infos">
        <p></p>
    </div>
    <div class="conditions container mt-2" id="conditions">
        <p>Для получения жилья в рассрочку Вам необходимо выполнить следующие условия кооператива.</p>
        <p> 1. Внести <span class="text-red font-weight-600">вступительный взнос</span> в размере <span class="text-red font-weight-600">240 000 тенге</span> и стать участником кооператива</p>
        <p> 2. Внести <span class="text-red font-weight-600">30%, 50% или 70%</span> от суммы на которую вы хотите приобрести жилье в виде <span class="text-red font-weight-600">первоначального взноса</span></p>
        <p> 3. После получения жилья в рассрочку <span class="text-red font-weight-600">ежемесячно</span> совершать <span class="text-red font-weight-600">погашение рассрочки</span> согласно Вашему графику</p>
    </div>
    <div class="example container mt-2" id="example">
        <p>Давайте рассмотрим пример для того <чтоб></чтоб>ы все условия программы стали более понятными для Вас. Например, Вы хотите приобрести <span class="text-red font-weight-600">жилье на сумму 9 000 000 тенге</span>
            и готовый внести <span class="text-red font-weight-600">50% первоначального взноса.</span></p>
        <p>1. Вы вносите <span class="text-red font-weight-600">вступительный взнос</span> в размере <span class="text-red font-weight-600">240 000 тенге</span> и становитесь
            полноценным участником кооператива.</p>
        <p>2. Вносите <span class="text-red font-weight-600">4 500 000 тенге (50%)</span> в виде первоначального взноса.</p>
        <p>3. Кооператива добавляет <span class="text-red font-weight-600">недостающую сумму 4 500 000 тенге</span> на
            жилье в виде <span class="text-red font-weight-600">рассрочки.</span></p>
        <p>4. Вы получаете жилье в собственность с оформлением на Ваше имя.</p>
        <p>5. <span class="text-red font-weight-600">Погашаете</span> рассрочку по <span class="text-red font-weight-600">75 000 тенге ежемесячно</span> на протяжении <span class="text-red font-weight-600">60 месяцев.</span>
            (75 000 х 60 = 4 500 000)</p>
    </div>
    <div class="container" style="margin-top: 100px">
        <span class="my-text fs-18 text-uppercase ml-2">другие программы</span>
        <div class="d-flex-row flex-wrap pt-2">

            @foreach($similarCards as $similarCard)

                <div class="program-detail-block-width d-flex-column mt-1">
                    <img src="/admin/image/gap_item/{{$similarCard->image}}" alt="programs img not found"/>
                    <p class="text-black mt-1 fs-11">{{$similarCard->title_ru}}</p>
                    <button class="button-hover mr-auto bg-red border-radius-30" onclick="" style="border: none; padding: 0 1rem">
                        <a href="{{route('gap_card.detail', $similarCard->id)}}" class="a-hover d-flex-row color-white">
                            Подробнее
                            <img style="width: 10px; height: 10px; margin-top: 6px; margin-left: 5px"
                                 src="/new_design/images/right-navigation.svg"
                                 alt="right navigation img not found"
                            >
                        </a>
                    </button>
                </div>

            @endforeach

        </div>
    </div>
</div>