{{-- @includeWhen(!count($contents->posts), '') --}}



@foreach ($contents->posts as $post)
    <div class=" bg-zinc-200 mb-3 p-2 rounded-md overflow-hidden relative">
        <div class=" absolute left-2 top-3 flex gap-x-2 flex-row-reverse">
            @can('delete-post', $post)
            <form  action="{{route('post.destroy',$post->id)}}" method="POST" onsubmit="return confirm('You Are Suer')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 bg-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </form>
            @endcan
            @can('update-post', $post)
            <a href="{{route('post.edit',$post->id)}}" class=" text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3b82f6" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
            </a>
            @endcan
        </div>
        <div class=" flex items-center">
            <img src="{{$post->user->image()}}" class="w-20 h-20 rounded-full "></img>
            <div class="w-full">
                <p class="mt-2 mx-3 inline-block"> <strong>{{$post->user->name}}</strong></p>
                <div class="flex items-center w-full justify-evenly ">
                    <div class="m-2 sm:flex items-center gap-x-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class=" w-6 h-6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    <div>{{$post->created_at->diffForHumans()}}</div>
                </div>
                <div class="m-2 sm:flex items-center gap-x-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <div>{{$post->category->title}}</div>
                </div>
                <div class="m-2 sm:flex items-center gap-x-2 text-center ">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-6 h-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                    </svg>
                    </div>
                    <div class=" text-center">{{$post->comments->count()}}</div>
                </div>
            </div>
            </div>
        </div>
        <h4 class="my-2"><a href="{{route('post.show',$post->slug)}}">{{$post->title}}</a></h4>
        <p>{!! Str::limit($post->body , 200) !!}</p>
    </div>
@endforeach