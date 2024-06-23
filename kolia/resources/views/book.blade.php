<!DOCTYPE html>
<html>
        <head>
            <title></title>
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


        </head>
    <body>
        <form method="POST" action="{{url('uploadbook')}}" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">id</label>
                <input class="form-control" type="text" name="description" multiple>
              </div>
        <div class="mb-3">
            <label for="formFile" class="form-label"> file name</label>
            <input class="form-control" type="text" name="name">
          </div>

          <div class="mb-3">
            <label for="formFileMultiple" class="form-label">description</label>
            <input class="form-control" type="text" name="description" multiple>
          </div>

          <div class="mb-3">
            <label for="formFileSm" class="form-label"> file </label>
            <input class="form-control form-control-sm" name="file" type="file">
          </div>
          <div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">category_id</label>
                <input class="form-control" type="text" name="category_id" multiple>
              </div>
          </div>
          <div class="mb-3">
            <label for="formFileMultiple" class="form-label">publisher_id</label>
            <input class="form-control" type="text" name="publisher_id" multiple>
          </div>
          <div class="mb-3">
            <label for="formFileMultiple" class="form-label">photo</label>
            <input class="form-control" type="file" name="photo" multiple>
          </div>
          <input  type="submit">
        </form>
    </body>
</html>
