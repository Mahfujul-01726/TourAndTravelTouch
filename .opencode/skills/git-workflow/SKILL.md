---
name: git-workflow
description: |
  Use when the user says "git", "commit", "push", "pull", "branch", "merge", "rebase",
  "PR", "pull request", "stash", "checkout", "diff", "log", "status", "clone", "remote",
  "origin", "upstream", "conflict", "resolve", "cherry-pick", "revert", "reset", "tag",
  "release", "version control", "VCS", "GitHub", "GitLab". Covers version control
  operations, commit conventions, and branching strategies.
---

# Git Workflow Skill

## Commit conventions
- Follow Conventional Commits: `feat:`, `fix:`, `refactor:`, `chore:`, `docs:`, `test:`, `perf:`.
- Commit message format: `<type>(<scope>): <present-tense description>`.
  Example: `feat(auth): add OAuth2 login flow`
- Keep commits atomic — one logical change per commit.

## Branching
- Main branches: `main` (production), `develop` (integration).
- Feature branches: `feat/<short-description>`, `fix/<issue-number>-<description>`.
- Keep feature branches short-lived. Rebase onto target branch before PR.

## Best practices
- Write meaningful commit messages that explain *why*, not just *what*.
- Review `git diff` before committing. Don't commit debug code, `console.log`, commented code.
- Resolve conflicts by understanding both sides, not just picking one.
- Never force-push to shared branches unless you're absolutely sure.
- Use `.gitignore` from the start. Never commit secrets, env files, or build artifacts.
