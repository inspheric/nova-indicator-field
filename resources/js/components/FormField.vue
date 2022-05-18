<template>
    <DefaultField :field="field">
        <template #field>
            <Indicator :field="field"></Indicator>
        </template>
    </DefaultField>
</template>

<script>
import Indicator from './Indicator'
import { FormField } from 'laravel-nova'

export default {
    mixins: [FormField],

    components: {
        Indicator
    }
}
</script>
