@extends('layouts.dashboard')

@section('title',__('Categories'))

@section('content')
    <div class="container">
        <div class="mt-4 border-2 border-zinc-200 rounded-md pt-2 overflow-hidden">
            <form class=" overflow-hidden flex flex-wrap gap-2  items-center " action="{{route('users.update',$user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class=" w-96 mx-2">
                    <label for="name" class="block text-sm mx-2">{{__("Name")}}</label>
                    <input  type="text" id="name" value="{{$user->name}}" name="name" class=" w-full rounded-md inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("Name")}}">
                    @error('name')
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="  w-96 col-span-1">
                    <label for="email" class="block text-sm mx-2">{{__("Email")}}</label>
                    <input type="email" value="{{$user->email}}"  id="email" name="email" class="w-full rounded-md inline-block my-2 text-sm font-medium text-gray-900 hover:border-gray-900  mx-2 bg-gray-50 focus:ring-slate-500 focus:border-slate-500" placeholder="{{__("Email")}}">
                    @error('email')
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class=" col-span-1 ">
                    <label for="role_id" class="block text-sm mx-2">{{__("Select Role")}}</label>
                    <select  name="role_id" id="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500  block  py-2 p-7 w-72 m-2 cursor-pointer">
                        @include('list.roles' , ['roleId' => $user->role_id])
                    </select>
                    @error('role_id')
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class=" col-span-1 mt-4 ">
                <x-button >
                    {{ __('Update') }}
                </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
