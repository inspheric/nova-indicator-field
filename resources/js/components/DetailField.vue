<template>
    <panel-item :field="field">
        <template slot="value">
            <indicator-field :field="field"></indicator-field>
        </template>
    </panel-item>
</template>

<script>
import Indicator from './Indicator'

export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    components: {
        'indicator-field': Indicator
    }
}
</script>
