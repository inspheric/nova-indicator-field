<template>
    <span class="whitespace-no-wrap" v-if="!field.shouldHide">
        <span
            class="inline-block indicator-grey rounded-full w-2 h-2 mr-1"
            v-bind="colorClassStyle"
        />
        <span v-if="labelText">
            {{ labelText }}
        </span>
        <span v-else-if="field.unknownLabel && !field.withoutLabels">{{ field.unknownLabel }}</span>
        <span v-else>&mdash;</span>
    </span>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    computed: {
        labelText() {
            if (this.field.withoutLabels) {
                return this.field.value
            }
            else if (this.field.labels && this.field.labels.hasOwnProperty(this.field.value)) {
                return this.field.labels[this.field.value]
            }
        },
        colorClassStyle() {
            let color = 'grey'

            if (this.field.colors && this.field.colors.hasOwnProperty(this.field.value)) {
                color = this.field.colors[this.field.value]
            }

            if (/^(?:#|var\(--|(?:rgb|hsl)a?\()/.test(color)) {
                return {
                    style: `background:${color};`
                }
            }

            return {
                class: `indicator-${color}`
            }
        }
    }
}
</script>
