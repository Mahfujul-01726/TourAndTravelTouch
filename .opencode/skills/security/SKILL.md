---
name: security
description: |
  Use when the user says "security", "vulnerability", "CVE", "XSS", "SQL injection", "CSRF",
  "authentication", "authorization", "auth", "OAuth", "JWT", "token", "password", "hash",
  "encrypt", "HTTPS", "CORS", "helmet", "OWASP", "sanitize", "validate", "escape",
  "dangerous", "exploit", "hack", "injection", "leak", "secret", "key", "API key",
  "environment variable", "permission", "access control". Covers security best practices
  and vulnerability prevention.
---

# Security Skill

## Core principles
- Never hardcode secrets, API keys, tokens, or passwords. Use environment variables or secrets managers.
- Validate and sanitize all user input — on both client and server.
- Use parameterized queries (not string concatenation) for database operations.
- Apply least-privilege principle: only request/grant the permissions needed.

## Web security
- Set security headers: `Content-Security-Policy`, `X-Frame-Options`, `X-Content-Type-Options`, `Strict-Transport-Security`.
- Use HTTPS everywhere. Enable HSTS.
- Implement CSRF protection for state-changing requests.
- Escape output to prevent XSS — use template auto-escaping or sanitize manually.
- Set `httpOnly` and `secure` flags on cookies. Use `SameSite=Strict` or `Lax`.

## Authentication & authorization
- Hash passwords with bcrypt (or argon2). Never store plaintext or use weak hashes (MD5, SHA1).
- Use short-lived JWT with refresh tokens. Store tokens securely (httpOnly cookie, not localStorage).
- Implement rate limiting on auth endpoints. Lock accounts after N failed attempts.
- Validate all access control checks server-side — never rely solely on client-side checks.

## Dependencies
- Keep dependencies updated. Use `npm audit`, `snyk`, or Dependabot.
- Pin versions in production. Review major version upgrades for breaking changes.
- Avoid unnecessary dependencies — fewer packages = smaller attack surface.
