<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ringer Sms Backup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('asset/jquery.datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
</head>

<body>
    <div class="topAppBar" style="background-color: white">
        <a href="#">
            <div class="MobileLogo text-center">
                <span class="h6 mb-0" style="text-align: center;">Ringer SMS Backup</span>
            </div>
        </a>
    </div>
    <div class="space"></div>
    <div class="content">
        @yield('content')
    </div>
    <div class="space"></div>
    <div class="bottomNavigationBar">
        <a href="#">
            <div class="bottomItem menuActive">
                <img src="{{ asset('asset/icon/bkash.svg') }}" alt="" srcset="">
                <p>Bkash</p>
            </div>
        </a>
        <a href="#">
            <div class="bottomItem">
                <img src="{{ asset('asset/icon/nogod.jpg') }}" alt="" srcset="">
                <p>Nagad</p>
            </div>
        </a>
        <a href="#" class="text-dark">
            <div class="bottomItem">
                <img src="{{ asset('asset/icon/rocket.jpg') }}" alt="" srcset="">
                <p>Roket</p>
            </div>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('asset/jquery.datetimepicker.js') }}"></script>
    <script>
        // $('.date').datetimepicker({
        //     datepicker: true,
        //     // format: 'H:i',
        //     // step: 5
        // });
    </script>
</body>

</html>
