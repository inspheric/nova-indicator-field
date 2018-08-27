<template>
    <span>
        <span
            class="inline-block rounded-full w-2 h-2 mr-1"
            :class="colorClass"
        />
        <span v-if="labelText">
            {{ labelText }}
        </span>
        <span v-else>{{ field.unknownLabel ? field.unknownLabel : '&mdash;' }}</span>
    </span>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    computed: {
        labelText() {
            if (this.field.statuses.hasOwnProperty(this.field.value)) {
                return this.field.statuses[this.field.value].label;
            }
        },
        colorClass() {
            let color = 'grey';

            if (this.field.statuses.hasOwnProperty(this.field.value)) {
                color = this.field.statuses[this.field.value].color;
            }

            return `indicator-${color}`;
        }
    }
}
</script>
