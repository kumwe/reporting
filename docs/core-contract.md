# Core integration contract

Reporting owns bounded report/projection declarations, immutable value snapshots and neutral projection ports.
Core supplies already authorized values, trusted generation-stable definitions and concrete database/storage
adapters. Authorization, scope authority, SQL, cryptography, signing secrets, transactions, persistence,
delivery and operational recovery stay in Core.

Construct values and stateless operations directly. Ports are explicit inputs; the package has no ConfigProvider
or captured request/site/container context. Definitions never grant authority or select a runtime connection.

Projection contracts preserve event identity/version selection, immutable payload snapshots, ordered replay,
scalar key/value types and unchanged writer failures. They do not impose retries, database atomicity,
idempotency or recovery policy. Host adapters must prove those operational requirements independently.

Engine owns execution and consumes the frozen materialization corpus over normalized, authorized input. Reporting
retains semantic definition ownership; no PHP executor, native fallback or copied Conversion arithmetic exists
here. Preserve exact semantic profiles, ordered findings and corpus bytes when changing adapters.

Consumers pin an exact pre-1.0 package version and verify its artifact and dependency closure before deployment.
Package behavior and conformance tests stay with Reporting. Core retains authority, transactions, generation,
delivery and recovery coverage. Legacy source/test replacement requires current consumer inventory and verified
ownership; package publication does not itself prove Core adoption.

See [public API](public-api.md), [integration](integration.md), [test ownership](test-ownership.md) and
[release record](release-record.md).
