const OFFLINE_VERSION = 1;
const CACHE_NAME = 'offline';
const OFFLINE_URL = 'offline.html';
self.addEventListener("install", (event) => {
  event.waitUntil(
    (async () => {
      const cache = await caches.open(CACHE_NAME);
      await cache.add(new Request(OFFLINE_URL, {cache: 'reload'}));
    })()
  );
  self.skipWaiting();
});
self.addEventListener('fetch', (event) => {
  if(event.request.mode !== 'navigate'){
    return;
  }
   event.respondWith((async () => {
     try{
    const netWorkResponse = await fetch(event.request);
      return netWorkResponse;
     }
     catch (event) {
        const cache = await caches.open(CACHE_NAME);
        const cachedResponse = await cache.match(OFFLINE_URL);
        return cachedResponse;
     }
   })())
});

