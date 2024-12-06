@extends('layouts.main')

@section('content')
    <div class="container mx-auto">
        <div class="mb-2">
            <div class="flex justify-center items-center flex-col mt-5">
            <img src="{{$contents->image()}}" class=" w-28 h-28 rounded-full "></img>
                <h2 class="mt-4 text-2xl">{{$contents->name}}</h2>
            </div>
        </div>
    </div>
    <div class="px-4">
        @php
            $user = $contents->id;
            $comments = Route::current()->getName() == 'user.comments';
        @endphp
        <ul class="px-3 border-b-2 border-b-zinc-300 flex gap-x-2 " >
            <li class="text-xl {{ $comments  ? 'text-black' : ' text-white bg-slate-950'}}   rounded-t-md p-2 hover:bg-slate-900 hover:text-white ">
                <a href="{{route('profile.show.user',$user)}}">{{__("Posts")}}</a>
            </li>
            <li class="text-xl {{ $comments  ? 'text-white bg-slate-950': 'text-black'}} rounded-t-md p-2 hover:bg-slate-900 hover:text-white ">
                <a href="{{route('user.comments',$user)}}">{{__("Comments")}}</a>
            </li>
        </ul>
        <div class="my-3">
            @if ($comments)
            @include('user.comments_section')
            @else
            @include('user.posts_section')
            @endif
        </div>
    </div>
@endsection
