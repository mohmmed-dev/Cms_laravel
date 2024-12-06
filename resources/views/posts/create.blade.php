@extends('layouts.main')

@section('style')
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

@endsection

@section('content')
    <div class=" grid grid-cols-12 justify-center gap-2 mx-2 ">
        <div class=" col-span-8">
            <h2 class="h-4 text-2xl my-4">
                {{__("Add A New Post")}}
            </h2>
            <form class="mt-2" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" bg-zinc-200 mb-3 p-2 overflow-hidden">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 ">{{__("Categories")}}</label>
                    <div>
                        <select id="categories" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500  block w-full p-2.5 cursor-pointer">
                            @include('list.categories')
                        </select>
                    </div>

                    <label for="title" class="block my-2 text-sm font-medium text-gray-900">{{__('Title')}}</label>
                    <div>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:ring-slate-500 focus:border-slate-500" type="text" name="title" id="title" value="{{old('title')}}">
                        @error('title')
                            <strong class="text-red-500">{{$message}}</strong>
                        @enderror
                    </div>

                    <label for="body" class="block my-2 text-sm font-medium text-gray-900">{{__('Content')}}</label>
                    <div>
                        <textarea name="body" id="editor"  rows="4" class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border  focus:ring-slate-500 focus:border-slate-500 ">{{old('body')}}</textarea>
                        @error('body')
                            <strong class="text-red-500">{{$message}}</strong>
                        @enderror
                    </div>

                    <label for="image" class="block my-2 text-sm font-medium text-gray-900">{{__("Add Image")}}</label>
                    <div>
                        <input onchange="readCoverImage(this)" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " accept="image/*"  id="image" name="image" type="file">
                        @error('body')
                            <strong class="text-red-500">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class=" my-3 w-32  h-24 border-2">
                            <img src="" alt="" id="cover-image-thumb">
                    </div>
                    <div class="my-2">
                        <x-button >
                            {{ __('Save') }}
                        </x-button>
                    </div>
                    </div>
            </form>
        </div>
        @include('partials.sidebar')
    </div>
@endsection


@section('script')
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    <script>
        let dir = {{Js::from( app()->getLocale() == 'ar' ? 'rtl' : 'ltr')}} ;
        let lang = {{Js::from( app()->getLocale()) }};
            new FroalaEditor('#editor', {
            direction: dir,
            language: lang,
            toolbarButtons: ['undo', 'redo' , 'italic', 'bold', 'formatOL', 'formatUL', '|', 'rightToLeft', 'leftToRight'],
            })
    </script>
    <script>
        function readCoverImage(input) {
        var file = input.files[0];
        var reader  = new FileReader();
        reader.onload = function(e)  {
            var imgElement = document.getElementById('cover-image-thumb');
            imgElement.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    </script>
@endsection
