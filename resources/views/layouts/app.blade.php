<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Todos App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/list">todos <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/new-todos">Create todos <span class="sr-only">(current)</span></a>
                    </li>
                    <button class="nav-item active btn btn-primary btn-sm float-right mr-2">
                        <a style="color:white;" class="nav-link" href="/export">Export <span class="sr-only">
                        (current)</span></a>
                    </button>
                    <button class="nav-item active btn btn-info btn-sm float-right mr-2">
                        <a style="color:white;" class="nav-link" href="/import">Import <span class="sr-only">
                        (current)</span></a>
                    </button>
                </ul>
            </div>
        </nav>
        <div class="container">
        @yield('content')
        </div>

    </body>
</html>
