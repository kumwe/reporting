# Changelog

## 0.1.1 - 2026-09-07

- Ship consumer-readable v2 manifests and YAML handoff with package-local governance drift checks and refreshed App consumer inventory.

- Detach report and projection collections and default parameters from caller references so validated output fields and checksums remain immutable. Resolve published dependency releases from Packagist without obsolete root VCS overrides.
- Add package-owned regression tests and refresh extraction handoff, dependency and release documentation.
- Keep exact stable dependency requirements; grouped weekly update PRs re-run the package gate.

## 0.1.0 - 2026-09-07

- Use published Business Definition 0.1.0, Access Control 0.1.0 and Integration 0.1.0 with stable Composer resolution.

### Added

- Bounded report and projection definitions with neutral projection contracts.
- NRM-2026-033: package extraction enabling the Version 2 migration. Roadmap impact: enables; no completion claim.

Normal publication verifies exact stable dependency tag, source and dist identity.
Independent attestations remain optional separate verification evidence.
