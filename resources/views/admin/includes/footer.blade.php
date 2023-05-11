<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong>All Rights Reserved ©    Co. {{date('Y')}} |</strong> <a target="_blank" href="https://www.fndevcs.com/index.html">Developed By FNDEV </a>
        </p>
    </div>
</footer>
@section('scripts')
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->

    <script>
        var user_token = {!! json_encode(auth()->user()->device_token) !!};
        var user_os = {!! json_encode(auth()->user()->device_os) !!}
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyDqateAoExTW0NOCt6mEuy0-FcCkBOc8ss",
            authDomain: "fntickets-28ea0.firebaseapp.com",
            projectId: "fntickets-28ea0",
            storageBucket: "fntickets-28ea0.appspot.com",
            messagingSenderId: "1007334359714",
            appId: "1:1007334359714:web:0260e9a2a114c67e5acdfb",
            measurementId: "G-256RKLMQDM"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        const messaging = firebase.messaging();
        notification = Notification.requestPermission(permission => {
            if(permission === 'granted') {
                if((!user_token) || (user_os != 'web')) {
                    initFirebaseMessagingRegistration();
                }
            }
        });
        function initFirebaseMessagingRegistration() {
            messaging.requestPermission().then(function () {
                return messaging.getToken()
            }).then(function(token) {
                axios.post("{{ route('store_token') }}",{
                    _method:"POST",
                    token
                }).then(({data})=>{
                    console.log(data)
                }).catch(({response:{data}})=>{
                    console.error(data)
                })

            }).catch(function (err) {
                console.log(`Token Error :: ${err}`);
            });
        }
        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            let notification_message = new Notification(noteTitle, noteOptions);
            notification_message.addEventListener('click', () => {
                window.open(payload.notification.click_action);
            });
        });
    </script>
@endsection
