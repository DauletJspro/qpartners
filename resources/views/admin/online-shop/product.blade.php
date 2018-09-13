@extends('admin.layout.layout')

@section('breadcrump')

    <section class="content-header">
        <h1>
            Магазин
        </h1>
    </section>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Список товаров</h2>
        </div>

        @include('admin.online-shop.product-list-loop')

    </div>

    <div class="text-center">
        {!! $row->products->links() !!}
    </div>

    <div class="modal-dialog" id="shop_modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="modal_title"></h2>
            </div>
            <div class="modal-body">
                <p id="modal_desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="closeModal()">Закрыть</button>
            </div>
        </div><!-- /.modal-content -->
    </div>



@endsection


