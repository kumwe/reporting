# Public API

Constructor invariants, serialization, exceptions and method contracts follow. Values perform no I/O; host inputs must remain stable through each operation.

## Kumwe\Reporting\Domain\ReportRelationQuantifier

/**
 * Quantifier applied when a report filter crosses one declared relationship.
 *
 * @since  2.0.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Reporting\Domain\ProjectionFieldDefinition

/**
 * One typed field in a derived, non-authoritative reporting projection.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Declare one field that a deterministic projection builder may write.
     *
     * @param  string           $name      Stable field handle.
     * @param  ReportValueType  $type      Scalar type accepted by the projection writer.
     * @param  bool             $nullable  Whether a rebuilt row may omit the value.
     *
     * @since  0.2.0
     */

## Kumwe\Reporting\Domain\ReportAggregateFunction

/**
 * Exact aggregate functions available to grouped report output.
 *
 * @since  2.0.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Reporting\Domain\ProjectionSourceDefinition

/**
 * One versioned event source admitted by a reproducible reporting projection.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Declare one event type and the exact schema versions its builder understands.
     *
     * @param   string               $eventType       Namespaced immutable event type.
     * @param   array<array-key, mixed>  $schemaVersions  Accepted positive schema versions.
     *
     * @throws  InvalidArgumentException  When the event type or version list is invalid.
     *
     * @since   0.2.0
     */

## Kumwe\Reporting\Domain\ReportParameterDefinition

/**
 * One named and typed value a report caller may bind.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Declare one parameter and validate its optional default immediately.
     *
     * @param   string           $name          Lowercase handle referenced by filters.
     * @param   ReportValueType  $type          Scalar type every supplied value must have.
     * @param   bool             $required      Whether the caller must supply the parameter.
     * @param   bool             $multiple      Whether the parameter accepts one to one hundred values.
     * @param   mixed            $defaultValue  Default used when the caller omits the parameter.
     *
     * @throws  InvalidArgumentException  When the handle or default is invalid.
     *
     * @since   2.0.0
     */

### assertValue

/**
     * Validate and return a caller-supplied value without coercion.
     *
     * @param   mixed  $value  Value to validate.
     *
     * @return  mixed  The unchanged value after it has satisfied this definition.
     *
     * @throws  InvalidArgumentException  When the value is absent, has the wrong type, or exceeds a list bound.
     *
     * @since   2.0.0
     */

## Kumwe\Reporting\Domain\ReportFilterDefinition

/**
 * Declarative binding from a typed report parameter to one query-AST predicate.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Declare one root or single-hop relation filter.
     *
     * @param   string                    $fieldPath   Root field or `relationship.field` path.
     * @param   ReportFilterOperator      $operator    Closed operator translated without SQL text.
     * @param   ?string                   $parameter   Parameter handle, null only for null tests.
     * @param   ReportRelationQuantifier  $quantifier  Quantifier used for a relationship path.
     *
     * @throws  InvalidArgumentException  When the path or parameter pairing is invalid.
     *
     * @since   2.0.0
     */

## Kumwe\Reporting\Domain\ReportColumnDefinition

/**
 * One disclosure-safe report column sourced from a root or included relation field.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Declare one output column.
     *
     * @param   string           $alias       Stable output key used by grouping, formulas and sorting.
     * @param   string           $label       Human label shown by delivery adapters.
     * @param   string           $sourcePath  Root field or one-hop `relationship.field` path.
     * @param   ReportValueType  $type        Output scalar type.
     *
     * @throws  InvalidArgumentException  When an identifier or label is invalid.
     *
     * @since   2.0.0
     */

## Kumwe\Reporting\Domain\ReportValueType

/**
 * Closed scalar vocabulary accepted by report parameters, columns and formulas.
 *
 * @since  0.2.0
 */

### accepts

/**
     * Prove that an inbound parameter value has this exact type.
     *
     * @param   mixed  $value  Scalar value supplied by an authenticated report caller.
     *
     * @return  bool  True only when the value is bounded and canonical for this type.
     *
     * @since   0.2.0
     */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Reporting\Domain\ReportDefinition

/**
 * Immutable, bounded and manifest-comparable business report definition.
 *
 * It contains logical handles and validated expression trees only. Physical tables, SQL fragments,
 * callbacks and delivery URLs have no representation in this model.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Assemble and cross-check one report contribution.
     *
     * @param   string                                  $id                    Namespaced contribution identifier.
     * @param   int                                     $version               Positive immutable definition version.
     * @param   string                                  $title                 Human report title.
     * @param   string                                  $sourceDefinition      Business entity definition handle.
     * @param   string                                  $requiredCapability    Capability required in addition to the
     *          business-record report or export capability.
     * @param   array<array-key, mixed>         $parameters            Typed caller inputs, at most 32.
     * @param   array<array-key, mixed>            $filters               Query predicates, at most 32.
     * @param   array<array-key, mixed>  $columns               Disclosed output columns, at most 64.
     * @param   array<array-key, mixed>             $groups                Grouping keys, at most four.
     * @param   array<array-key, mixed>         $aggregates            Aggregate outputs, at most 16.
     * @param   array<array-key, mixed>           $formulas              Bounded formulas, at most 16.
     * @param   array<array-key, mixed>              $sorts                 Output sorts, at most five.
     * @param   array<array-key, mixed>         $drillDowns            Declarative record links, at most eight.
     * @param   int                                     $synchronousRowCap     Interactive row limit, from 1 to 1000.
     * @param   bool                                    $administratorVisible  Whether generated administrator
     *          delivery may expose this report.
     * @param bool $portalVisible Explicit opt-in for generated portal delivery.
     *
     * @throws  InvalidArgumentException  When a bound, reference or identifier is invalid.
     *
     * @since   2.0.0
     */

### identifier

/**
     * Return the stable contribution identifier.
     *
     * @return  string  Namespaced report handle.
     *
     * @since   2.0.0
     */

### toArray

/**
     * Export every semantic choice in deterministic manifest shape.
     *
     * @return  array<string, mixed>  Canonically encodable report document.
     *
     * @since   2.0.0
     */

### fromArray

/**
     * Rebuild a report from its deterministic manifest document.
     *
     * @param   array<string, mixed>  $document  Exact output of `toArray()` from a trusted manifest parser.
     *
     * @return  self  Validated immutable definition.
     *
     * @throws  InvalidArgumentException  When a member is missing or has an invalid scalar shape.
     *
     * @since   2.0.0
     */

### checksum

/**
     * Fingerprint the exact manifest shape.
     *
     * @return  string  Lowercase SHA-256 checksum.
     *
     * @since   2.0.0
     */

## Kumwe\Reporting\Domain\ReportDrillDownDefinition

/**
 * Declarative link from one output identity to a generated record view.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Declare a drill-down without accepting a URL or executable template.
     *
     * @param  string  $recordAlias           Output alias carrying the target public record identity.
     * @param  string  $definitionIdentifier  Target business-definition handle.
     * @param  string  $viewIdentifier        Generated view contribution handle.
     *
     * @since  2.0.0
     */

## Kumwe\Reporting\Domain\ReportSortDirection

/**
 * Direction of a stable report-output sort.
 *
 * @since  2.0.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Reporting\Domain\ReportFilterOperator

/**
 * Bounded filter vocabulary translated into the business-record query AST.
 *
 * @since  2.0.0
 */

### isNullTest

/**
     * Report whether this operator binds no parameter.
     *
     * @return  bool  True for the two explicit null tests.
     *
     * @since   2.0.0
     */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Reporting\Domain\ReportDefinitionGuard

/**
 * Shared identifier and path validation for immutable reporting definitions.
 *
 * @since  0.2.0
 */

### handle

/**
     * Assert a lowercase definition-local handle.
     *
     * @param   string  $value  Candidate handle.
     * @param   string  $label  Safe diagnostic label.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the value is not a bounded lowercase handle.
     *
     * @since   0.2.0
     */

### identifier

/**
     * Assert a globally namespaced contribution or definition identifier.
     *
     * @param   string  $value  Candidate dotted identifier.
     * @param   string  $label  Safe diagnostic label.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the value is not a bounded dotted identifier.
     *
     * @since   0.2.0
     */

### path

/**
     * Assert a root field or a path crossing exactly one declared relationship.
     *
     * @param   string  $value  Candidate source path.
     * @param   string  $label  Safe diagnostic label.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the path contains an unsupported segment or hop count.
     *
     * @since   0.2.0
     */

## Kumwe\Reporting\Domain\ProjectionDefinition

/**
 * Immutable contract for a derived projection that can be discarded and rebuilt from versioned events.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Assemble one reproducible projection declaration.
     *
     * @param   string                                      $id                  Namespaced contribution identifier.
     * @param   int                                         $version             Positive builder contract version.
     * @param   string                                      $handlerVersion      Executable builder revision token.
     * @param   EventSensitivity                            $sensitivityCeiling  Most sensitive event accepted.
     * @param   array<array-key, mixed>  $sources             Versioned event inputs, at most 16.
     * @param   array<array-key, mixed>   $fields              Typed derived fields, at most 64.
     * @param   array<array-key, mixed>                      $keyFields           Field handles forming the row key.
     * @param   int                                         $rebuildBatchSize    Deterministic replay batch, 1 to 1000.
     *
     * @throws  InvalidArgumentException  When a bound, identifier or key-field reference is invalid.
     *
     * @since   0.2.0
     */

### identifier

/**
     * Return the stable contribution identifier.
     *
     * @return  string  Namespaced projection handle.
     *
     * @since   0.2.0
     */

### accepts

/**
     * Determine whether this projection accepts the supplied event contract.
     *
     * @param   string  $eventType      Stable namespaced type of the event.
     * @param   int     $schemaVersion  Exact payload schema version to test.
     *
     * @return  bool  Whether a declared source names this exact event contract.
     *
     * @since   0.2.3
     */

### toArray

/**
     * Export every rebuild-relevant choice in deterministic manifest shape.
     *
     * @return  array<string, mixed>  Canonically encodable projection document.
     *
     * @since   0.2.0
     */

### fromArray

/**
     * Rebuild a projection from its deterministic manifest document.
     *
     * @param   array<string, mixed>  $document  Exact output of `toArray()` from a trusted manifest parser.
     *
     * @return  self  Validated immutable projection definition.
     *
     * @throws  InvalidArgumentException  When the document has an invalid scalar or collection shape.
     *
     * @since   0.2.0
     */

### checksum

/**
     * Fingerprint the exact rebuild contract.
     *
     * @return  string  Lowercase SHA-256 checksum.
     *
     * @since   0.2.0
     */

## Kumwe\Reporting\Domain\ReportGroupDefinition

/**
 * One typed output column used as a grouping key.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Name the column whose already-disclosed value forms this grouping key.
     *
     * @param  string  $columnAlias  Alias declared by a report column.
     *
     * @since  2.0.0
     */

## Kumwe\Reporting\Domain\ReportFormulaDefinition

/**
 * One bounded expression evaluated only over disclosure-safe report output aliases.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Declare a formula and its stable output metadata.
     *
     * @param   string           $alias       Stable output key.
     * @param   string           $label       Human label shown by adapters.
     * @param   ReportValueType  $type        Expected scalar result type.
     * @param   Expression       $expression  Validated bounded expression tree.
     *
     * @throws  InvalidArgumentException  When the alias or label is invalid.
     *
     * @since   2.0.0
     */

## Kumwe\Reporting\Domain\ReportSortDefinition

/**
 * One ordering key applied to bounded materialized report rows.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Declare one output sort.
     *
     * @param  string               $outputAlias  Column, aggregate or formula alias.
     * @param  ReportSortDirection  $direction    Direction of the comparison.
     * @param  bool                 $nullsLast    Whether absent values sort after present values.
     *
     * @since  2.0.0
     */

## Kumwe\Reporting\Domain\ReportAggregateDefinition

/**
 * One bounded aggregate over an already-disclosed report column.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Pair an output alias with a function and its optional source column.
     *
     * @param   string                   $alias        Stable result key.
     * @param   ReportAggregateFunction  $function     Aggregate to compute.
     * @param   ?string                  $columnAlias  Source column, absent exactly for count.
     *
     * @throws  InvalidArgumentException  When the function and column pairing is inconsistent.
     *
     * @since   2.0.0
     */

## Kumwe\Reporting\Contract\ProjectionBuilder

/** Deterministic executable bound to one manifest-declared projection. @since 0.2.0 */

### apply

/**
     * @param  ProjectionDefinition  $definition  Signed projection declaration this builder is bound to.
     * @param  ProjectionEvent       $event       Business event being folded into the projection.
     * @param  ProjectionWriter      $writer      Writer receiving the projection rows derived from the event.
     *
     * @since  0.2.0
     */

## Kumwe\Reporting\Contract\ProjectionWriter

/** Owner-bound writer for deterministic derived rows. @since 0.2.0 */

### put

/**
     * @param  array<string, bool|int|string>       $key
     * @param  array<string, bool|int|string|null>  $values
     *
     * @since  0.2.0
     */

### remove

/** @param array<string, bool|int|string> $key @since 0.2.0 */

## Kumwe\Reporting\Contract\ProjectionEvent

/** Immutable, ordered input offered to a projection builder. @since 0.2.0 */

### sequence

/** @since 0.2.0 */

### id

/** @since 0.2.0 */

### type

/** @since 0.2.0 */

### schemaVersion

/** @since 0.2.0 */

### occurredAt

/** @since 0.2.0 */

### payload

/** @return array<string, mixed> @since 0.2.0 */

### checksum

/** @since 0.2.0 */

