@extends('layouts.main')

@section('title',$page->slug)
@section('content')
    <div class=" grid grid-cols-12 justify-center gap-2 mx-2 ">
        <div class=" col-span-8">
            <div class="bg-zinc-200 mb-3 p-2">
                <div class="p-2 px-8">
                    <h4 class="mb-4">{{$page->string}}</h4>
                        {!! $page->content !!}
                </div>
            </div>
        </div>
        @include('partials.sidebar')
    </div>
@endsection

