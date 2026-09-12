# Releasing Reporting

The newest stable changelog heading selects the package version. An Unreleased-only changelog publishes nothing.
Maintain exact stable Kumwe dependencies and align the canonical API, capability and service manifests with the
recorded version. Existing tags and release assets are never moved, deleted or replaced.

## Shared quality gate

PRs and the default-branch release run call the same Package CI workflow. Package gate requires source/API/schema,
architecture, static analysis, coding standards, behavior/conformance tests, security, dependency readiness and
no-dev archive consumption, plus release automation regression tests. A failed or skipped required job blocks it.

The post-rebase run tests the actual default-branch commit. Publication checks out that exact event SHA,
resolves production dependencies and verifies selected Kumwe stable tag/source/dist identities. The release
helper creates or verifies the recorded tag and release; an existing published ancestor is verified unchanged.
An unfinished tag must identify the exact tested commit. Only confirmed HTTP 404 absence permits creation.

## Evidence and maintenance

Packagist follows repository tags. Published metadata, passing package CI, independent artifact verification and
Core acceptance remain separate observations. Independent verification checks the published source/archive,
canonical manifests, exact dependencies and authoritative clean consumer. The package never invents its own
future commit, archive digest or release attestation.

Normal publication does not require repository administration changes or an external attestation. Existing
GitHub rules and permissions remain effective. Optional repository-hardening and strict dependency-evidence
helpers are separate maintenance actions; source CI runs their regression fixtures without applying settings.

Run the complete composer check gate and release-helper regression suites before review. Fix defects through
an unused successor version when a new artifact is needed, and verify actual release/tag metadata after the
successful default-branch publication workflow. See [release record](release-record.md) and
[package release standard](package-release-standard.md).
