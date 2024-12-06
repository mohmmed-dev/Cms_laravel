@foreach ($categories as $category)
    <option class="cursor-pointer" value="{{$category->id}}" @selected($category->id == ($catId ?? null))>{{$category->title}}</option>
@endforeach
