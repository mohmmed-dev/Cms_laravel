<div class=" col-span-4">
    <div class=" bg-zinc-200 m-2 p-2 rounded-md">
        <h5>{{__("Categories")}}</h5>
        <div class=" overflow-hidden">
            <div>{{__("All Categories")}} ({{$posts_number}}) </div>
            <ul class="p-0 mt-2 overflow-y-auto max-h-64 flex flex-wrap gap-x-1">
                @foreach ($categories as $category)
                    <li class="p-1 my-1 bg-zinc-300 rounded-md "><a href="{{route('category',$category->id)}}">{{$category->title}} ({{$category->posts->count()}})</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class=" bg-zinc-200 m-2 p-2 rounded-md">
        <h5>{{__("Lasts Comments")}}</h5>
        <div class="overflow-hidden">
            <div class="p-0 mt-2  ">
                @foreach ($comments as $comment)
                    <a href="{{route('post.show',$comment->post->slug)}}">
                    <div class="p-1 my-1 bg-zinc-300 rounded-md flex items-center">
                        <img src="{{$comment->user->image()}}" class="w-12 h-12 rounded-full "></img>
                        <h3 class="mx-3 font-bold">{{$comment->user->name}}</h3>
                        <div>
                            {{Str::limit($comment->body,40)}}
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
