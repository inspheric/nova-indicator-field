<template>
    <span>
        <span
            class="inline-block rounded-full w-2 h-2 mr-1"
            :class="colorClass"
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
                return this.field.value;
            }
            else if (this.field.labels && this.field.labels.hasOwnProperty(this.field.value)) {
                return this.field.labels[this.field.value];
            }
        },
        colorClass() {
            let color = 'grey';

            if (this.field.colors && this.field.colors.hasOwnProperty(this.field.value)) {
                color = this.field.colors[this.field.value];
            }

            return `indicator-${color}`;
        }
    }
}
</script>
