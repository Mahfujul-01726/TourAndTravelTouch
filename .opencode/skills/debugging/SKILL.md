---
name: debugging
description: |
  Use when the user says "bug", "error", "fix", "broken", "not working", "crash", "exception",
  "issue", "problem", "wrong", "incorrect", "unexpected", "fails", "failure", "stack trace",
  "debug", "troubleshoot", "log", "console", "devtools". Covers systematic debugging,
  error analysis, and root cause identification.
---

# Debugging Skill

## Process
1. Reproduce: understand exactly what input/action triggers the bug.
2. Isolate: narrow to specific file, function, or line using binary search or log points.
3. Identify root cause: check data flow, state mutations, async timing, edge cases.
4. Fix with minimal change. Don't refactor unrelated code.
5. Verify: confirm the fix works and doesn't break existing behavior.

## Common checks
- Console/network errors, API response shapes, null/undefined references.
- Race conditions in async code (Promises, callbacks, event listeners).
- State management: stale closures, incorrect state updates, missing immutability.
- Type mismatches, incorrect imports, missing environment variables.
- CSS: specificity wars, missing units, z-index stacking, overflow hidden.

## Tooling
- Use `console.log` / `console.table` for quick inspection — use descriptive labels.
- Prefer browser DevTools (Elements, Console, Network, Sources, React DevTools).
- Read error stack traces top-to-bottom — your code is usually in the top 3 frames.

## After fixing
- Add a test case that covers the bug scenario (regression test).
- Consider if a linter rule or type improvement could have caught it.
