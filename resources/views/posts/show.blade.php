@extends('layouts.main')

@section('title',$post->title)
@section('content')
    <div class=" grid grid-cols-12 justify-center gap-2 mx-2 ">
        <div class=" col-span-8">
            <div class="">
                <div class=" bg-zinc-200 mb-3 p-2">
                    <div class=" flex items-center">
                        <img src="{{$post->user->image()}}" class="w-20 h-20 rounded-full "></img>
                        <div>
                            <a href="{{route('profile.show.user',$post->user->id)}}">
                                    <p class="mt-2 mx-3 inline-block"> <strong>{{$post->user->name}}</strong></p>
                            </a>
                                <div class="flex items-center ">
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
            </div>
                <div class="mt-10 px-5">
                @if($post->image_path)
                    <img class=""  style='max-height: 400px;  max-width: 400px;'  src="{{asset('/storage/' . $post->image_path)}}" alt="">
                @endIf
                <div class="mt-3 mb-5 px-5">
                    {!! $post->body !!}
                </div>
                </div>
                @include('comments.create' , ['post_id' => $post->id, 'routeName' => 'comment.store'])
            </div>
            <div>
                <h2>{{__("Comments")}}</h2>
                @include('comments.all' , ['comments' => $comments,'post_id' => $post->id])
            </div>
        </div>
    </div>
        @include('partials.sidebar')
    </div>
@endsection

@section('script')
    <script>
        function addComment(id) {
            let comment = document.querySelector('#comment-'+id);
            comment.classList.toggle('hidden');
        }
    </script>
@endsection
