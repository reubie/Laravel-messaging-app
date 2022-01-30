@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(session('response'))
                    <div class="alert alert-success">{{ session('response') }}</div>
                @endif
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/message') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Enter Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="name" class="form-control" name="message" value="" required autofocus></textarea>
                            </div>
                        </div>

                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>email</th>
                                    <th>Mobile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users->all()) > 0)
                                    @foreach($users as $user)
                                    <tr>
                                    <td><input type="checkbox" name="mobile[]" class="checkbox" value="{{ $user -> mobile }}" /></td>
                                        <td>{{ $user -> id }}</td>
                                        <td>{{ $user -> name }}</td>
                                        <td>{{ $user -> email }}</td>
                                        <td>{{ $user -> mobile }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                   
                            </tbody>
                        </table>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Send Message </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
