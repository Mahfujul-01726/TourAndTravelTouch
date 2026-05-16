---
name: refactoring
description: |
  Use when the user says "refactor", "clean up", "restructure", "reorganize", "technical debt",
  "improve code", "simplify", "extract", "inline", "rename", "move", "split", "merge",
  "duplicate", "DRY", "complexity", "cyclomatic", "spaghetti", "legacy", "modernize",
  "migrate", "pattern", "architecture". Covers code restructuring, pattern migration,
  and technical debt reduction.
---

# Refactoring Skill

## Principles
- Refactor with purpose: improve readability, reduce complexity, or enable a new feature.
- Never refactor and add features in the same change. One concern per commit.
- Preserve existing behavior. Tests should pass before and after.
- If there are no tests, add characterization tests first to lock in behavior.

## Techniques
- Extract functions/classes/components at clear boundaries.
- Replace conditionals with polymorphism or strategy pattern.
- Eliminate duplication — but prefer duplication over the wrong abstraction.
- Simplify complex conditionals: guard clauses, early returns, enum dispatch.
- Rename for clarity: names should reveal intent. Avoid abbreviations.
- Break large functions into smaller focused ones. A function should do one thing.

## Migration
- For large refactors, use strangler fig pattern — gradual replacement.
- Keep a refactoring log: document what changed and why.
- Run lint and typecheck after each change. Let the type system guide you.

## Anti-patterns to fix
- God classes / long functions (split).
- Shotgun surgery (consolidate scattered logic).
- Primitive obsession (wrap related primitives in value objects).
- Feature envy (move behavior to the data it uses).
- Callback hell / promise chains (use async/await).
