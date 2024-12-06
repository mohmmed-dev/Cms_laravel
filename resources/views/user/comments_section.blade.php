{{-- @includeWhen(!count($contents->comments), '') --}}




@foreach ($contents->comments as $comment)
    <div class=" bg-zinc-200 my-3 p-2 rounded-md flex  gab-x-2 items-center relative">
        <div class=" absolute left-1 top-3 ">
            @can('delete-comment', $comment)
                <form  action="{{route('comment.destroy',$comment->id)}}" method="POST" onsubmit="return confirm('You Are Suer')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </form>
            @endcan
        </div>
        <div class="w-20 h-20 bg-black rounded-full"></div>
            <div class="">
                <h3 class="mx-3 font-bold">{{$comment->user->name}}</h3>
                <div class="mx-2"><p>{{$comment->created_at->diffForHumans()}}</p></div>
                <p  class="mt-3 mb-2 px-2">{{Str::limit($comment->body,40)}}</p>
        </div>
    </div>
@endforeach
