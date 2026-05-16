---
name: efficiency
description: |
  Use when the user says "fast", "speed", "quick", "efficient", "concise", "accelerate", "optimize", 
  "batch", "reduce tokens", "faster", "turbo", or otherwise asks to work more quickly or efficiently.
  Use ONLY when the user explicitly requests speed or efficiency improvements.
---

# Efficiency Mode

When this skill is active, follow these rules strictly:

## Be ultra-concise
- Maximum 1-3 lines of text per response (excluding tool use and code output).
- Skip all preamble, postamble, explanations, and summaries.
- Never ask clarifying questions unless absolutely critical.
- Never explain what you just did — the code speaks for itself.

## Batch aggressively
- Make ALL independent tool calls in a single message.
- Never make sequential tool calls when they can be parallelized.
- Use glob/grep/search tools in parallel batches.

## Minimize turns
- Prefer `edit` over `write` (fewer tokens).
- When exploring, use `task` agents for deep research instead of back-and-forth.
- Don't verify unless asked — trust your output.

## Tool discipline
- Avoid `todowrite` — it adds tokens.
- Avoid `question` unless the answer genuinely blocks progress.
- Use `webfetch` / `bash` / `glob` / `grep` over reading entire files.
