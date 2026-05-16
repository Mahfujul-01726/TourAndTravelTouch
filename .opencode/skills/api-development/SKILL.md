---
name: api-development
description: |
  Use when the user says "API", "endpoint", "REST", "GraphQL", "route", "controller",
  "handler", "middleware", "request", "response", "JSON", "serialize", "deserialize",
  "HTTP", "status code", "CRUD", "resource", "webhook", "API key", "rate limit",
  "pagination", "filter", "sort", "validation", "schema", "OpenAPI", "Swagger",
  "Postman". Covers API design, implementation, and documentation.
---

# API Development Skill

## RESTful design
- Use resource-oriented URLs: `GET /users`, `POST /users`, `GET /users/:id`.
- Use proper HTTP methods: GET (read), POST (create), PUT (replace), PATCH (partial update), DELETE (remove).
- Use consistent status codes: 200 (ok), 201 (created), 204 (no content), 400 (bad request), 401 (unauthorized), 403 (forbidden), 404 (not found), 409 (conflict), 422 (validation), 429 (rate limit), 500 (server error).
- Version APIs: `/v1/users` or `Accept: application/vnd.api+json; version=1`.

## Response format
- Consistent JSON envelope: `{ data, error, meta, pagination }`.
- Use snake_case or camelCase consistently. Prefer camelCase for JS/TS.
- Include meaningful error messages and error codes.
- Support pagination with `page`, `limit`, `total`, `hasMore` fields.

## Best practices
- Validate all input with a schema (Zod, Joi, Yup, class-validator).
- Rate limit by IP and/or user. Return `Retry-After` header on throttling.
- Use ETags or `If-Modified-Since` for caching. Support conditional requests.
- Log requests with correlation IDs for debugging.
- Document with OpenAPI/Swagger. Include examples for requests and responses.
