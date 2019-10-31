<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Surveys</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <div class="container">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td colspan="1">
                    <form class="well form-horizontal"  method="POST" action="{{ route('answer.create') }}" enctype="multipart/form-data">
                        @csrf
                        {!! Form::hidden('question_id',$question->id) !!}
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Dear {{ $user }};</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">{{ $question->id }} - {{ $question->title }}</label>
                            </div>
                            <div class="form-group">
                                @foreach($question->answers as $answer)
                                <div class="col-md-12 form-check">
                                    <input class="form-check-input" type="radio" name="answer_id" id="gridRadios1" value="{{ $answer->id }}">
                                    {{ $answer->title }}
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-12">
                                    <button type="submit" style="width: 100%" class="btn btn-primary">Next</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</html>
