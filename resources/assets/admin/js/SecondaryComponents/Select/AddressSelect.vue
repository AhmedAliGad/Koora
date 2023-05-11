<template>
    <div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">City </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input type="hidden" name="city_id" :value="city ? city.id : null">
                        <multiselect v-model="city" :options="cities" :multiple="false" :close-on-select="true" :clear-on-select="false" :preserve-search="true" placeholder="Select City" label="name" track-by="id" :preselect-first="false"
                        >
                        </multiselect>
                        <pre  hidden class="language-json"><code>{{ city }}</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">Area </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input type="hidden" name="area_id" :value="area ? area.id : null">
                        <multiselect v-model="area" :options="areas" :multiple="false" :close-on-select="true" :clear-on-select="false" :preserve-search="true" placeholder="Select Area" label="name" track-by="id" :preselect-first="false"
                        >
                        </multiselect>
                        <pre  hidden class="language-json"><code>{{ area }}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    name: "AddressSelect",
    components: {
        Multiselect
    },
    props : {
        oldCity:{
            required: false
        },
        oldArea:{
            required: false
        }
    },
    data () {
        return {
            cities: [],
            city: this.oldCity ? this.oldCity[0] : '',
            areas : [],
            area: this.oldArea ? this.oldArea[0] : '',
        }
    },
    mounted () {
        axios.get('/dashboard/cities_list')
            .then(function (response) {
                this.cities = response.data.data;
            }.bind(this));
    },
    watch: {
        city: function(value) {
            if (value != null) {
                axios.get('/dashboard/areas_list?city=' + value.id).then(response => {
                        this.areas = response.data.data;
                        this.area = '';
                    }
                )
            } else {
                this.area = '';
            }
        },
    }
}
</script>

<style scoped>

</style>
