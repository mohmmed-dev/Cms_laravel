<div class=" relative flex justify-center items-center">
    {{-- Be like water. --}}
        <div wire:click="show" class=" cursor-pointer {{$check ? "inline-flex items-center px-1 py-4 border-b-2 border-white text-sm font-medium leading-5  focus:outline-none focus:border-white transition duration-150 ease-in-out": "inline-flex items-center px-1 py-5 border-b-2 border-transparent text-sm font-medium leading-5 text-white  hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out"  }}">
            {{ __('Pages') }}
        </div>
        @if($check)
        <div  class="bg-stone-100 absolute w-44 top-16  right-0  left-6 rounded-md  z-50">
            <div class="w-full p-1">
                @forelse ($pages as $page)
                    <a href="{{route('pages.show',$page->id)}}" class=" transition duration-150 ease-in-out hover:pb-4 hover:py-2 p-1 pb-2 text-black border-b-2 border-zinc-200 block">
                        <
                        {{$page->slug}}
                    </a>
                    @empty
                    <div class="p-1 my-1 rounded-md flex items-center justify-center text-black">
                        {{__("Empty")}}
                    </div>
                @endforelse
            </div>
        </div>
        @endif



</div>


