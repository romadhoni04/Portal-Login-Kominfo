// public/service-worker.js

self.addEventListener('install', function(event) {
    // Install step - cache important files
    event.waitUntil(
        caches.open('offline-cache').then(function(cache) {
            return cache.addAll([
                '/',
                '/offline',
                // Tambahkan file lain yang diperlukan
            ]);
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        fetch(event.request).catch(function() {
            return caches.match(event.request).then(function(response) {
                return response || caches.match('/offline');
            });
        })
    );
});
