<template>
    <indicator-field :field="field"></indicator-field>
</template>

<script>
import Indicator from './Indicator'

export default {
    props: ['resourceName', 'field'],

    components: {
        'indicator-field': Indicator
    }
}
</script>
