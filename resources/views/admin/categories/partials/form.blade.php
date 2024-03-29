<label for="">Статус</lablel>
 <select class="form-control" name="published">

@if (isset($category->id))
    <option value="0" @if($category->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1"  @if($category->published == 1) selected="" @endif>Опубликовано</option>
@else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
@endif

 </select>

<label for="">Наименование</lablel>
  <input type="text" class="form-control" name="title" placeholder="Заголовок категории"
    value="{{$category->title or ""}}" required></input>

<label for="">Slug</lablel>
  <input type="text" class="form-control" name="slug" placeholder="Автоматичекская генерация"
    value="{{$category->slug or ""}}" readonly></input>

<label for="">Родительская категория</lablel>
  <select class="form-control" name="parent_id">

     <option value="0">-- без родительской категории --</option>
     @include('admin.categories.partials.categories', ['categories' => $categories])
  </select>

  <hr>

  <input class="btn btn-primary" type="submit" value="Сохранить">
