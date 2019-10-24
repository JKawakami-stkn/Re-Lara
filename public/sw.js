'use strict';

// CODELAB: Update cache names any time any of the cached files change.
const CACHE_NAME = 're-lara-cache-v1';

// CODELAB: Add list of files to cache here.
const FILES_TO_CACHE = [
    '/Re-Lara/css/bootstrap.min.css',
    '/Re-Lara/css/sticky-footer.css',
    '/Re-Lara/cache/offline.html',
    '/Re-Lara/img/logo.png',
    '/favicon.ico',
    '/Re-Lara/img/check.png',
    '/Re-Lara/img/delivery.png',
    '/Re-Lara/img/dl.png',
    '/Re-Lara/img/print.png',
    '/Re-Lara/img/purchase_confirmation.png',
    '/Re-Lara/img/purchase.png',
    '/Re-Lara/img/print.png',
];

self.addEventListener('install', (evt) => {
    console.log('[ServiceWorker] Install');
    // CODELAB: Precache static resources here.
    evt.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            console.log('[ServiceWorker] Pre-caching offline page');
            return cache.addAll(FILES_TO_CACHE);
        })
    );
    self.skipWaiting();
});

self.addEventListener('activate', (evt) => {
    console.log('[ServiceWorker] Activate');
    // CODELAB: Remove previous cached data from disk.
    evt.waitUntil(
        caches.keys().then((keyList) => {
            return Promise.all(keyList.map((key) => {
                if (key !== CACHE_NAME) {
                    console.log('[ServiceWorker] Removing old cache', key);
                    return caches.delete(key);
                }
            }));
        })
    );

    self.clients.claim();
});

self.addEventListener('fetch', (evt) => {
    console.log('[ServiceWorker] Fetch', evt.request.url);
    // CODELAB: Add fetch event handler here.
    if (evt.request.mode !== 'navigate') {
  // Not a page navigation, bail.
  return;
}
evt.respondWith(
    fetch(evt.request)
        .catch(() => {
          return caches.open(CACHE_NAME)
              .then((cache) => {
                  return cache.match('/Re-Lara/cache/offline.html');
              });
        })
);

});