<template>
    <Indicator :field="field"></Indicator>
</template>

<script>
import Indicator from './Indicator'

export default {
    props: ['resourceName', 'field'],

    components: {
        Indicator
    }
}
</script>
