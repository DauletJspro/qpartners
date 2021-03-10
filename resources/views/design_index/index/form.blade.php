@extends('design_index.layout.layout')
@section('content')
<section class="" style="background: rgba(232, 232, 232, 0.5); padding-top: 50px; padding-bottom: 50px;">
            <div class="container">
                <div class="col-xs-12" style="padding-bottom: 30px;">
                    <h2 class="have-a-question">Остались вопросы?</h2>
                    <span class="have-a-question-span">Напишите в любое время! </span>
                    {{Form::open(['action' => ['Index\FaqController@opportunityFaqStore'], 'method' => 'POST', 'class'=> 'contact-form' ])}}
                    {{Form::token()}}
                    <fieldset class="have-a-question-fieldset">
                        <input type="text" required name="user_name" class="form-control" placeholder="Имя">
                        <input type="email" required name="user_email" class="form-control" placeholder="E-Mail">
                        <input type="text" required name="user_phone" class="form-control" placeholder="Номер телефона">
                        <textarea rows="10" class="form-control" name="question"
                                  placeholder="Текст ..."></textarea>
                        <button type="submit" class="have-a-question-button">
                            Отправить
                        </button>
                    </fieldset>
                    {{Form::close()}}
                </div>
            </div>
        </section>
        @endsection