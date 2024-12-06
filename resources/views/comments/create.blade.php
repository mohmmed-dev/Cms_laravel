@auth
    <div class="rounded-md p-2">
        <form class=" overflow-hidden" action="{{route($routeName)}}" id="comment" method="POST">
            @csrf
            <input type="text" name="body" class=" rounded-md w-auto md:w-5/6 inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("Add Comment")}}">
            @error('body')
                <strong>{{$message}}</strong>
            @enderror
            <x-button>
                {{ __('Add') }}
            </x-button>
            <input type="hidden" name="post_id" value="{{$post_id}}">
            <input type="hidden" name="comment_id" value="{{$comment_id ?? null}}">
        </form>
    </div>
@else

@endauth
