---
name: image-generation
description: |
  Use when the user says "image", "generate image", "picture", "illustration", "icon", "photo",
  "graphic", "visual", "art", "draw", "create image", "AI image", "DALL-E", "Midjourney",
  "Stable Diffusion", "prompt", "SVG", "canvas", "image processing", "thumbnail".
  Covers AI image generation, SVG creation, image manipulation, and icon design.
---

# Image Generation Skill

## AI image prompts
- Structure prompts: subject + action + environment + lighting + style + mood + medium.
- Include negative prompts for unwanted elements.
- Specify aspect ratio (e.g., 16:9, 1:1, 9:16) and output format.

## SVG generation
- Write clean, semantic SVG inline when possible.
- Use `viewBox` for proper scaling. Keep paths minimal.
- Add `role="img"` and `<title>` for accessibility.
- Use CSS variables in SVG for theme-aware icons.

## Image processing guidelines
- Prefer WebP/AVIF for photos, SVG for icons/illustrations, PNG for screenshots.
- Lazy load images below the fold. Use `loading="lazy"` and `decoding="async"`.
- Use responsive images with `srcset` and `sizes` attributes.
- Compress assets — target <100KB for decorative images, <30KB for thumbnails.

## Design integration
- Match image style to existing brand (color palette, illustration style, photography treatment).
- Use `<picture>` element for art-direction based on viewport.
- Always provide descriptive `alt` text for accessibility.
