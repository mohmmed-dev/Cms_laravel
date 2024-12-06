@extends('layouts.dashboard')

@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Dashboard')}}</h1>
@endsection
@section('content')
    <div class="container">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            <div class="py-2 px-2 bg-zinc-50 rounded-sm shadow-md  border-l-2 border-red-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Posts')}}</h2>
                    <h2>{{$posts_count}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
            <div class="py-4 px-2 bg-zinc-50 rounded-sm shadow-md  border-l-2 border-blue-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Categories')}}</h2>
                    <h2>{{$categories_count}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
            <div class="py-4 px-2 bg-zinc-50 rounded-sm shadow-md  border-l-2 border-gray-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Users')}}</h2>
                    <h2>{{$users_count}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
            <div class="py-4 px-2 bg-zinc-50 rounded-sm shadow-md  border-l-2 border-green-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Comments')}}</h2>
                    <h2>{{$comments_count}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
        </div>
    </div>
@endsection
