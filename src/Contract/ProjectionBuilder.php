<?php

declare(strict_types=1);

namespace Kumwe\Reporting\Contract;

use Kumwe\Reporting\Domain\ProjectionDefinition;

/** Deterministic executable bound to one manifest-declared projection. @since 0.2.0 */
interface ProjectionBuilder
{
    /**
     * @param  ProjectionDefinition  $definition  Signed projection declaration this builder is bound to.
     * @param  ProjectionEvent       $event       Business event being folded into the projection.
     * @param  ProjectionWriter      $writer      Writer receiving the projection rows derived from the event.
     *
     * @since  0.2.0
     */
    public function apply(
        ProjectionDefinition $definition,
        ProjectionEvent $event,
        ProjectionWriter $writer,
    ): void;
}
