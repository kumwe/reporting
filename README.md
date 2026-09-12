# Kumwe Reporting

[![Packagist version][version-badge]][packagist]
[![Package CI][ci-badge]][ci]
[![PHP requirement][php-badge]](composer.json)
[![License: Apache-2.0][license-badge]](LICENSE)

Bounded report and projection definitions under `Kumwe\Reporting\`. The package owns value invariants,
canonical declarations, neutral projection builder/event/writer contracts and their conformance tests.
Core supplies authorized values, trusted definitions and storage; Engine owns native materialization arithmetic.

## Installation and usage

```sh
composer require kumwe/reporting:0.1.4
```

Requires 64-bit PHP 8.5, JSON and mbstring. Exact stable Kumwe dependencies resolve from Packagist without custom
VCS overrides. Values and stateless normalization are constructed directly; there is no ConfigProvider or
captured global context. See the [consumer example](examples/consumer.php), [public API](docs/public-api.md),
[Core contract](docs/core-contract.md) and [integration](docs/integration.md).

## Compatibility and ownership

Report/projection collections and default parameters detach caller references, preserving validated snapshots
and checksums. Neutral projection contracts preserve ordered replay and writer failures without imposing a
host retry policy. Core owns authorization, SQL, transactions, generation fences, signing, persistence,
delivery and recovery. There is no PHP substitute for Engine arithmetic.

Pre-1.0 consumers pin exact verified versions. Published releases, independent verification and Core acceptance
remain separate observations. [Architecture](docs/architecture.md), [test ownership](docs/test-ownership.md),
[release record](docs/release-record.md) and [security](SECURITY.md) describe the ongoing contract.

## Development

```sh
npm ci --prefix tools/schema-validator --ignore-scripts
composer install
composer check
```

Source checks require Node.js 20+ for the pinned Ajv2020/YAML schema validator. The complete gate validates
canonical manifests and the release record, tests behavior and ownership, checks dependency identities,
architecture, static analysis and security, and installs the actual archive in a fresh no-dev authoritative
consumer. Development tooling is excluded from published archives. See [releasing](docs/releasing.md).

[version-badge]: https://img.shields.io/packagist/v/kumwe/reporting
[packagist]: https://packagist.org/packages/kumwe/reporting
[ci-badge]: https://github.com/kumwe/reporting/actions/workflows/ci.yml/badge.svg?branch=main
[ci]: https://github.com/kumwe/reporting/actions/workflows/ci.yml
[php-badge]: https://img.shields.io/packagist/dependency-v/kumwe/reporting/php
[license-badge]: https://img.shields.io/github/license/kumwe/reporting
