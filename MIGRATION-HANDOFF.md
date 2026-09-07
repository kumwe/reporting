# Migration handoff

This candidate contains runtime implementation and package-owned tests. Publication and App adoption remain separate, attested tasks.

```yaml
{
  "schema": "kumwe-migration-handoff/v2",
  "artifact_kind": "framework_php",
  "migration_id": "KUMWE-MIG-2026-033",
  "change_set": "KUMWE-CS-2026-033",
  "state": "draft_pr_open",
  "source": {
    "app": {
      "repository": "https://github.com/kumwe/app",
      "baseline_commit": "24ecf956423c18933e824b43cea1bfb9127a79a9",
      "examined_paths": [
        "src/BusinessReporting/Domain/ReportAggregateDefinition.php",
        "src/BusinessReporting/Domain/ReportAggregateFunction.php",
        "src/BusinessReporting/Domain/ReportColumnDefinition.php",
        "src/BusinessReporting/Domain/ReportDefinition.php",
        "src/BusinessReporting/Domain/ReportDrillDownDefinition.php",
        "src/BusinessReporting/Domain/ReportFilterDefinition.php",
        "src/BusinessReporting/Domain/ReportFilterOperator.php",
        "src/BusinessReporting/Domain/ReportFormulaDefinition.php",
        "src/BusinessReporting/Domain/ReportGroupDefinition.php",
        "src/BusinessReporting/Domain/ReportParameterDefinition.php",
        "src/BusinessReporting/Domain/ReportRelationQuantifier.php",
        "src/BusinessReporting/Domain/ReportSortDefinition.php",
        "src/BusinessReporting/Domain/ReportSortDirection.php",
        "src/Spi/BusinessReporting/Domain/ProjectionDefinition.php",
        "src/Spi/BusinessReporting/Domain/ProjectionFieldDefinition.php",
        "src/Spi/BusinessReporting/Domain/ProjectionSourceDefinition.php",
        "src/Spi/BusinessReporting/Domain/ReportDefinitionGuard.php",
        "src/Spi/BusinessReporting/Domain/ReportValueType.php",
        "src/Spi/BusinessReporting/Application/ProjectionBuilder.php",
        "src/Spi/BusinessReporting/Application/ProjectionEvent.php",
        "src/Spi/BusinessReporting/Application/ProjectionWriter.php"
      ],
      "old_namespace_roots": [
        "Kumwe\\App\\BusinessRecord",
        "Kumwe\\App\\BusinessSchema",
        "Kumwe\\App\\BusinessReporting"
      ],
      "capability_index_sha256": null
    },
    "semantic_inputs": [
      {
        "owner": "kumwe/extension-sdk",
        "version_or_commit": "e8ec23f155c5836c6bd083f154a8efb6e50aec66",
        "manifest_or_corpus": "resources/extraction/v1.json",
        "sha256": "663f227573fec83641701cdac4b76010f7d5d3d4a40f2dd234073f2c0989d3d5"
      }
    ],
    "examined_dependencies": [
      {
        "package": "kumwe/business-definition",
        "constraint": "dev-agent/candidate-sequence-dependency-v2",
        "independently_verified": false,
        "attestation": null
      },
      {
        "package": "kumwe/contribution",
        "constraint": "0.1.0",
        "independently_verified": false,
        "attestation": null
      },
      {
        "package": "kumwe/integration",
        "constraint": "dev-agent/extract-integration-v2",
        "independently_verified": false,
        "attestation": null
      },
      {
        "package": "kumwe/access-context",
        "constraint": "0.1.0",
        "independently_verified": false,
        "attestation": null
      },
      {
        "package": "kumwe/conversion",
        "constraint": "0.1.0",
        "independently_verified": false,
        "attestation": null
      },
      {
        "package": "kumwe/access-control",
        "constraint": "0.1.0",
        "independently_verified": false,
        "attestation": null
      }
    ],
    "active_related_pull_requests": [
      "https://github.com/kumwe/record-values/pull/1",
      "https://github.com/kumwe/business-schema/pull/1",
      "https://github.com/kumwe/record-query/pull/1",
      "https://github.com/kumwe/record-model/pull/1"
    ]
  },
  "target": {
    "repository": "https://github.com/kumwe/reporting",
    "artifact_identity": "kumwe/reporting",
    "canonical_namespace_or_abi": "Kumwe\\Reporting\\",
    "branch": "agent/extraction-v2-business-data",
    "pull_request": "https://github.com/kumwe/reporting/pull/1"
  },
  "ownership": {
    "responsibility": "Bounded report and projection definitions with neutral projection contracts.",
    "non_responsibilities": [
      "authorization",
      "trusted generation selection",
      "persistence",
      "SQL execution",
      "transactions",
      "delivery",
      "native execution"
    ],
    "allowed_dependency_ceiling": [
      "php",
      "php-64bit",
      "ext-json",
      "kumwe/business-definition",
      "kumwe/contribution",
      "kumwe/integration",
      "kumwe/access-context",
      "kumwe/conversion",
      "kumwe/access-control",
      "ext-mbstring"
    ],
    "implementation_owner": "kumwe/reporting",
    "next_consumer": "kumwe/app",
    "public_manifests": [
      {
        "path": "resources/public-api/v1.json",
        "sha256": "faa1884c2b86c0a2ef4b03362867e79cf80e4b36980d3456e738a96e2434027a"
      },
      {
        "path": "resources/capabilities/v1.json",
        "sha256": "df7a035090b19184228e1931714d9a6e971ce09c3fe706e7be64579fec7d23ad"
      },
      {
        "path": "resources/service-map/v1.json",
        "sha256": "eaafeed7ec5f3cb8e9015c18af851b6a4791379a09dd4f3ea41becfb522061e8"
      },
      {
        "path": "resources/test-ownership/v1.json",
        "sha256": "e8b01f43682937c98512e0908e3336555832a258fa30ba1442b0a0ad0f5361cd"
      }
    ],
    "intentionally_excluded": [
      "App repositories, policy gates and lifecycle orchestration",
      "production PHP native executor fallback"
    ]
  },
  "framework_php": {
    "composer_package": "kumwe/reporting",
    "canonical_namespace": "Kumwe\\Reporting\\",
    "public_api_manifest": "resources/public-api/v1.json",
    "capability_manifest": "resources/capabilities/v1.json",
    "service_map": "resources/service-map/v1.json",
    "extracted_symbols": [
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportAggregateDefinition.php",
        "target_path": "src/Domain/ReportAggregateDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportAggregateFunction.php",
        "target_path": "src/Domain/ReportAggregateFunction.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportColumnDefinition.php",
        "target_path": "src/Domain/ReportColumnDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportDefinition.php",
        "target_path": "src/Domain/ReportDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportDrillDownDefinition.php",
        "target_path": "src/Domain/ReportDrillDownDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportFilterDefinition.php",
        "target_path": "src/Domain/ReportFilterDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportFilterOperator.php",
        "target_path": "src/Domain/ReportFilterOperator.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportFormulaDefinition.php",
        "target_path": "src/Domain/ReportFormulaDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportGroupDefinition.php",
        "target_path": "src/Domain/ReportGroupDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportParameterDefinition.php",
        "target_path": "src/Domain/ReportParameterDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportRelationQuantifier.php",
        "target_path": "src/Domain/ReportRelationQuantifier.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportSortDefinition.php",
        "target_path": "src/Domain/ReportSortDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportSortDirection.php",
        "target_path": "src/Domain/ReportSortDirection.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ProjectionDefinition.php",
        "target_path": "src/Domain/ProjectionDefinition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ProjectionFieldDefinition.php",
        "target_path": "src/Domain/ProjectionFieldDefinition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ProjectionSourceDefinition.php",
        "target_path": "src/Domain/ProjectionSourceDefinition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ReportDefinitionGuard.php",
        "target_path": "src/Domain/ReportDefinitionGuard.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ReportValueType.php",
        "target_path": "src/Domain/ReportValueType.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Application/ProjectionBuilder.php",
        "target_path": "src/Contract/ProjectionBuilder.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Application/ProjectionEvent.php",
        "target_path": "src/Contract/ProjectionEvent.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Application/ProjectionWriter.php",
        "target_path": "src/Contract/ProjectionWriter.php"
      }
    ],
    "consumers": {
      "app_code": [
        "src/BusinessReporting/Domain/ReportAggregateDefinition.php",
        "src/BusinessReporting/Domain/ReportAggregateFunction.php",
        "src/BusinessReporting/Domain/ReportColumnDefinition.php",
        "src/BusinessReporting/Domain/ReportDefinition.php",
        "src/BusinessReporting/Domain/ReportDrillDownDefinition.php",
        "src/BusinessReporting/Domain/ReportFilterDefinition.php",
        "src/BusinessReporting/Domain/ReportFilterOperator.php",
        "src/BusinessReporting/Domain/ReportFormulaDefinition.php",
        "src/BusinessReporting/Domain/ReportGroupDefinition.php",
        "src/BusinessReporting/Domain/ReportParameterDefinition.php",
        "src/BusinessReporting/Domain/ReportRelationQuantifier.php",
        "src/BusinessReporting/Domain/ReportSortDefinition.php",
        "src/BusinessReporting/Domain/ReportSortDirection.php",
        "src/Spi/BusinessReporting/Domain/ProjectionDefinition.php",
        "src/Spi/BusinessReporting/Domain/ProjectionFieldDefinition.php",
        "src/Spi/BusinessReporting/Domain/ProjectionSourceDefinition.php",
        "src/Spi/BusinessReporting/Domain/ReportDefinitionGuard.php",
        "src/Spi/BusinessReporting/Domain/ReportValueType.php",
        "src/Spi/BusinessReporting/Application/ProjectionBuilder.php",
        "src/Spi/BusinessReporting/Application/ProjectionEvent.php",
        "src/Spi/BusinessReporting/Application/ProjectionWriter.php"
      ],
      "configuration_and_di": [],
      "reflection_and_string_references": [
        "Recompute using source/import closure at adoption head."
      ],
      "fixtures_and_examples": [],
      "external": [
        "kumwe/extension-sdk coordinated successor"
      ]
    },
    "dependency_injection": {
      "mode": "direct",
      "provider": null,
      "factories": [],
      "aliases": [],
      "service_lifetimes": [],
      "configuration_keys": [],
      "provider_absence_reason": "Values, contracts and stateless deterministic operations are constructed directly. Host ports are explicit inputs; no global context is captured."
    }
  },
  "native_cpp": null,
  "php_extension": null,
  "tests": {
    "moved_or_added": [
      {
        "path": "tests/ReportDefinitionTest.php",
        "methods": [
          "testManifestRoundTripAndChecksumAreDeterministic",
          "testManifestRejectsUnknownKeysAndMoreThanOneRelationship"
        ],
        "implementation_owner": "kumwe/reporting"
      },
      {
        "path": "tests/ReportingBoundaryTest.php",
        "methods": [
          "testProjectionRoundTripBindsBuilderSourcesAndSensitivity",
          "testProjectionRejectsUnknownDocumentKeys",
          "testProjectionKeyMustReferToDeclaredField",
          "testProjectionRefusesUnsortedSourceVersions",
          "testProjectionSourceRejectsUnknownRuntimeType",
          "testRequiredParametersDoNotAcceptDefaults",
          "testParametersRetainExactDecimalStringsAndRejectFloats",
          "testParameterListCannotExceedOneHundredValues",
          "testNumericAggregateRejectsTextColumn",
          "testFormulaCannotRequestAnUndisclosedField",
          "testFrozenNativePlansPreserveEveryCanonicalField"
        ],
        "implementation_owner": "kumwe/reporting"
      }
    ],
    "remain_in_app_or_consumer": [
      "SQL/database matrix",
      "policy-before-query",
      "authorization and generation fences",
      "cryptographic envelope authenticity and key lifecycle",
      "transaction/concurrency and recovery",
      "export/delivery/adapters"
    ],
    "split_tests": [],
    "prohibited_duplicates": [
      "Do not retain moved implementation tests in App/SDK after the separate verified adoption."
    ],
    "corpora": [
      "resources/conformance/report-materialization-v1.json"
    ]
  },
  "documentation": {
    "charter": "CHARTER.md",
    "readme": "README.md",
    "public_api": "docs/public-api.md",
    "architecture": "docs/architecture.md",
    "integration_or_consumer": "docs/integration.md",
    "examples": [
      "examples/consumer.php"
    ],
    "changelog_record": "CHANGELOG.md / Unreleased"
  },
  "release_expectations": {
    "version_policy": "SemVer; determine release version after review. Replace development dependency constraints with exact independently verified pre-1.0 releases.",
    "expected_artifact_types": [
      "Composer source zip"
    ],
    "required_checks": [
      "composer check",
      "composer security:audit",
      "composer clean-consumer",
      "review dependency ceiling",
      "immutable release and source/artifact manifests independently attested"
    ],
    "required_registry_or_installer": "Composer",
    "required_external_attestation": true
  },
  "next_task": {
    "phase_name": "Independent release verification, followed by separate App adoption",
    "permitted_only_when": [
      "Human merges package PR",
      "Immutable upstream dependency releases and target release are independently verified",
      "External RELEASE-ATTESTATION.yaml exists and matches all source/artifact identities"
    ],
    "consumer_repository": "https://github.com/kumwe/app",
    "dependency_or_native_change": "Exact-pin the reviewed immutable package release and remove the former implementation. Never use this development branch as a released dependency.",
    "namespace_or_api_replacements": [
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportAggregateDefinition.php",
        "target_path": "src/Domain/ReportAggregateDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportAggregateFunction.php",
        "target_path": "src/Domain/ReportAggregateFunction.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportColumnDefinition.php",
        "target_path": "src/Domain/ReportColumnDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportDefinition.php",
        "target_path": "src/Domain/ReportDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportDrillDownDefinition.php",
        "target_path": "src/Domain/ReportDrillDownDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportFilterDefinition.php",
        "target_path": "src/Domain/ReportFilterDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportFilterOperator.php",
        "target_path": "src/Domain/ReportFilterOperator.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportFormulaDefinition.php",
        "target_path": "src/Domain/ReportFormulaDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportGroupDefinition.php",
        "target_path": "src/Domain/ReportGroupDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportParameterDefinition.php",
        "target_path": "src/Domain/ReportParameterDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportRelationQuantifier.php",
        "target_path": "src/Domain/ReportRelationQuantifier.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportSortDefinition.php",
        "target_path": "src/Domain/ReportSortDefinition.php"
      },
      {
        "old_owner": "app",
        "source_path": "src/BusinessReporting/Domain/ReportSortDirection.php",
        "target_path": "src/Domain/ReportSortDirection.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ProjectionDefinition.php",
        "target_path": "src/Domain/ProjectionDefinition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ProjectionFieldDefinition.php",
        "target_path": "src/Domain/ProjectionFieldDefinition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ProjectionSourceDefinition.php",
        "target_path": "src/Domain/ProjectionSourceDefinition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ReportDefinitionGuard.php",
        "target_path": "src/Domain/ReportDefinitionGuard.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Domain/ReportValueType.php",
        "target_path": "src/Domain/ReportValueType.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Application/ProjectionBuilder.php",
        "target_path": "src/Contract/ProjectionBuilder.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Application/ProjectionEvent.php",
        "target_path": "src/Contract/ProjectionEvent.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessReporting/Application/ProjectionWriter.php",
        "target_path": "src/Contract/ProjectionWriter.php"
      }
    ],
    "files_to_update": [
      "composer.json",
      "composer.lock",
      "container configuration",
      "capability index",
      "migration ledger",
      "CHANGELOG.md"
    ],
    "files_to_remove": [
      "src/BusinessReporting/Domain/ReportAggregateDefinition.php",
      "src/BusinessReporting/Domain/ReportAggregateFunction.php",
      "src/BusinessReporting/Domain/ReportColumnDefinition.php",
      "src/BusinessReporting/Domain/ReportDefinition.php",
      "src/BusinessReporting/Domain/ReportDrillDownDefinition.php",
      "src/BusinessReporting/Domain/ReportFilterDefinition.php",
      "src/BusinessReporting/Domain/ReportFilterOperator.php",
      "src/BusinessReporting/Domain/ReportFormulaDefinition.php",
      "src/BusinessReporting/Domain/ReportGroupDefinition.php",
      "src/BusinessReporting/Domain/ReportParameterDefinition.php",
      "src/BusinessReporting/Domain/ReportRelationQuantifier.php",
      "src/BusinessReporting/Domain/ReportSortDefinition.php",
      "src/BusinessReporting/Domain/ReportSortDirection.php",
      "src/Spi/BusinessReporting/Domain/ProjectionDefinition.php",
      "src/Spi/BusinessReporting/Domain/ProjectionFieldDefinition.php",
      "src/Spi/BusinessReporting/Domain/ProjectionSourceDefinition.php",
      "src/Spi/BusinessReporting/Domain/ReportDefinitionGuard.php",
      "src/Spi/BusinessReporting/Domain/ReportValueType.php",
      "src/Spi/BusinessReporting/Application/ProjectionBuilder.php",
      "src/Spi/BusinessReporting/Application/ProjectionEvent.php",
      "src/Spi/BusinessReporting/Application/ProjectionWriter.php"
    ],
    "tests_to_remove": [
      "tests/ReportDefinitionTest.php",
      "tests/ReportingBoundaryTest.php"
    ],
    "tests_to_retain_or_add": [
      "Host responsibility cases listed above",
      "Native parity against committed semantic corpus where applicable"
    ],
    "di_or_provisioning_changes": [],
    "capability_index_changes": [
      "Record actual release and package responsibility without declaring composed roadmap completion."
    ],
    "changelog_and_evidence_changes": [
      "Record immutable artifact, attestation and remaining host acceptance gates."
    ],
    "verification_commands": [
      "composer check",
      "composer clean-consumer",
      "App affected integration train and platform matrix"
    ]
  },
  "concurrency": {
    "likely_conflict_files": [
      "App composer.json",
      "App composer.lock",
      "App capability and migration registries"
    ],
    "related_migrations": [
      "KUMWE-MIG-2026-029",
      "KUMWE-MIG-2026-030",
      "KUMWE-MIG-2026-031",
      "KUMWE-MIG-2026-032"
    ],
    "ownership_conflicts": [],
    "integration_train": "Framework 4 Business Data",
    "resolution_rule": "semantic-preservation"
  },
  "governance": {
    "roadmap_source_sha256": "a202155ef1a65f5ab293d4f8397ebf4ac430db7f1e877c776bbe7851e6fe18d8",
    "roadmap_refs": [],
    "non_roadmap_refs": [
      "NRM-2026-033"
    ],
    "completion_claim": false
  },
  "decisions": [
    "Canonical namespace and approved value behavior retained.",
    "No host authority or persistence moves into the package.",
    "See CHARTER.md for explicit dependency amendments; no release approval is inferred."
  ],
  "blockers": [
    "Immutable upstream releases and external attestations are not available for the entire dependency closure. No publication or App adoption is authorized by this candidate.",
    "Package candidate source checks do not substitute for clean immutable release verification."
  ]
}
```
