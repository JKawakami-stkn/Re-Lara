<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- フォント -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Re:Lara</title>
    </head>

    <body>
        <!-- ナビゲーションバー -->
        <nav class="navbar navbar-light bg-light" >
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" width="30" height="30" class="d-inline-block align-top" >
                Re:Lara
            </a>
        </nav>

        <!-- パンくずリスト -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sample</li>
            </ol>
        </nav>


        <div class="container">
            <div class="row">
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    One of three columns
                </div>
            </div>

            <!-- アラート -->
            <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
            </div>

            <div class="alert alert-danger" role="alert">
                A simple info alert—check it out!
            </div>

        </div>

        <!-- カード -->
        <div class="container" >
            <div class="card">
                <h5 class="card-header text-center">
                    販売会名
                </h5>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        対象組：
                        <br>
                        期　日：
                    </p>
                    <a href="#" class="btn btn-primary" style="width:100%;">選択する</a>
                </div>
            </div>
        </div>


        <!-- 画像のみカード -->
        <div class="container" >
            <div class="row">
                <div class="col-4">
                    <div class="card card-body">
                        <img class="card-img" src="{{ asset('img/purchase.png') }}" alt="カードの画像">
                    </div>
                </div>

                <div class="col-4">
                    <div class="card card-body">
                        <img class="card-img" src="{{ asset('img/check.png') }}" alt="カードの画像">
                    </div>
                </div>

                <div class="col-4">
                    <div class="card card-body">
                        <img class="card-img" src="{{ asset('img/delivery.png') }}" alt="カードの画像">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="card card-body">
                        <img class="card-img" src="{{ asset('img/purchase_confirmation.png') }}" alt="カードの画像">
                    </div>
                </div>

                <div class="col-3">
                    <div class="card card-body">
                        <img class="card-img" src="{{ asset('img/print.png') }}" alt="カードの画像">
                    </div>
                </div>

                <div class="col-3">
                    <div class="card card-body">
                        <img class="card-img" src="{{ asset('img/dl.png') }}" alt="カードの画像">
                    </div>
                </div>

                <div class="col-3">
                    <div class="card card-body">
                        <img class="card-img" src="{{ asset('img/edit.png') }}" alt="カードの画像">
                    </div>
                </div>

            </div>
        </div>

        <!-- JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- ツールチップ -->
        <script>
            $('[data-toggle="tooltip"]').tooltip()
        </script>
    </body>

    
</html>
