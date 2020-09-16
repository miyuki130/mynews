<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>プロフィール</title>
    </head>
    <body>
        @extends('layouts.profile')
        @section('title','プロフィールページ')
        @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h1>Myプロフィール</h1>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>