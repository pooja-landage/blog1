<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<div class="container"   >
<form action={{route('product.form.update', $data->id)}} method="POST">
<input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group" >
    <label for="exampleInputTitle">Title</label>
    <input type="text" value="{{ $data->title}}" id="Title" name="title"  class="form-control" aria-describedby="TitleHelp">
    <small id="Title" class="form-text text-muted"></small>
  </div>
  <div class="form-group" >
    <label for="exampleInputSlug">Slug</label>
    <input type="text" id="Slug" name="slug"  class="form-control" aria-describedby="slugHelp" placeholder="Slug Title" value="{{ old('slug') }}">
    <small id="Slug" class="form-text text-muted"></small>
  </div>
  <div class="form-group" >
    <label for="exampleInputAuthor">Author</label>
    <input type="text" id="Author" name="author"  class="form-control" aria-describedby="AuthorHelp" placeholder="Enter Author" value="{{ old('author') }}">
    <small id="Author" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputDescription">Description</label>
    <textarea type="text"  id="Description" name="description" class="form-control" >{{ $data->description }}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputImage">Image</label>
    <input id="input-b2" name="image" type="file" class="file" data-show-preview="false" aria-describedby="ImageHelp" placeholder="Insert Image">
    <small id="Image" class="form-text text-muted"></small>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  

</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>