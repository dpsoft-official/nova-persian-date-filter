<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">{{ filter.name }}</h3>

        <div class="p-2">
            <date-picker
                    :id="filter.name + '-filter-date'"
                    :type="type"
                    :color="color"
                    :placeholder="placeholder"
                    inputClass="block w-full form-control-sm date-ltr"
                    :initial-value="persianDate"
                    v-model="value"
                    @change="handleChange"
            ></date-picker>
        </div>
    </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'
    import jMoment from "moment-jalaali"

    export default {
        props: {
            resourceName: {
                type: String,
                required: true,
            },
            filterKey: {
                type: String,
                required: true,
            },
        },
        data() {
            return {
                value: null
            }
        },
        methods: {
            handleChange() {
                console.log(this);
                this.$store.commit(`${this.resourceName}/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: this.altDateValue,
                })

                this.$emit('change')
            },
        },

        computed: {
            placeholder() {
                return jMoment().format(this.format);
            },
            format() {
                return this.filter.format || 'jYYYY/jMM/jDD';
            },
            altDateValue() {
                return this.value ? jMoment(this.value, this.format).format('YYYY-MM-DD') : '';
            },
            persianDate() {
                if (!this.filter.currentValue) {
                    return '';

                } else {
                    return jMoment(this.filter.currentValue).format(this.format);
                }

            },
            filter() {
                return this.$store.getters[`${this.resourceName}/getFilter`](this.filterKey)
            },
            color() {
                return this.filter.color || `rgb(30, 136, 229)`;
            },
            type() {
                return this.filter.type || `date`;
            }
            // value() {
            //     return this.filter.currentValue
            // },
        },
        mounted() {
            this.value = this.persianDate;
        },
        components: {
            datePicker: VuePersianDatetimePicker
        }
    }
</script>
<style>
    .date-ltr {
        direction: ltr !important;
        text-align: right;
    }
</style>