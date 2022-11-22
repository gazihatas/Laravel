<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mt-5">
                <form action="/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    <textarea class="form-control mt-5" name="description" id="editor"></textarea>

                    <button clasas="btn btn-success mt-4" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script> --}}
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ),
                {
                    ckfinder:{
                        uploadUrl:"{{ route('ckeditor.upload').'?_token='.csrf_token()}}"
                    }
                } )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>


</body>
</html>
