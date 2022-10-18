<form action="/products" class="ajax-form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input  type="text" name="name" class="form-control" placeholder="Title">
    </div>
    <div class="form-group">
        <textarea id="ckeditor" name="description" class="form-control" placeholder="Description"></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="form-action">
        <input type="submit" class="btn btn-primary">
    </div>
</form>

<script>
    CKEDITOR.replace('ckeditor');
</script>
