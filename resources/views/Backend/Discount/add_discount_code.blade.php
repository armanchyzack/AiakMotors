@extends('Backend.Layouts.back_end_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="text-center">Discount Code</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add a Discount Code</h5>
        <span class="col-6 text-end"><a href="{{ route('discount.code.all') }}" class="btn btn-success btn-sm">All  Discount Code</a></span>
        <hr>
      <form action="{{ route('discount.code.store') }}" method="POST" >
        @csrf
        <div class="mb-3">
          <label class="form-label">Discount Code</label>
          <input type="text" name="name" class="form-control">
          <span class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Discount Code Slug</label>
            <input type="text" name="slug" class="form-control">
            <span class="text-danger">
                @error('slug')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
          <label class="form-label">Discount Percentage</label>
          <input type="number" name="percentage" class="form-control">
          <span class="text-danger">
            @error('percentage')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-select" aria-label="Default select example" name="status">
            <option selected>Open this select Status</option>
            <option value="0">Active</option>
            <option value="1">Deactive</option>
          </select>
          <span class="text-danger">
            @error('percentage')
                {{ $message }}
            @enderror
        </span>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>

@push('customJs')
<script>
    //?   no relode slug genarate same to same as title

    let title = $('input[name="title"]')
            let slug = $('input[name="slug"]')
            title.keyup(function(){
                let value=$(this).val().toLowerCase().split(' ').join('-')
                slug.val(value)
            })



 // image preview

 $(document).ready(function() {
                $("#file-input").on("change", function() {
                    var files = $(this)[0].files;
                    $("#preview-container").empty();
                    if (files.length > 0) {
                        for (var i = 0; i < files.length; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<div class='preview'><img src='" + e.target.result +
                                    "'><button class='delete'>Delete</button></div>").appendTo(
                                    "#preview-container");
                            };
                            reader.readAsDataURL(files[i]);
                        }
                    }
                });


                $("#preview-container").on("click", ".delete", function() {
                    $(this).parent(".preview").remove();
                    $("#file-input").val(""); // Clear input value if needed
                });
            });

</script>
@endpush
@endsection
