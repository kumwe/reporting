# Package release standard

PRs and post-rebase default-branch runs execute the same reusable quality gate. Preserve package-owned behavior,
boundary and conformance tests, canonical API/schema validation, dependency identity checks, production autoload
and the built archive's fresh no-dev consumer. Package gate fails when any required job fails or is skipped.

The newest stable changelog record selects the version. Keep release manifests consistent, preserve an existing
published ancestor unchanged, and complete an unpublished tag only at the exact tested event commit. Never
replace tags/assets or turn an unverified HTTP error into permission to publish. Publication is serialized and
release-helper fixtures cover rebases, retries, annotated tags, identity mismatches and API failures.

Composer/GitHub archives retain runtime source, manifests and contract documentation, and exclude development
tooling, tests, workflows and temporary state. Exact stable Kumwe dependency versions and resolved source/dist
identities are checked before publication. Root-only repository overrides are unnecessary for registered packages.

Publication, independent verification and Core deployment remain separate states. Normal publication does not
require external attestations, branch-protection changes or administrator setup; existing repository rules remain
in force. Optional administrator-hardening and strict dependency-evidence helpers remain explicit maintenance
operations, with their own regression fixtures and access requirements.

Follow [Reporting releases](releasing.md) and verify the actual default-branch workflow, release and tag after
publication. A green source PR cannot establish a future release or Core acceptance.
