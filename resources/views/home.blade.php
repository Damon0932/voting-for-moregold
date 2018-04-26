@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($questions as $question)
                <div class="col-md-8">
                    <form action="{{route('voting.create')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="question_id" value="{{$question->id}}">

                        <div class="card">
                            <div class="card-header">{{$question->question_content}}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @foreach($question->questionOptions as $questionOption)
                                    <label class="radio-inline">
                                        <input type="radio" name="question_option_id" id="optionsRadios{{$questionOption->id}}"
                                               value="{{$questionOption->id}}" required="required"> {{$questionOption->question_option_name}}
                                        . {{$questionOption->question_option_content}}
                                    </label>
                                @endforeach

                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
