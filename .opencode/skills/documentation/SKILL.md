---
name: documentation
description: |
  Use when the user says "document", "docs", "documentation", "README", "comment", "JSDoc",
  "TSDoc", "wiki", "explain", "how to", "guide", "tutorial", "quickstart", "setup",
  "API docs", "changelog", "CONTRIBUTING", "license", "architecture", "ADR",
  "decision record". Covers writing clear documentation, READMEs, API docs, and guides.
---

# Documentation Skill

## README structure
- Project name and one-line description (what and why).
- Quick start: prerequisites, install, configure, run.
- Usage examples (common commands / code snippets).
- Project structure overview (for moderate-to-large projects).
- Contributing guidelines, testing instructions, deployment notes.
- License and acknowledgments.

## Writing style
- Write for the reader: assume they know nothing about your specific project.
- Prefer active voice, short sentences, and concrete examples.
- Use code blocks with language tags. Keep examples copy-pasteable.
- Document *why* not just *what*. The code already shows what it does.

## Code documentation
- Document public API (functions, classes, modules) with JSDoc/TSDoc.
- Include @param, @returns, @throws, and @example where useful.
- Don't comment obvious code — let the code speak. Comment the non-obvious.
- Keep comments up to date. Stale comments are worse than no comments.

## Maintenance
- Update docs alongside code changes (same PR).
- Use ADRs (Architecture Decision Records) for significant decisions.
- Keep a CHANGELOG following Keep a Changelog / Conventional Commits.
- Link to relevant issues, PRs, and external resources.
