@extends('admin.layout.layout')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<i class="fa fa-ticket">Мои вопросы</i>
	        	</div>

	        	<div class="panel-body">
	        		@if ($tickets->isEmpty())
						<p>Вы не создали ни одного билета.</p>
	        		@else
		        		<table class="table">
		        			<thead>
		        				<tr>
		        					<th>Категория</th>
		        					<th>Загаловок</th>
		        					<th>Статус</th>
		        					<th>Последнее обновление</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        			@foreach ($tickets as $ticket)
								<tr>
		        					<td>
		        					@foreach ($categories as $category)
		        						@if ($category->id === $ticket->category_id)
											{{ $category->name }}
		        						@endif
		        					@endforeach
		        					</td>
		        					<td>
		        						<a href="{{ url('admin/tickets/'. $ticket->ticket_id) }}">
		        							#{{ $ticket->ticket_id }} - {{ $ticket->title }}
		        						</a>
		        					</td>
		        					<td>
		        					@if ($ticket->status === 'Open')
		        						<span class="label label-success">{{ $ticket->status }}</span>
		        					@else
		        						<span class="label label-danger">{{ $ticket->status }}</span>
		        					@endif
		        					</td>
		        					<td>{{ $ticket->updated_at }}</td>
		        				</tr>
		        			@endforeach
		        			</tbody>
		        		</table>
						{{ $tickets->render() }}
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
                            <i class="fa fa-ticket">Сообщение от администрации сайта</i>
                        </div>
					<div class="panel-body">
					@if ($adminTickets->isEmpty())
						<p>У вас нет сообщение от админа</p>
					@else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Категория</th>
                                <th>Загаловок</th>
                                <th>Статус</th>
                                <th>Последнее обновление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($adminTickets  as $ticket)
                                <tr>
                                    <td>
                                        @foreach ($categories as $category)
                                            @if ($category->id === $ticket->category_id)
                                                {{ $category->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ticket->status === 'Open')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
		        		{{ $adminTickets->render() }}
				@endif
				</div>
	        </div>
	    </div>
	</div>
@endsection