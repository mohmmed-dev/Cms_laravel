@extends('layouts.main')

@section('title',$title)
@section('content')
    <div class=" grid grid-cols-12 justify-center gap-2 mx-2 ">
        <div class=" col-span-8">
        @foreach ($notifications as $notification)
        <a href="{{route('post.show',$notification->post->slug)}}" class="p-3 my-2 mx-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
            <div class="w-12 h-12 bg-black rounded-full "></div>
                {{-- <h3 class="mx-3 font-bold">{{$notification->user->image}}</h3> --}}
                <div class="flex flex-col">
                    <span class=" font-bold mb-2">{{$notification->created_at->diffForHumans()}}</span>
                    <div>
                        <h5 class="">{{$notification->user->name . __(" Add Comment In Post ")}} <strong>{{$notification->post->title}}</strong> </h5>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
@endsection

@section('script')

@endsection
