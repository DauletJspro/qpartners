<form action="/admin/profile/lsv/edit" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="hidden" value="@if($row->user_id > 0){{$row->user_id}}@else{{Auth::user()->user_id}}@endif" name="user_id"/>
    <div class="form-group">
        <label>Текущий Л-SV</label>
        <input readonly value="{{$row->personal_sv_balance}}" type="text" class="form-control" name="sv_balance" placeholder="Неизвестно">
    </div>
    <div class="form-group">
        <label>Изменить</label>
        <input  type="text" class="form-control" name="personal_sv_balance" placeholder="Введите">
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>