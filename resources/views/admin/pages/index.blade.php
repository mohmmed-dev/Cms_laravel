@extends('layouts.dashboard')

@section('title',__('Pages'))

@section('content')
    <div class="container">
        <div class="mt-4 border-2 border-zinc-200 rounded-md pt-2 overflow-hidden">
            <a href="{{route('pages.create')}}"  class="mx-2 my-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50  ease-in-out duration-150">+ {{__('Create')}}</a>
            <div>
                <div class="relative overflow-x-auto ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-slate-950 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Number")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Title")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Slug")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Edit")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Delete")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @forelse ($pages as $page)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap d">
                                    {{$page->id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$page->string}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$page->slug}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('pages.edit',$page->id)}}" class=" text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3b82f6" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <form  action="{{route('pages.destroy',$page->id)}}" method="POST" onsubmit="return confirm('You Are Suer')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 bg-transparent">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                {{-- <div>{{__("Empty")}}</div> --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">{{$pages->links()}}</div>
    </div>
@endsection
