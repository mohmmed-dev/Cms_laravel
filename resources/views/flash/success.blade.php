<div>
    @if(Session::has("success"))
    <div onclick="this.delete()" id="flash_message" class=" text-center bg-blue-700 text-xl py-1 text-white mx-3 rounded-md my-1">{{__(session("success"))}}</div>
    @endif
</div>
