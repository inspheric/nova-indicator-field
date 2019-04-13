<template>
    <default-field :field="field">
        <template slot="field">
            <indicator-field :field="field"></indicator-field>
        </template>
    </default-field>
</template>

<script>
import Indicator from './Indicator'
import { FormField } from 'laravel-nova'

export default {
    mixins: [FormField],

    components: {
        'indicator-field': Indicator
    }
}
</script>
