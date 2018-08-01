
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/admin/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/admin/dashboard.css" rel="stylesheet">
</head>

<body>


<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Продукты </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('brands') }}">Бренды</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Комментарии</a>
                </li>
            </ul>




        </nav>

        @yield('content')
     </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/admin/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="/js/admin/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
@yield('js')


</body>
</html>
