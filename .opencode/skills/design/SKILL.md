---
name: design
description: |
  Use when the user says "design", "UI", "UX", "CSS", "styling", "theme", "layout", "responsive",
  "color", "typography", "Figma", "mockup", "prototype", "frontend", "visual", "branding",
  "aesthetic", "beautiful", "clean", "modern", "polished". Covers UI/UX, CSS, theming, design
  systems, responsive design, and visual polish.
---

# Professional Design Skill

## Design principles
- Follow the existing design system and visual conventions in the project.
- Prioritize accessibility: sufficient color contrast (WCAG AA minimum), readable font sizes, focus indicators, semantic HTML.
- Use consistent spacing (multiples of 4px/8px), typography scale, and color palette.
- Mobile-first responsive design — test mentally at 375px, 768px, 1440px.

## CSS & styling
- Prefer CSS custom properties for theming (`--color-primary`, `--spacing-md`).
- Use modern CSS (Grid, Flexbox, container queries) over hacks.
- Keep specificity low — avoid `!important` and deep nesting.
- Use existing utility classes or component patterns instead of ad-hoc styles.

## UI patterns
- Provide clear visual feedback for all interactive elements (hover, focus, active, disabled).
- Use micro-interactions sparingly — loading states, transitions, animations should serve a purpose, not distract.
- Forms: clear labels, error states, input validation feedback, appropriate input types.
- Respect reduced-motion preferences (`prefers-reduced-motion`).

## Code reviews
- Check for: accessibility gaps, hardcoded colors/values, inconsistent spacing, missing states (empty/loading/error), broken responsive behavior.

## Image & asset guidance
- Recommend modern formats (WebP, AVIF), appropriate compression, responsive images with `srcset`.
- SVG for icons and illustrations — ensure `viewBox` is correct and accessible labels exist.
