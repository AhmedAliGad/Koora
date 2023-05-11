importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyDqateAoExTW0NOCt6mEuy0-FcCkBOc8ss",
    projectId: "fntickets-28ea0",
    messagingSenderId: "1007334359714",
    appId: "1:1007334359714:web:0260e9a2a114c67e5acdfb",
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
