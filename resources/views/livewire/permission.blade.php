<div >
    {{-- Stop trying to control. --}}
    <div class="mt-4 border-2  border-zinc-200 rounded-md pt-2 overflow-hidden">
        <form class=" overflow-hidden" action="{{route('permissions')}}" method="POST">
            @csrf
            <div>
            <label for="role_id" class="block text-sm mx-2">{{__("Select Role")}}</label>
            <select wire:model.change="num"  name="role_id" id="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500  block  py-2 p-7 w-72 m-2 cursor-pointer">
                @include('list.roles')
            </select>
            @error('role_id')
                <strong>{{$message}}</strong>
            @enderror
            </div>
            <div class="grid grid-cols-3 py-2 my-3 mt-4 border-y-2 bg-white ">
                @foreach ($permissions as $permission)
                <div class=" col-span-1 m-2 ">
                    <label class="col-span-1" for="">
                        <input type="checkbox" name="permission[]" @disabled($num == 1) class="mx-1 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:ring-slate-500 focus:border-slate-500" id="permission" @checked(!empty($permission->roles()->find($num)))      value="{{$permission->id}}">
                        {{__($permission->desc)}}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="m-3">
                @if($num !== 1)
                <x-button>
                    {{ __('Add') }}
                </x-button>
                @endif
            </div>
        </form>
    </div>
</div>
