@if ($product)
<form action="/products/{{ $product->id }}" class="ajax-form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">

    <div class="form-group">
        <input value={{$product->name}} type="text" name="name" class="form-control" placeholder="Title">
    </div>
    <div class="form-group">
        <textarea value={{$product->description}} id="ckeditor" name="description" class="form-control" placeholder="Description">{{$product->description}} </textarea>
    </div>
    <div class="form-group">
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="form-action">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
@endif
<script>
    CKEDITOR.replace('ckeditor');
</script>
