<div>
        @foreach ($comments as $comment)
            <div class=" bg-zinc-200 my-3 p-2 rounded-md border-2 border-slate-700 ">
                <div class="flex  gab-x-2 items-center">
                    <img src="{{$post->user->image()}}" class="w-14 h-14 rounded-full "></img>
                    <div class=" w-full">
                        <h3 class="mx-3 font-bold">{{$comment->user->name}}</h3>
                        <div class=" flex justify-evenly items-center">
                            <div><p>{{$comment->created_at->diffForHumans()}}</p></div>
                            <div class=" cursor-pointer" onclick="addComment({{Js::from($comment->id)}})"><a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </a></div>
                        </div>
                    </div>
                </div>
                <p  class="mt-3 mb-5 px-5">{{$comment->body}}</p>
                <div class="hidden" id="comment-{{$comment->id}}">
                @include('comments.create' , ['post_id' => $post->id,'routeName' => 'reply.add','comment_id' =>  $comment->id])
                </div>
                <div class="mx-3">
                    @include('comments.all' , ['comments' => $comment->replies,'post_id' => $post->id])
                </div>
            </div>
        @endforeach
</div>
