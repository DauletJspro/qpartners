<form action="/admin/profile/pv/edit" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="hidden" value="@if($row->user_id > 0){{$row->user_id}}@else{{Auth::user()->user_id}}@endif" name="user_id"/>
    <div class="form-group">
        <label>Текущий личный обьем</label>
        <input readonly value="{{$row->pv_balance}}" type="text" class="form-control" name="user_money" placeholder="Неизвестно">
    </div>
    <div class="form-group">
        <label>Изменить</label>
        <input  type="text" class="form-control" name="pv_balance" placeholder="Введите">
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>