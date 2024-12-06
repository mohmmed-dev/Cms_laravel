@extends('layouts.dashboard')

@section('title',__('Users'))

@section('content')
    <div class="container">
        <div class="mt-4 border-2 border-zinc-200 rounded-md pt-2 overflow-hidden">
            @can('add-user')
                <form class=" overflow-hidden flex flex-wrap items-center " action="{{route('users.store')}}" method="POST">
                    @csrf
                    <div class=" col-span-1">
                        <label for="name" class="block text-sm mx-2">{{__("Name")}}</label>
                        <input type="text" id="name" name="name" class=" rounded-md inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("Name")}}">
                        @error('name')
                            <strong>{{$message}}</strong>
                        @enderror
                    </div>
                    <div class=" col-span-1">
                        <label for="email" class="block text-sm mx-2">{{__("Email")}}</label>
                        <input type="email" id="email" name="email" class=" rounded-md inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("Email")}}">
                        @error('email')
                            <strong>{{$message}}</strong>
                        @enderror
                    </div>
                    <div class=" col-span-1">
                        <label for="password" class="block text-sm mx-2">{{__("Password")}}</label>
                        <input type="password" id="password" name="password" class=" rounded-md inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("Password")}}">
                        @error('password')
                            <strong>{{$message}}</strong>
                        @enderror
                    </div>
                    <div class=" col-span-1">
                        <label for="role_id" class="block text-sm mx-2">{{__("Select Role")}}</label>
                        <select  name="role_id" id="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500  block  py-2 p-7 w-72 m-2 cursor-pointer">
                            @include('list.roles')
                        </select>
                        @error('role_id')
                            <strong>{{$message}}</strong>
                        @enderror
                    </div>
                    <div class=" col-span-1 my-3 mx-2">
                    <x-button >
                        {{ __('Add') }}
                    </x-button>
                    </div>
                </form>
            @endcan
            <div>
                <div class="relative overflow-x-auto ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-slate-950 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Number")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Name")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Email")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Suer Email")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Roles")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Date")}}
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
                            @forelse ($users as $user)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap d">
                                    {{$user->id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$user->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->email}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->email_verified_at}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->role->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->created_at}}
                                </td>
                                @can('update-user')
                                    <td class="px-6 py-4">
                                        <a href="{{route('users.edit',$user->id)}}" class=" text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3b82f6" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>
                                    </td>
                                @endcan
                                @can('delete-user')
                                    <td class="px-6 py-4">
                                        <form  action="{{route('users.destroy',$user->id)}}" method="POST" onsubmit="return confirm('You Are Suer')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 bg-transparent">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                            @empty
                                <div>{{__("Empty")}}</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">{{$users->links()}}</div>
    </div>
@endsection
