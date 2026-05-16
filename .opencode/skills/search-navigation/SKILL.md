---
name: search-navigation
description: |
  Use when the user says "find", "search", "locate", "where is", "look for", "explore",
  "navigate", "browse code", "grep", "glob", "pattern", "file name", "code search",
  "explore codebase", "find references", "usages", "definition". Covers efficient
  codebase search and file navigation.
---

# Search & Navigation Skill

## Strategy
- Start broad with `glob` and `grep`, then narrow down. Don't open files prematurely.
- Use parallel search calls — batch independent patterns in one turn.
- Use regex in grep for flexible matching. Escape special characters.

## Patterns
- File types: `**/*.ts`, `**/*.jsx`, `**/*.css` — use glob patterns to narrow.
- Multiple patterns: search for class names, function names, and imports simultaneously.
- Case-insensitive search when unsure of casing.

## Navigation
- Trace imports/exports to follow code flow.
- Use `grep` for symbol references across the codebase.
- Read file headers (first 30 lines) to understand structure before reading entire files.
- For large files, use offset/limit to read relevant sections only.
