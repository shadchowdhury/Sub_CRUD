@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Subjects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banks</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-sm btn-success"><b><i
                                    class="fa-solid fa-arrow-left"></i> Home </b></a>
                    </div>
                    <div>
                        <h4 class="mt-0 mb-0">{{ __('All Subjects') }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('banks.create') }}" data-toggle="modal" data-target="#bankModal" class="btn btn-sm btn-success">New <i
                                class="fa-solid fa-plus-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body row">
                <div class="col-6 modal-content">
                    <div class="card-body">
                        <table class="table table-hover text-center table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Bank Name</th>
                                    <th>Identifier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banks as $bank)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td class="text-left">{{ $bank->name }}</td>
                                        <td class="">{{ $bank->identifier }}</td>
                                        <td>
                                            <div class="button-group d-flex justify-content-center">
                                                {{-- <a href="#" class="btn btn-sm btn-primary"><i
                                                        class="fas fa-edit"></i></a> --}}
                                                <a href="#" data-toggle="modal" data-target="#bankModal{{ $bank->id }}" class="text-success"><i
                                                    class="fas fa-edit"></i></a>
                                                    @include('banks.modal.edit')
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                {{ $banks->links() }}
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="bankModalLable">New Bank</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
            
                            <form method="POST" action="{{ route('banks.store') }}">
        
                                @csrf
                                {{-- <input type="text" name="id" value="{{ @$bank->id }}" hidden> --}}
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Bank Name">
                                </div>
                                <div class="form-group">
                                    <label>Identifier</label>
                                    <input class="form-control" type="text" name="identifier" id="identifier" value="{{ old('identifier') }}" placeholder="Identifier">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    <div class="modal fade" id="bankModal" tabindex="-1" role="dialog" aria-labelledby="bankModalLable" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="bankModalLable">New Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <form method="POST" action="{{ route('banks.store') }}">

                        @csrf
                        {{-- <input type="text" name="id" value="{{ @$bank->id }}" hidden> --}}
                        <div class="form-group">
                            <label>Bank Name</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Bank Name">
                        </div>
                        <div class="form-group">
                            <label>Identifier</label>
                            <input class="form-control" type="text" name="identifier" id="identifier" value="{{ old('identifier') }}" placeholder="Identifier">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
