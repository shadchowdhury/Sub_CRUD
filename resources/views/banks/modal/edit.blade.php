<!-- Modal -->
<div class="modal fade" id="bankModal{{ $bank->id }}" tabindex="-1" role="dialog" aria-labelledby="bankModalLable" aria-hidden="true">
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
                <input type="text" name="id" value="{{ @$bank->id }}" hidden>
                <div class="form-group">
                    <label>Bank Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ @$bank->name }}" placeholder="Bank Name">
                </div>
                <div class="form-group">
                    <label>Identifier</label>
                    <input class="form-control" type="text" name="identifier" id="identifier" value="{{ @$bank->identifier }}" placeholder="Identifier">
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