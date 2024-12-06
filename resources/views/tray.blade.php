<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('2baa0dc9e98f7e9ce928', {
      cluster: 'mt1'
    });

    //  let post_userId = 22;
    //     var channel = pusher.subscribe('real-notification.'+post_userId);
    //     channel.bind('App\\Events\\commentNotification', function(data) {
    //     console.log(data['name']);
    //     console.log('me here');
    //     // console.log(e.order + 'dkd');
    //     });
  </script>

   <script type="module">
        let post_userId = {{auth()->user()->id}};
            Echo.private(`real-notification.22`)
                .listen('commentNotification', (e) => {
                    console.log(e);
                    console.log('me here');
                });
    </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>

