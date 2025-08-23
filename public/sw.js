// Service Worker for Video Caching - Niranta
const CACHE_NAME = 'niranta-video-cache-v1';
const VIDEO_URLS = [
    '/vidprofil.mp4'
];

// Install event - cache video files
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => {
                console.log('Video cache opened');
                // Pre-cache critical video files
                return cache.addAll(VIDEO_URLS);
            })
            .catch((error) => {
                console.log('Video caching failed:', error);
            })
    );
});

// Fetch event - serve cached videos
self.addEventListener('fetch', (event) => {
    // Only cache video files
    if (event.request.url.includes('.mp4') || event.request.url.includes('vidprofil')) {
        event.respondWith(
            caches.match(event.request)
                .then((response) => {
                    // Return cached version if available
                    if (response) {
                        console.log('Serving video from cache:', event.request.url);
                        return response;
                    }
                    
                    // Otherwise fetch from network and cache
                    return fetch(event.request)
                        .then((response) => {
                            // Check if valid response
                            if (!response || response.status !== 200 || response.type !== 'basic') {
                                return response;
                            }
                            
                            // Clone response for caching
                            const responseToCache = response.clone();
                            
                            caches.open(CACHE_NAME)
                                .then((cache) => {
                                    console.log('Caching video:', event.request.url);
                                    cache.put(event.request, responseToCache);
                                });
                            
                            return response;
                        })
                        .catch((error) => {
                            console.log('Video fetch failed:', error);
                            // Return offline fallback if needed
                            return new Response('Video temporarily unavailable', {
                                status: 503,
                                statusText: 'Service Unavailable'
                            });
                        });
                })
        );
    }
});

// Activate event - clean up old caches
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheName !== CACHE_NAME && cacheName.includes('niranta-video-cache')) {
                        console.log('Deleting old video cache:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Message event - handle cache management commands
self.addEventListener('message', (event) => {
    if (event.data && event.data.type === 'SKIP_WAITING') {
        self.skipWaiting();
    }
    
    if (event.data && event.data.type === 'CLEAR_VIDEO_CACHE') {
        caches.delete(CACHE_NAME).then(() => {
            console.log('Video cache cleared');
            event.ports[0].postMessage({ success: true });
        });
    }
});
