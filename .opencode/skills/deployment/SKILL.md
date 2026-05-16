---
name: deployment
description: |
  Use when the user says "deploy", "CI", "CD", "pipeline", "Docker", "container",
  "Kubernetes", "k8s", "cloud", "AWS", "Azure", "GCP", "Heroku", "Vercel", "Netlify",
  "serverless", "Lambda", "release", "rollout", "rollback", "production", "staging",
  "environment", "infrastructure", "config", "env file", "build", "bundle", "dist",
  "artifact". Covers CI/CD, Docker, cloud deployment, and release workflows.
---

# Deployment Skill

## CI/CD
- Run lint, type-check, and tests in CI before building.
- Use environment-specific configs (dev/staging/prod) with strict separation.
- Automate deployments: push to branch → CI builds → auto-deploy to staging → manual approval → production.
- Include migration steps in deploy scripts. Always have a rollback plan.

## Docker
- Use multi-stage builds to keep images small. Target `slim` or `alpine` base images.
- Don't run as root in containers. Use a dedicated non-root user.
- Use `.dockerignore` to exclude `node_modules`, `.git`, and build artifacts.
- Pin base image versions. Use `:stable-slim` over `:latest`.

## Environment management
- Use `.env` files with `.env.example` as a template. Never commit `.env`.
- Validate required env vars at startup with clear error messages.
- Use a secrets manager (Vault, AWS Secrets Manager, Doppler) for production secrets.

## Release workflow
- Tag releases with semantic versioning: `v1.2.3`.
- Maintain a changelog. Document breaking changes prominently.
- Use blue/green or canary deploys for zero-downtime updates.
- Monitor after deploy: error rates, latency, resource usage, and rollback triggers.
