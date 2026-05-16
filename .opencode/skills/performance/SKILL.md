---
name: performance
description: |
  Use when the user says "performance", "slow", "lag", "optimize", "fast", "speed up",
  "bottleneck", "profiling", "memory leak", "render", "re-render", "cache", "memoize",
  "lazy load", "bundle size", "tree shake", "code split", "latency", "throughput",
  "response time", "TTFB", "LCP", "FID", "CLS", "Web Vitals", "audit", "Lighthouse".
  Covers performance optimization, profiling, and caching strategies.
---

# Performance Skill

## Frontend
- Minimize re-renders: use `React.memo`, `useMemo`, `useCallback` judiciously.
- Virtualize long lists (react-window, react-virtuoso).
- Lazy load routes and heavy components. Use dynamic imports for code splitting.
- Optimize images: lazy loading, responsive srcset, modern formats (WebP/AVIF).
- Reduce bundle size: tree-shake, remove dead code, prefer lodash-es over lodash.

## Backend
- Add database indexes for frequently queried columns.
- Use connection pooling. Set pool limits based on concurrent user load.
- Implement caching: in-memory (Redis), HTTP (CDN), database query cache.
- Profile with APM tools or `clinic.js` / `py-spy` / `pprof`.
- N+1 queries: eager load or batch related data. Use DataLoader pattern.

## Network
- Enable compression (Brotli > Gzip). Serve static assets via CDN.
- Use HTTP/2 or HTTP/3. Enable keep-alive.
- Set appropriate cache headers (`Cache-Control`, `ETag`) for static and dynamic resources.
- Preconnect to third-party origins. Preload critical assets.

## Measurement
- Always measure before and after optimization. Use Lighthouse, Web Vitals, or `perf_hooks`.
- Establish performance budgets (bundle size, LCP, TTFB). Fail CI when budgets are exceeded.
