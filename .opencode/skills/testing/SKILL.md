---
name: testing
description: |
  Use when the user says "test", "spec", "unit test", "integration test", "e2e", "coverage",
  "jest", "vitest", "cypress", "playwright test", "mocha", "chai", "assert", "mock",
  "stub", "spy", "snapshot", "TDD", "regression", "test case". Covers writing and
  running tests, test patterns, and coverage.
---

# Testing Skill

## Approach
- Follow existing test patterns in the project (same framework, same structure).
- Write tests first for bug fixes (regression tests). Write tests alongside new code.
- Prefer behavior-driven tests: test what the code does, not how it implements it.
- Keep tests simple and readable — each test should have one clear assertion.

## Structure
- Name tests clearly: `describe('feature')` / `it('should do X when Y')`.
- Arrange → Act → Assert pattern.
- Avoid test interdependence. Use `beforeEach` for fresh state.
- Mock at boundaries (API, filesystem, timers) — not internal modules.

## Coverage goals
- Aim for coverage of critical paths: error states, edge cases, empty states, loading states.
- 100% coverage isn't the goal — meaningful coverage of risk areas is.
- Test public API / behavior, not private implementation details.

## What to test
- Business logic, data transformations, conditional branches.
- Error handling, boundary values, null/undefined inputs.
- User flows (integration) and critical paths (e2e).
- Do NOT test: framework behavior, third-party libraries, trivial getters/setters.
