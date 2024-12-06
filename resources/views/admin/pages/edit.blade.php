@extends('layouts.dashboard')

@section('style')
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

@endsection

@section('title',__('Users'))

@section('content')
    <div class="container">
        <div class="mt-4 border-2 border-zinc-200 rounded-md pt-2 overflow-hidden">
            <form class=" overflow-hidden  " action="{{route('pages.update',$page->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class=" ">
                    <label for="slug" class="block text-sm mx-2">{{__("Title")}}</label>
                    <input type="text" id="slug" value="{{$page->slug}}" name="slug" class=" rounded-md inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("Name")}}">
                    @error('slug')
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class=" ">
                    <label for="string" class="block text-sm mx-2">{{__("Description")}}</label>
                    <input type="text" id="string" name="string" value="{{$page->string}}" class=" rounded-md inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("string")}}">
                    @error('string')
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class=" ">
                    <label for="content" class="block my-2 text-sm font-medium text-gray-900">{{__('Content')}}</label>
                    <div>
                        <textarea name="content" id="editor"  rows="4" class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border  focus:ring-slate-500 focus:border-slate-500 ">{{$page->content}}</textarea>
                        @error('content')
                            <strong class="text-red-500">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class=" col-span-1 my-3 mx-2">
                <x-button >
                    {{ __('Add') }}
                </x-button>
                </div>
            </form>
        </div>
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
@endsection
