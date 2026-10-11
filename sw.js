/* CampusPlay Service Worker
   Strategy:
   - HTML navigations: network-first, cached fallback, offline page last.
   - Static assets: cache-first.
   - Everything else: stale-while-revalidate.
*/

const CACHE_NAME = "campusplay-v1";
const OFFLINE_URL = "/campusplay/offline.html";

const PRECACHE = [
  "/campusplay/",
  "/campusplay/index.php",
  "/campusplay/sports.php",
  "/campusplay/about.php",
  "/campusplay/contact.php",
  "/campusplay/assets/css/style.css",
  "/campusplay/assets/js/main.js",
  "/campusplay/assets/icons/icon-192.png",
  "/campusplay/assets/icons/icon-512.png",
  "/campusplay/offline.html",
];

self.addEventListener("install", (event) => {
  event.waitUntil(
    caches
      .open(CACHE_NAME)
      .then((cache) => cache.addAll(PRECACHE))
      .then(() => self.skipWaiting()),
  );
});

self.addEventListener("activate", (event) => {
  event.waitUntil(
    caches
      .keys()
      .then((keys) =>
        Promise.all(
          keys
            .filter((key) => key !== CACHE_NAME)
            .map((key) => caches.delete(key)),
        ),
      )
      .then(() => self.clients.claim()),
  );
});

self.addEventListener("fetch", (event) => {
  const { request } = event;

  if (request.method !== "GET") return;
  if (!request.url.startsWith(self.location.origin)) return;

  // HTML navigations
  if (request.mode === "navigate") {
    event.respondWith(
      fetch(request)
        .then((response) => {
          const copy = response.clone();
          caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
          return response;
        })
        .catch(() =>
          caches
            .match(request)
            .then((cached) => cached || caches.match(OFFLINE_URL)),
        ),
    );
    return;
  }

  // Static assets
  if (/\.(css|js|png|jpe?g|svg|webp|woff2?)$/i.test(request.url)) {
    event.respondWith(
      caches.match(request).then((cached) => {
        if (cached) return cached;
        return fetch(request).then((response) => {
          const copy = response.clone();
          caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
          return response;
        });
      }),
    );
    return;
  }

  // Everything else: stale-while-revalidate
  event.respondWith(
    caches.match(request).then((cached) => {
      const fetched = fetch(request).then((response) => {
        const copy = response.clone();
        caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
        return response;
      });
      return cached || fetched;
    }),
  );
});
