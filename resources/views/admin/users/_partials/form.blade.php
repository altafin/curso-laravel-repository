@csrf
<div class="form-group">
    <input type="text" value="{{ $category->title ?? old('title') }}" name="title" class="form-control" placeholder="Título">
</div>
{{--
<div class="form-group">
    <input type="text" value="{{ $category->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
--}}
<div class="form-group">
    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descrição">{{ $category->description ?? old('description') }}</textarea>
</div>
<button type="submit" class="btn btn-success">Enviar</button>
