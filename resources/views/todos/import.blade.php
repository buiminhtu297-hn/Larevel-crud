@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Import File Csv</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($messageCheckFile))
                        <div class="alert alert-danger">
                            {{$messageCheckFile}}
                        </div>
                    @endif

                    @if (isset($checkField))
                        <div class="alert alert-danger">
                            @foreach($checkField as $error)
                                {{ $error }}
                                <br>
                            @endforeach
                        </div>
                    @endif



                    @if (isset($messageCheckValidate))
                        <div class="alert alert-danger">
                            @foreach($messageCheckValidate as $error)
                                {{ $error }}
                                <br>
                            @endforeach
                        </div>
                    @endif

                    <form action="/import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
