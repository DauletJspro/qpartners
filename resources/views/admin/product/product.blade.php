@extends('admin.layout.layout')

@section('content')

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title box-title-first">
            <a class="menu-tab active-page">Активные товары</a>
          </h3>
          <a href="/admin/product/create" style="float: right">
             <button class="btn btn-primary box-add-btn">Добавить товар</button>
          </a>
          <div class="clear-float"></div>
        </div>
        <div class="box-body">
          <table id="packet_datatable" class="table table-bordered table-striped">
            <thead>
              <tr style="border: 1px">
                <th style="width: 30px">№</th>
                <th></th>
                <th>Название</th>
                <th>Цена</th>
                <th>Cash (%)</th>
                <th>Краткое описание</th>
                <th style="width: 15px"></th>
                <th style="width: 15px"></th>
              </tr>
            </thead>

            <tbody>

                  @foreach($row as $key => $val)

                     <tr>
                        <td> {{ $key + 1 }}</td>
                         <td>
                             <div class="object-image">
                                 <a class="fancybox" href="{{$val->product_image}}">
                                     <img src="{{$val->product_image}}">
                                 </a>
                             </div>
                             <div class="clear-float"></div>
                         </td>
                        <td>
                            {{ $val['product_name_ru']}}
                        </td>
                        <td>
                            {{ $val['product_price']}} ({{round($val->product_price * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)}}тг)
                        </td>
                         <td>
                            {{ $val['product_cash']}}
                        </td>
                         <td>
                            {{ $val['product_desc_ru']}}
                        </td>
                        <td style="text-align: center">
                            <a href="/admin/product/{{ $val->product_id }}/edit">
                                <li class="fa fa-pencil" style="font-size: 20px;"></li>
                            </a>
                        </td>
                         <td style="text-align: center">
                             <a href="javascript:void(0)" onclick="delItem(this,'{{ $val->product_id }}','product')">
                                 <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                             </a>
                         </td>
                     </tr>

                  @endforeach

            </tbody>

          </table>

            <div style="text-align: center">
                {{ $row->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
            </div>

        </div>
      </div>
    </div>
    </div>

@endsection

@section('js')

    <script>
        $('a.fancybox').fancybox({
            padding: 10
        });
    </script>
@endsection