<form method="post" action="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-xs-12 col-sm-6 form-group">
            <input id="first-name" required type="text" name="name" value="{{$row->name}}"
                   class="form-control input" placeholder="Имя"/>
            <input id="last-name" type="text" name="last_name" value="{{$row->last_name}}"
                   class="form-control input" placeholder="Фамилия"/>
            <input id="login" type="text" name="login" value="{{$row->login}}"
                   class="form-control input" placeholder="Логин"/>
            <input id="iin" type="text" name="iin" value="{{$row->iin}}"
                   class="form-control input" placeholder="ИИН"/>
            <div id="sponsors">
                <select name="recommend_user_id"
                        data-placeholder="Выберите спонсора (1 уровень)"
                        class="form-control selectpicker input"
                        data-live-search="true">
                    <option value="">Выберите спонсора (1 уровень)</option>
                    @if( isset($row->recommend_user_id) || (isset($_GET['id']) && $_GET['id']))
                        <?php  $item = \App\Models\Users::where(['user_id' => (isset($_GET['id']) ? $_GET['id'] : $row->recommend_user_id)])->first(); ?>
                        <option selected
                                value="{{$item->user_id}}"> {{$item->login}}
                        </option>
                    @endif
                    @foreach($recommend_row as $item)
                        <option @if($row->recommend_user_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id) ) {{'selected'}} @endif value="{{$item->user_id}}">
                            {{$item['login']}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="inviters">
                <select name="inviter_user_id"
                        data-placeholder="Выберите пригласителя"
                        class="form-control selectpicker input"
                        data-live-search="true">
                    <option value="">Выберите пригласителя</option>
                    @if( isset($row->recommend_user_id) || (isset($_GET['id']) && $_GET['id']))
                        <?php  $item = \App\Models\Users::where(['user_id' => (isset($_GET['id']) ? $_GET['id'] : $row->recommend_user_id)])->first(); ?>
                        <option selected
                                value="{{$item->user_id}}"> {{sprintf('%s (%s)',$item->login, $item->last_name)}}
                        </option>
                    @endif
                    @foreach($recommend_row as $item)
                        <option @if($row->recommend_user_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id) ) {{'selected'}} @endif value="{{$item->user_id}}">
                            {{$item['login']}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 form-group">
            <input id="email" required type="email" name="email" class="form-control input"
                   value="{{$row->email}}" placeholder="Email"/>
            <input id="phone" required type="tel" name="phone" class="form-control input"
                   value="{{$row->phone}}" placeholder="Номер телефона"/>
            <input id="password" required type="password" value="{{$row->password}}"
                   name="password" class="form-control input"
                   placeholder="Пароль"/>
            <input id="confirm-password" required type="password" value="{{$row->confirm_password}}"
                   name="confirm_password" class="form-control input"
                   placeholder="Повторите пароль"/>

            <div id="speakers">
                <select name="speaker_id"
                        data-placeholder="Выберите спикера"
                        class="form-control selectpicker input"
                        data-live-search="true">
                    <option value="">Выберите спикера</option>
                    @foreach($speaker_row as $item)
                        <option @if($row->speaker_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id)) {{'selected'}} @endif value="{{$item->user_id}}">{{$item['login']}} {{--({{$item['last_name']}} {{$item['name']}} {{$item['middle_name']}})--}}</option>
                    @endforeach
                </select>
            </div>

            <div id="office">
                <select name="office_director_id"
                        data-placeholder="Выберите директора офиса"
                        class="form-control selectpicker input"
                        data-live-search="true">
                    <option value="">Выберите офис</option>
                    @foreach($office_row as $item)
                        <option @if($row->office_director_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id)) {{'selected'}} @endif value="{{$item->user_id}}">{{$item['office_name']}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="role_id" value="{{\App\Models\Role::CLIENT}}">
            <input type="hidden" name="is_activated" value="1">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            {!! NoCaptcha::display() !!}
            @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                                                     <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
            @endif
        </div>
    </div>
    <br>
    <div class="" style="width: 100%; display: flex">
        <button type="submit" class="btn btn-danger font-weight-600"
                style="background: red !important; border-radius: 20px; margin: 0 auto; font-size: 22px !important; padding: 5px 20px">
            Зарегистрироваться
        </button>
    </div>

</form>