@extends('layout.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ asset('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="imgpath">Upload Image:</label>
                        <input type="file" name="imgpath" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@if ($message)
<script>
    alert('{{ $message }}');
</script>
@endif
@endsection
