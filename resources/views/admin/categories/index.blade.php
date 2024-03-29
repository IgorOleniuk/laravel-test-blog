@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
      @component('admin.components.breadcrumb')
        @slot('title') Список категорий @endslot
        @slot('parent') <span class="mr-1">Главная </span> @endslot
        @slot('active') / Категории @endslot
      @endcomponent

      <hr>
      <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
        <i class="fa fa-plus-square-o"></i> Создать категорию</a>
      <table class="table table-striped">
        <thead>
           <th>Наименования</th>
           <th>Публикация</th>
           <th class="text-right">Дейстивия</th>
        </thead>
        <tbody>
            @forelse ($categories as $category)
              <tr>
                <td>{{$category->title}}</td>
                <td>{{$category->published}}</td>
                <td class="text-right">

                  <form onsubmit="return confirm('Удалить?')"
                  action="{{route('admin.category.destroy', $category)}}"  method="post">
                      <input type="hidden" name="_method" value="DELETE">
                      {{csrf_field() }}
                      <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}">
                        <i class="fa fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                  </form>

                </td>
              </tr>

            @empty
              <tr>
                  <td class="text-center" colspan="3"><h2>Данные отсуствуют</h2></td>
              </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
              <td colspan="3">
                <ul class="pagination pull-right">
                    {{$categories->links()}}
                </ul>
              </td>
            </tr>
        </tfoot>
      </table>
  </div>
@endsection
