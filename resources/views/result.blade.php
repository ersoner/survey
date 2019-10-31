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
                <form class="well form-horizontal">
                    <fieldset>
                        <div class="form-row">
                            <div class="col-md12 mb-12">
                                <label for="validationCustom03">Dear {{ $results['user_name'] }};</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7 mb-3">
                               {{ $results['right'] }} Right Answer, {{ $results['wrong'] }} Wrong Answer
                            </div>
                        </div>
                    </fieldset>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <form class="well form-horizontal">
                    <fieldset>
                        <div class="form-row">
                            <div class="col-md-7 mb-3">
                                <label for="validationCustom03">Soru</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Cevabınız</label>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom05">Sonuç</label>
                            </div>
                        </div>
                        @foreach($results['result'] as $item)
                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <input type="text" class="form-control" id="validationCustom03"
                                           placeholder="{{ $item['question']->title }}" disabled>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="text" class="form-control" id="validationCustom04"
                                           placeholder="{{ $item['answer']->title }}" disabled>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="validationCustom05"
                                           placeholder="{{ $item['status'] == true ? 'True' : 'Wrong' }}" disabled>
                                </div>
                            </div>
                        @endforeach

                    </fieldset>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <form class="well form-horizontal">
                    <fieldset>
                        <div class="form-row">
                            <div class="col-md-12">
                                <a href="{{ route('home.index') }}" type="button" style="width: 100%" class="btn btn-primary">Again</a>
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
