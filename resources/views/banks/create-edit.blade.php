@extends('dashboard.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Banks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{url()->previous()}}" class="btn btn-sm btn-success"><i class="fa-solid fa-arrow-left"></i>{{__('  Back')}}</a>
                        {{ __('Bank Info Form') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('banks.store') }}">
                            @csrf
                            <input type="text" name="id" value="{{ @$bank->id }}" hidden>
                            <div class="form-group">
                                <label>Bank Code</label>
                                <input class="form-control" type="number" min="0" name="code" id="code" value="{{ @$bank->code }}" placeholder="Bank code">
                            </div>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{ @$bank->bank_name }}" placeholder="Bank Name">
                            </div>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{ @$bank->name }}" placeholder="Bank Name">
                            </div>
                            <div class="form-group">
                                <label>Bank Address</label>
                                <input class="form-control" type="text" name="address" id="address" value="{{ @$bank->address }}" placeholder="Bank Address">
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
