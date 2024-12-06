<div class=" relative">
    {{-- Nothing in the world is as soft and yielding as water. --}}
        @forelse ($notifications as $notification)
        <a href="{{route('post.show',$notification->post->slug)}}" class="p-1 my-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
            <div class="w-12 h-12 bg-black rounded-full "></div>
                {{-- <h3 class="mx-3 font-bold">{{$notification->user->image}}</h3> --}}
                <div class="flex flex-col">
                    <span class=" font-bold">{{$notification->created_at->diffForHumans()}}</span>
                    <div>
                        <h5 class="">{{$notification->user->name .__("Add New Comment") . $notification->post->title}}</h5>
                    </div>
                </div>
            </a>
            @empty
            <div class="p-1 my-1 rounded-md flex items-center justify-center">
                {{__("Empty")}}
            </div>
        @endforelse
</div>





