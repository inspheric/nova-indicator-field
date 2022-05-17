<template>
    <PanelItem :field="field">
        <template #value>
            <Indicator :field="field"></Indicator>
        </template>
    </PanelItem>
</template>

<script>
import Indicator from './Indicator'

export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    components: {
        Indicator,
    }
}
</script>
