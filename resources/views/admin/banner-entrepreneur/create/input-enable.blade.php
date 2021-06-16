<div class="box-body">
    <div class="form-group">
        <label>Город <h style="color: red">*</h></label>
        {{Form::select('city_id',$cityList, null, ['placeholder' => 'Выберите город',
'class' => 'form-control'])}}
    </div>
    <div class="form-group">
        <label>Раздел <h style="color: red">*</h></label><br>
        {{Form::select('gap_card_sub_category_id',$gapCardSubCategories, null, ['placeholder' => 'Выберите категорию',
'class' => 'form-control'])}}
    </div>
    <div class="form-group">
        <label>Скидка <h style="color: red">*</h></label>
        <input type="text"
               class="form-control" name="discount_percentage" placeholder="Введите">
    </div>
    <div class="form-group">
        <label>Район</label>
        <input type="text"
               class="form-control" name="district" placeholder="Введите">
    </div>
    <div class="form-group">
        <label>Улица <h style="color: red">*</h></label>
        <input type="text"
               class="form-control" name="street" placeholder="Введите">
    </div>
    <div class="form-group">
        <label>Дом <h style="color: red">*</h></label>
        <input type="text"
               class="form-control" name="house" placeholder="Введите">
    </div>
    <div class="form-group">
        <label>Офис <h style="color: red">*</h></label>
        <input type="text"
               class="form-control" name="office" placeholder="Введите">
    </div>
    <div class="form-group">
        <label>Instagram</label>
        <input type="text"
               class="form-control" name="instagram" placeholder="Введите">
    </div>
    <div class="form-group">
        <label>Сайт</label>
        <input type="text"
               class="form-control" name="site" placeholder="Введите">
    </div>

    <div class="form-group">
        <label>Описание <h style="color: red">*</h></label>
        <textarea rows="10" class="form-control"
                  name="full_description_ru"></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
