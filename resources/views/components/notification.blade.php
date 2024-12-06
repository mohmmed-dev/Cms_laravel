<div>
    <button onclick="showNotification()" class=" relative mt-2">
        <div class=" absolute bottom-1 left-1">
            @livewire('notification-num')
        </div>
        <svg xmlns="http://www.w3.org/2000/svg"  fill="#ffffff" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
        </svg>
    </button>
    <div id="main_box"  class="bg-stone-200 absolute mt-6 hidden left-6 rounded-sm">
        <div id='box' class="w-full p-2">
            <div id="newNot"></div>
            @livewire('bell-alert')
        </div>

        <a href="{{route('all.notification')}}" class="block text-center p-2 bg-zinc-50">{{__("Show All Notification")}}</a>
    </div>
</div>

<script type="module">
let post_userId = {{auth()->user()->id}};
    Echo.private(`real-notification.${post_userId}`)
        .listen('commentNotification', (e) => {
        document.querySelector("#newNot").innerHTML += `
            <a href="route('post.show',${e.post.slug})" class="p-1 my-1 bg-zinc-50 rounded-md flex items-center gap-x-2">
                <div class="w-12 h-12 bg-black rounded-full "></div>
                {{-- <h3 class="mx-3 font-bold">${e.user_image}</h3> --}}
                <div class="flex flex-col">
                    <span class=" font-bold">{{__("New")}}</span>
                    <div>
                        <h5 class="">${e.user_name} {{__("Add New Comment")}} ${e.post_title}</h5>
                    </div>
                </div>
            </a>
        `;
    });

</script>
