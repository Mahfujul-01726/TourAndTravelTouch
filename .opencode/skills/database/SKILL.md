---
name: database
description: |
  Use when the user says "database", "DB", "SQL", "PostgreSQL", "MySQL", "SQLite", "MongoDB",
  "Redis", "query", "table", "schema", "migration", "index", "join", "foreign key",
  "primary key", "relation", "ORM", "Prisma", "TypeORM", "Drizzle", "Sequelize",
  "Knex", "connection pool", "transaction", "ACID", "normalization", "denormalization",
  "seed", "backup", "restore". Covers database schema design, queries, and migrations.
---

# Database Skill

## Schema design
- Use proper data types (not everything should be VARCHAR or TEXT).
- Normalize to 3NF unless performance demands denormalization.
- Use UUIDs or auto-increment integers for primary keys.
- Define foreign keys with `ON DELETE CASCADE` or `SET NULL` explicitly.
- Add `created_at` / `updated_at` timestamps to every table.

## Queries
- Use parameterized queries / prepared statements. Never concatenate user input.
- Add EXPLAIN ANALYZE to slow queries. Look for sequential scans on large tables.
- Select only needed columns — avoid `SELECT *`.
- Use LIMIT/OFFSET or cursor-based pagination. Offset pagination struggles at scale.
- Avoid N+1 by using JOIN or batch loading (DataLoader, IN clauses).

## Indexing
- Index foreign keys, frequently queried columns, and columns used in WHERE/ORDER BY.
- Use composite indexes for multi-column queries (column order matters).
- Don't over-index — each index slows writes. Monitor unused indexes.
- Use partial indexes for filtered queries (`WHERE deleted_at IS NULL`).

## Migrations
- Every schema change gets a migration file. Never alter production schema manually.
- Write reversible migrations (up and down).
- Test migrations against a copy of production data before running.
- For large tables, use online migration tools (pt-online-schema-change, `gh-ost`).
