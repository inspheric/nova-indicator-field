<?php

namespace Inspheric\Fields;

use Laravel\Nova\Fields\Field;

class Indicator extends Field
{

    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var bool
     */
    public $showOnCreation = false;

    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var bool
     */
    public $showOnUpdate = false;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'indicator';

    /**
     * Specify the labels that should be displayed.
     *
     * @param  array  $labels
     * @return $this
     */
    public function labels(array $labels)
    {
        return $this->withMeta(['labels' => $labels, 'withoutLabels' => false]);
    }

    /**
     * Specify the colours that should be displayed.
     *
     * @param  array  $colors
     * @return $this
     */
    public function colors(array $colors)
    {
        return $this->withMeta(['colors' => $colors]);
    }

    /**
     * The label to display when the value is not one of the defined statuses.
     *
     * @param  string $label
     * @return $this
     */
    public function unknown(string $label)
    {
        return $this->withMeta(['unknownLabel' => $label]);
    }

    /**
     * Display the raw value instead of a label.
     *
     * @return $this
     */
    public function withoutLabels()
    {
        return $this->withMeta(['withoutLabels' => true]);
    }
}
