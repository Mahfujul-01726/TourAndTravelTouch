---
name: auto-browsing
description: |
  Use when the user says "browse", "web", "scrape", "crawl", "automation", "Playwright",
  "Puppeteer", "Selenium", "headless", "browser", "navigate", "fetch URL", "screenshot",
  "web scraping", "automate". Covers browser automation, web scraping, and page interaction.
---

# Auto Browsing Skill

## Approach
- Use Playwright or Puppeteer for browser automation. Prefer Playwright.
- For simple page fetches, use `webfetch` tool. Only spin up a browser for JS-rendered content or multi-step interactions.
- Always set reasonable timeouts (10-30s). Handle `waitFor` / `waitForSelector` gracefully.

## Scraping
- Respect `robots.txt` and website terms. Add polite delays between requests.
- Handle pagination, infinite scroll, and dynamic content loading.
- Extract data with minimal DOM traversal — use structured selectors.
- Handle errors: network failures, CAPTCHAs, rate limiting, blocked requests.

## Best practices
- Use `headless: true` unless debugging.
- Set `user-agent` to modern browser string to avoid blocking.
- Screenshot on failure for debugging. Use full-page screenshots when needed.
- Close browser context after each session to free resources.
