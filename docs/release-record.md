---
schema: kumwe-package-release-record/v1
artifact_kind: framework_php
migration_id: KUMWE-MIG-2026-033
change_set: KUMWE-CS-2026-033
source:
  app:
    repository: https://github.com/kumwe/app
    baseline_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    examined_paths:
      - docs/architecture/governance/core-growth-baseline.json
      - examples/extensions/asset-inspection/src/Integration/InspectionActivityProjectionBuilder.php
      - src/BusinessReporting/Application/ExportPolicySnapshotProvider.php
      - src/BusinessReporting/Application/ExportService.php
      - src/BusinessReporting/Application/JournalProjectionEvent.php
      - src/BusinessReporting/Application/ProjectionEventSource.php
      - src/BusinessReporting/Application/ProjectionGenerationWriter.php
      - src/BusinessReporting/Application/ProjectionRebuildService.php
      - src/BusinessReporting/Application/RecordExportReportProvider.php
      - src/BusinessReporting/Application/ReportCsvEncoder.php
      - src/BusinessReporting/Application/ReportDefinitionRegistry.php
      - src/BusinessReporting/Application/ReportExecutionResult.php
      - src/BusinessReporting/Application/ReportScopeResolver.php
      - src/BusinessReporting/Application/ReportService.php
      - src/BusinessReporting/Delivery/Administrator/AdministratorReportHandler.php
      - src/BusinessReporting/Delivery/Api/ReportApiPresenter.php
      - src/BusinessReporting/Delivery/Browser/ReportParameterInput.php
      - src/BusinessReporting/Delivery/Portal/PortalReportHandler.php
      - src/BusinessReporting/Domain/ExportArtifact.php
      - src/BusinessReporting/Domain/ReportAggregateDefinition.php
      - src/BusinessReporting/Domain/ReportAggregateFunction.php
      - src/BusinessReporting/Domain/ReportColumnDefinition.php
      - src/BusinessReporting/Domain/ReportDefinition.php
      - src/BusinessReporting/Domain/ReportDrillDownDefinition.php
      - src/BusinessReporting/Domain/ReportFilterDefinition.php
      - src/BusinessReporting/Domain/ReportFilterOperator.php
      - src/BusinessReporting/Domain/ReportFormulaDefinition.php
      - src/BusinessReporting/Domain/ReportGroupDefinition.php
      - src/BusinessReporting/Domain/ReportParameterDefinition.php
      - src/BusinessReporting/Domain/ReportRelationQuantifier.php
      - src/BusinessReporting/Domain/ReportSortDefinition.php
      - src/BusinessReporting/Domain/ReportSortDirection.php
      - src/BusinessReporting/Infrastructure/BusinessRecordExportPolicySnapshotProvider.php
      - src/BusinessReporting/Infrastructure/BusinessRecordReportScopeResolver.php
      - src/BusinessReporting/Infrastructure/DoctrineProjectionRuntime.php
      - src/BusinessReporting/Infrastructure/DoctrineProjectionStore.php
      - src/Delivery/Http/Api/Idempotency/HttpMutationPreauthorizer.php
      - src/Extension/Contribution/CanonicalManifestInterpreter.php
      - src/Extension/Contribution/ExtensionContributionRegistrySet.php
      - src/Extension/Contribution/OwnedExtensionBindingRegistrar.php
      - src/Kernel/ContainerFactory.php
      - src/OpenApi/Application/OpenApiContractCompiler.php
      - tests/Architecture/ConvertedMoneySurfaceCoverageTest.php
      - tests/Architecture/TruthfulQualityGateTest.php
      - tests/Integration/BusinessIntegration/ProjectionRuntimePersistenceTest.php
      - tests/Integration/Extension/GeneratedExtensionLifecycleIntegrationTest.php
      - tests/Unit/BusinessReporting/ConvertedMoneyProvenanceTest.php
      - tests/Unit/BusinessReporting/ConvertedQuantityProvenanceTest.php
      - tests/Unit/BusinessReporting/Delivery/Browser/ReportParameterInputTest.php
      - tests/Unit/BusinessReporting/ExportGenerationPolicyFenceTest.php
      - tests/Unit/BusinessReporting/ExportServiceTransactionTest.php
      - tests/Unit/BusinessReporting/RecordExportPipelineTest.php
      - tests/Unit/BusinessReporting/RecordExportReportProviderTest.php
      - tests/Unit/BusinessReporting/ReportApiDiscoveryTest.php
      - tests/Unit/BusinessReporting/ReportBrowserErrorResponseTest.php
      - tests/Unit/BusinessReporting/ReportCsvEncoderTest.php
      - tests/Unit/BusinessReporting/ReportDefinitionTest.php
      - tests/Unit/BusinessReporting/ReportDeliveryPresenterTest.php
      - tests/Unit/BusinessReporting/ReportPolicyInferenceTest.php
      - tests/Unit/Extension/Contribution/ExtensionBindingSurfaceTest.php
      - tests/Unit/Extension/Contribution/OwnedBindingCanonicalDriftTest.php
      - tests/Unit/Extension/Development/ExtensionDevelopmentSdkTest.php
    old_namespace_roots:
      - Kumwe\App\BusinessRecord\
      - Kumwe\App\BusinessSchema\
      - Kumwe\App\BusinessReporting\
    capability_index_sha256: null
  semantic_inputs:
    - owner: kumwe/extension-sdk
      version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
      manifest_or_corpus: resources/extraction/v1.json
      sha256: 663f227573fec83641701cdac4b76010f7d5d3d4a40f2dd234073f2c0989d3d5
  examined_dependencies:
    - kumwe/business-definition 0.1.2; independent release attestation not asserted
    - kumwe/contribution 0.1.1; independent release attestation not asserted
    - kumwe/integration 0.2.3 at 219278ccf3a7eed6bbf165c7d26431a87602951d; independent release attestation not asserted
    - kumwe/access-context 0.1.2; independent release attestation not asserted
    - kumwe/conversion 0.1.5; independent release attestation not asserted
    - kumwe/access-control 0.1.2; independent release attestation not asserted
target:
  repository: https://github.com/kumwe/reporting
  artifact_identity: kumwe/reporting
  canonical_namespace_or_abi: Kumwe\Reporting\
ownership:
  responsibility: Bounded report and projection definitions with neutral projection contracts.
  non_responsibilities:
    - authorization
    - trusted generation selection
    - persistence
    - SQL execution
    - transactions
    - delivery
    - native execution
  allowed_dependency_ceiling:
    - php
    - php-64bit
    - ext-json
    - kumwe/business-definition
    - kumwe/contribution
    - kumwe/integration
    - kumwe/access-context
    - kumwe/conversion
    - kumwe/access-control
    - ext-mbstring
  implementation_owner: kumwe/reporting
  next_consumer: kumwe/app
  public_manifests:
    - path: resources/public-api/v1.json
      sha256: 2386de88af076421e1a61c4ae094a86560dc2340f3373117ad155d886ac52721
    - path: resources/capabilities/v1.json
      sha256: 5151b6a103d3961c8200aeda37eb1e527c7efdf6bd5db1a4ec775d701dbea517
    - path: resources/service-map/v1.json
      sha256: 4d0227d84a18e964c8e9291fb712719ea2893523e2e80f5e852a5afde97b834d
    - path: resources/test-ownership/v1.json
      sha256: a4b2715552a2fb26706f1af8c2d85a6f3f9ca7e96073b4f9803fa06196c8070c
  intentionally_excluded:
    - App repositories, policy gates and lifecycle orchestration
    - production PHP native executor fallback
framework_php:
  composer_package: kumwe/reporting
  canonical_namespace: Kumwe\Reporting\
  public_api_manifest: resources/public-api/v1.json
  capability_manifest: resources/capabilities/v1.json
  service_map: resources/service-map/v1.json
  extracted_symbols:
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportAggregateDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportAggregateDefinition
      source_path: src/BusinessReporting/Domain/ReportAggregateDefinition.php
      target_path: src/Domain/ReportAggregateDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - alias
        - function
        - columnAlias
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportAggregateFunction
      new_fqcn: Kumwe\Reporting\Domain\ReportAggregateFunction
      source_path: src/BusinessReporting/Domain/ReportAggregateFunction.php
      target_path: src/Domain/ReportAggregateFunction.php
      kind: enum
      public_methods:
        - cases
        - from
        - tryFrom
      public_properties:
        - name
        - value
      public_constants:
        - Count
        - Sum
        - Minimum
        - Maximum
        - Average
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportColumnDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportColumnDefinition
      source_path: src/BusinessReporting/Domain/ReportColumnDefinition.php
      target_path: src/Domain/ReportColumnDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - alias
        - label
        - sourcePath
        - type
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportDefinition
      source_path: src/BusinessReporting/Domain/ReportDefinition.php
      target_path: src/Domain/ReportDefinition.php
      kind: class
      public_methods:
        - __construct
        - identifier
        - toArray
        - fromArray
        - checksum
      public_properties:
        - parameters
        - filters
        - columns
        - groups
        - aggregates
        - formulas
        - sorts
        - drillDowns
        - version
        - title
        - sourceDefinition
        - requiredCapability
        - synchronousRowCap
        - administratorVisible
        - portalVisible
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportDrillDownDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportDrillDownDefinition
      source_path: src/BusinessReporting/Domain/ReportDrillDownDefinition.php
      target_path: src/Domain/ReportDrillDownDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - recordAlias
        - definitionIdentifier
        - viewIdentifier
      public_constants: []
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportFilterDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportFilterDefinition
      source_path: src/BusinessReporting/Domain/ReportFilterDefinition.php
      target_path: src/Domain/ReportFilterDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - fieldPath
        - operator
        - parameter
        - quantifier
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportFilterOperator
      new_fqcn: Kumwe\Reporting\Domain\ReportFilterOperator
      source_path: src/BusinessReporting/Domain/ReportFilterOperator.php
      target_path: src/Domain/ReportFilterOperator.php
      kind: enum
      public_methods:
        - isNullTest
        - cases
        - from
        - tryFrom
      public_properties:
        - name
        - value
      public_constants:
        - Equal
        - NotEqual
        - LessThan
        - LessThanOrEqual
        - GreaterThan
        - GreaterThanOrEqual
        - Contains
        - StartsWith
        - EndsWith
        - In
        - NotIn
        - IsNull
        - IsNotNull
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportFormulaDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportFormulaDefinition
      source_path: src/BusinessReporting/Domain/ReportFormulaDefinition.php
      target_path: src/Domain/ReportFormulaDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - alias
        - label
        - type
        - expression
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportGroupDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportGroupDefinition
      source_path: src/BusinessReporting/Domain/ReportGroupDefinition.php
      target_path: src/Domain/ReportGroupDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - columnAlias
      public_constants: []
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportParameterDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportParameterDefinition
      source_path: src/BusinessReporting/Domain/ReportParameterDefinition.php
      target_path: src/Domain/ReportParameterDefinition.php
      kind: class
      public_methods:
        - __construct
        - assertValue
      public_properties:
        - defaultValue
        - name
        - type
        - required
        - multiple
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportRelationQuantifier
      new_fqcn: Kumwe\Reporting\Domain\ReportRelationQuantifier
      source_path: src/BusinessReporting/Domain/ReportRelationQuantifier.php
      target_path: src/Domain/ReportRelationQuantifier.php
      kind: enum
      public_methods:
        - cases
        - from
        - tryFrom
      public_properties:
        - name
        - value
      public_constants:
        - Any
        - None
        - All
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportSortDefinition
      new_fqcn: Kumwe\Reporting\Domain\ReportSortDefinition
      source_path: src/BusinessReporting/Domain/ReportSortDefinition.php
      target_path: src/Domain/ReportSortDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - outputAlias
        - direction
        - nullsLast
      public_constants: []
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\App\BusinessReporting\Domain\ReportSortDirection
      new_fqcn: Kumwe\Reporting\Domain\ReportSortDirection
      source_path: src/BusinessReporting/Domain/ReportSortDirection.php
      target_path: src/Domain/ReportSortDirection.php
      kind: enum
      public_methods:
        - cases
        - from
        - tryFrom
      public_properties:
        - name
        - value
      public_constants:
        - Ascending
        - Descending
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Domain\ProjectionDefinition
      new_fqcn: Kumwe\Reporting\Domain\ProjectionDefinition
      source_path: src/Spi/BusinessReporting/Domain/ProjectionDefinition.php
      target_path: src/Domain/ProjectionDefinition.php
      kind: class
      public_methods:
        - __construct
        - identifier
        - accepts
        - toArray
        - fromArray
        - checksum
      public_properties:
        - sources
        - fields
        - keyFields
        - version
        - handlerVersion
        - sensitivityCeiling
        - rebuildBatchSize
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Domain\ProjectionFieldDefinition
      new_fqcn: Kumwe\Reporting\Domain\ProjectionFieldDefinition
      source_path: src/Spi/BusinessReporting/Domain/ProjectionFieldDefinition.php
      target_path: src/Domain/ProjectionFieldDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - name
        - type
        - nullable
      public_constants: []
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Domain\ProjectionSourceDefinition
      new_fqcn: Kumwe\Reporting\Domain\ProjectionSourceDefinition
      source_path: src/Spi/BusinessReporting/Domain/ProjectionSourceDefinition.php
      target_path: src/Domain/ProjectionSourceDefinition.php
      kind: class
      public_methods:
        - __construct
      public_properties:
        - schemaVersions
        - eventType
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Domain\ReportDefinitionGuard
      new_fqcn: Kumwe\Reporting\Domain\ReportDefinitionGuard
      source_path: src/Spi/BusinessReporting/Domain/ReportDefinitionGuard.php
      target_path: src/Domain/ReportDefinitionGuard.php
      kind: class
      public_methods:
        - handle
        - identifier
        - path
      public_properties: []
      public_constants: []
      exceptions:
        - InvalidArgumentException
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Domain\ReportValueType
      new_fqcn: Kumwe\Reporting\Domain\ReportValueType
      source_path: src/Spi/BusinessReporting/Domain/ReportValueType.php
      target_path: src/Domain/ReportValueType.php
      kind: enum
      public_methods:
        - accepts
        - cases
        - from
        - tryFrom
      public_properties:
        - name
        - value
      public_constants:
        - Boolean
        - Integer
        - Decimal
        - String
        - Identifier
        - Date
        - DateTime
        - ConvertedMoney
        - ConvertedQuantity
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Application\ProjectionBuilder
      new_fqcn: Kumwe\Reporting\Contract\ProjectionBuilder
      source_path: src/Spi/BusinessReporting/Application/ProjectionBuilder.php
      target_path: src/Contract/ProjectionBuilder.php
      kind: interface
      public_methods:
        - apply
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Application\ProjectionEvent
      new_fqcn: Kumwe\Reporting\Contract\ProjectionEvent
      source_path: src/Spi/BusinessReporting/Application/ProjectionEvent.php
      target_path: src/Contract/ProjectionEvent.php
      kind: interface
      public_methods:
        - sequence
        - id
        - type
        - schemaVersion
        - occurredAt
        - payload
        - checksum
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
    - old_fqcn: Kumwe\Extension\Spi\BusinessReporting\Application\ProjectionWriter
      new_fqcn: Kumwe\Reporting\Contract\ProjectionWriter
      source_path: src/Spi/BusinessReporting/Application/ProjectionWriter.php
      target_path: src/Contract/ProjectionWriter.php
      kind: interface
      public_methods:
        - put
        - remove
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: See docs/public-api.md and package conformance corpus for exact serialization.
      compatibility: Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity.
  consumers:
    app_code:
      - src/BusinessReporting/Application/ExportPolicySnapshotProvider.php
      - src/BusinessReporting/Application/ExportService.php
      - src/BusinessReporting/Application/JournalProjectionEvent.php
      - src/BusinessReporting/Application/ProjectionEventSource.php
      - src/BusinessReporting/Application/ProjectionGenerationWriter.php
      - src/BusinessReporting/Application/ProjectionRebuildService.php
      - src/BusinessReporting/Application/RecordExportReportProvider.php
      - src/BusinessReporting/Application/ReportCsvEncoder.php
      - src/BusinessReporting/Application/ReportDefinitionRegistry.php
      - src/BusinessReporting/Application/ReportExecutionResult.php
      - src/BusinessReporting/Application/ReportScopeResolver.php
      - src/BusinessReporting/Application/ReportService.php
      - src/BusinessReporting/Delivery/Administrator/AdministratorReportHandler.php
      - src/BusinessReporting/Delivery/Api/ReportApiPresenter.php
      - src/BusinessReporting/Delivery/Browser/ReportParameterInput.php
      - src/BusinessReporting/Delivery/Portal/PortalReportHandler.php
      - src/BusinessReporting/Domain/ExportArtifact.php
      - src/BusinessReporting/Domain/ReportAggregateDefinition.php
      - src/BusinessReporting/Domain/ReportColumnDefinition.php
      - src/BusinessReporting/Domain/ReportDefinition.php
      - src/BusinessReporting/Domain/ReportDrillDownDefinition.php
      - src/BusinessReporting/Domain/ReportFilterDefinition.php
      - src/BusinessReporting/Domain/ReportFormulaDefinition.php
      - src/BusinessReporting/Domain/ReportGroupDefinition.php
      - src/BusinessReporting/Domain/ReportParameterDefinition.php
      - src/BusinessReporting/Domain/ReportSortDefinition.php
      - src/BusinessReporting/Infrastructure/BusinessRecordExportPolicySnapshotProvider.php
      - src/BusinessReporting/Infrastructure/BusinessRecordReportScopeResolver.php
      - src/BusinessReporting/Infrastructure/DoctrineProjectionRuntime.php
      - src/BusinessReporting/Infrastructure/DoctrineProjectionStore.php
      - src/Delivery/Http/Api/Idempotency/HttpMutationPreauthorizer.php
      - src/Extension/Contribution/CanonicalManifestInterpreter.php
      - src/Extension/Contribution/ExtensionContributionRegistrySet.php
      - src/Extension/Contribution/OwnedExtensionBindingRegistrar.php
      - src/Kernel/ContainerFactory.php
      - src/OpenApi/Application/OpenApiContractCompiler.php
    configuration_and_di:
      - docs/architecture/governance/core-growth-baseline.json
    reflection_and_string_references: []
    fixtures_and_examples:
      - examples/extensions/asset-inspection/src/Integration/InspectionActivityProjectionBuilder.php
      - tests/Architecture/ConvertedMoneySurfaceCoverageTest.php
      - tests/Architecture/TruthfulQualityGateTest.php
      - tests/Integration/BusinessIntegration/ProjectionRuntimePersistenceTest.php
      - tests/Integration/Extension/GeneratedExtensionLifecycleIntegrationTest.php
      - tests/Unit/BusinessReporting/ConvertedMoneyProvenanceTest.php
      - tests/Unit/BusinessReporting/ConvertedQuantityProvenanceTest.php
      - tests/Unit/BusinessReporting/Delivery/Browser/ReportParameterInputTest.php
      - tests/Unit/BusinessReporting/ExportGenerationPolicyFenceTest.php
      - tests/Unit/BusinessReporting/ExportServiceTransactionTest.php
      - tests/Unit/BusinessReporting/RecordExportPipelineTest.php
      - tests/Unit/BusinessReporting/RecordExportReportProviderTest.php
      - tests/Unit/BusinessReporting/ReportApiDiscoveryTest.php
      - tests/Unit/BusinessReporting/ReportBrowserErrorResponseTest.php
      - tests/Unit/BusinessReporting/ReportCsvEncoderTest.php
      - tests/Unit/BusinessReporting/ReportDefinitionTest.php
      - tests/Unit/BusinessReporting/ReportDeliveryPresenterTest.php
      - tests/Unit/BusinessReporting/ReportPolicyInferenceTest.php
      - tests/Unit/Extension/Contribution/ExtensionBindingSurfaceTest.php
      - tests/Unit/Extension/Contribution/OwnedBindingCanonicalDriftTest.php
      - tests/Unit/Extension/Development/ExtensionDevelopmentSdkTest.php
    external:
      - kumwe/extension-sdk coordinated successor
  dependency_injection:
    mode: direct
    provider: null
    factories: []
    aliases: []
    service_lifetimes: []
    configuration_keys: []
    provider_absence_reason: Values, contracts and stateless deterministic operations are constructed directly. Host ports are explicit inputs; no global context is captured.
native_cpp: null
php_extension: null
tests:
  moved_or_added:
    - "tools/schema-validator/verify.cjs: complete canonical manifest and handoff schemas with 12 rejection fixtures"
    - "tests/ProjectionContractTest.php (testForeignImplementationsPreserveEventMetadataAndTypedWrites, testReplayingTheSameOrderedEventsProducesTheSameOperations, testImmutableEventPayloadIsStableAcrossCallerArrayChanges, testConsumerBuilderUsesTheDeclaredSourceTypeAndVersion, testWriterFailurePropagatesWithoutTranslationOrRetry); provenance: resources/test-ownership/v1.json"
    - "tests/ReportDefinitionTest.php (testManifestRoundTripAndChecksumAreDeterministic, testManifestRejectsUnknownKeysAndMoreThanOneRelationship); provenance: resources/test-ownership/v1.json"
    - "tests/ReportingBoundaryTest.php (testProjectionRoundTripBindsBuilderSourcesAndSensitivity, testProjectionRejectsUnknownDocumentKeys, testProjectionKeyMustReferToDeclaredField, testProjectionRefusesUnsortedSourceVersions, testProjectionSourceRejectsUnknownRuntimeType, testRequiredParametersDoNotAcceptDefaults, testParametersRetainExactDecimalStringsAndRejectFloats, testParameterListCannotExceedOneHundredValues, testNumericAggregateRejectsTextColumn, testFormulaCannotRequestAnUndisclosedField, testFrozenNativePlansPreserveEveryCanonicalField); provenance: resources/test-ownership/v1.json"
    - "tests/ValueImmutabilityTest.php (testReportDefaultsAndColumnsCannotChangeAfterAdmission); provenance: resources/test-ownership/v1.json"
  remain_in_app_or_consumer:
    - SQL/database matrix
    - policy-before-query
    - authorization and generation fences
    - cryptographic envelope authenticity and key lifecycle
    - transaction/concurrency and recovery
    - export/delivery/adapters
  split_tests: []
  prohibited_duplicates:
    - Do not retain moved implementation tests in App/SDK after the separate verified adoption.
  corpora:
    - resources/conformance/report-materialization-v1.json
documentation:
  charter: CHARTER.md
  readme: README.md
  public_api: docs/public-api.md
  architecture: docs/architecture.md
  integration_or_consumer: docs/integration.md
  examples:
    - examples/consumer.php
  changelog_record: CHANGELOG.md / 0.1.4
release_expectations:
  version_policy: SemVer maintenance release 0.1.4 after human merge. Direct Kumwe dependencies use coherent exact published stable versions. Independent final release verification precedes App adoption.
  expected_artifact_types:
    - Composer source zip
  required_checks:
    - composer check
    - composer security:audit
    - composer clean-consumer
    - review dependency ceiling
    - immutable release and source/artifact manifests independently attested
  required_registry_or_installer: Composer
  required_external_attestation: true
governance:
  completion_claim: false
decisions:
  - Canonical namespace and approved value behavior retained.
  - No host authority or persistence moves into the package.
  - See CHARTER.md for explicit dependency amendments; no release approval is inferred.
blockers: []
consumer_contract:
  permitted_only_when:
    - Verify the published package and exact dependency identities before consumer deployment.
  consumer_repository: https://github.com/kumwe/app
  dependency_or_native_change: Compose the verified package through its documented public API and host-owned services.
  namespace_or_api_replacements: []
  files_to_update: []
  files_to_remove: []
  tests_to_remove: []
  tests_to_retain_or_add:
    - Host responsibility cases listed above
    - Native parity against committed semantic corpus where applicable
  di_or_provisioning_changes: []
  capability_index_changes:
    - Core maintains its current dependency and capability inventory.
  changelog_and_evidence_changes:
    - Record immutable artifact, attestation and remaining host acceptance gates.
  verification_commands:
    - composer check
    - composer clean-consumer
---

# Reporting release record

## Package contract

Reporting owns bounded report definitions and neutral projection contracts. The [Core contract](core-contract.md) defines the host boundary.
Retained migration/change-set IDs identify independent attestations and historical source ownership.

## Public API and responsibility

The [public API](public-api.md), [charter](../CHARTER.md) and canonical public manifests define the supported
package surface. Core retains authorization, transactions, persistence and runtime lifecycle responsibilities.

## Dependencies and semantic inputs

[Composer metadata](../composer.json) declares runtime dependencies. The machine record preserves exact semantic
inputs, public manifest hashes and source provenance. Coordinates do not self-attest independent verification.

## Consumer contract

Use the documented API and host-supplied services. The package never acquires authority from metadata or port
selection. See [integration](integration.md) and the [Core contract](core-contract.md).

## Test ownership

Package-owned tests enforce behavior, boundaries, malformed-input refusals and conformance. Core retains its
composition, storage, authority, deployment and recovery coverage. Test ownership remains explicit.

## Consumer verification

Verify the published artifact, exact dependency identities and authoritative no-dev consumer before deployment.
Package publication and source CI do not establish Core integration or production workload acceptance.

## Compatibility and drift

Preserve public signatures, wire shapes, semantic ownership and dependency boundaries. Refresh declared public
manifest hashes with reviewed contract changes. Final publication identities belong in external evidence.

## Validation

Run the complete composer check command and release automation regressions. The shared PR and default-branch
workflow validates the tested source, including package-owned tests and the built archive's no-dev consumer.
See [releasing](releasing.md) for versioning, immutable tag handling and publication evidence.
