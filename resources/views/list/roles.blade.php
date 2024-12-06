@foreach ($roles as $role)
    <option value="{{$role->id}}"  @selected($role->id == ($roleId ?? null))>{{__($role->name)}}</option>
@endforeach
