<template>
    <div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">Audience </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="columns">
                            <div class="column is-10">
                                <input type="hidden" v-for="(type , index) in types" name="types[]" :value="type.id" :key="`type_${index}`">
                                <multiselect v-model="types" :options="hcp_types" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Select Audience" label="name" track-by="id" :preselect-first="false"
                                >
                                </multiselect>
                                <pre  hidden class="language-json"><code>{{ types }}</code></pre>
                            </div>
                            <div class="column is-2">
                                <button class="select-all button" :class="typesToggle == false ? 'is-success' : 'is-danger' " @click.prevent="ToggleTypesSelect">
                                    <template v-if="typesToggle == false">Select All</template>
                                    <template v-else>Deselect All</template>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">Specialties </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="columns">
                            <div class="column is-10">
                                <input type="hidden" v-for="(speciality , index) in specialities" name="specialities[]" :value="speciality.id" :key="`speciality_${index}`">
                                <multiselect v-model="specialities" :options="hcp_specialities" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Select Specialities" label="name" track-by="id" :preselect-first="false"
                                >
                                </multiselect>
                                <pre  hidden class="language-json"><code>{{ specialities }}</code></pre>
                            </div>
                            <div class="column is-2">
                                <button class="select-all button" :class="specialitiesToggle == false ? 'is-success' : 'is-danger' " @click.prevent="ToggleSpecialitiesSelect">
                                    <template v-if="specialitiesToggle == false">Select All</template>
                                    <template v-else>Deselect All</template>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    name: "SpecialitiesSelect",
    components: {
        Multiselect
    },
    props : {
        oldTypes:{
            type: Array,
            required: false
        },
        oldSpecialities:{
            type: Array,
            required: false
        }
    },
    data () {
        return {
            hcp_types: [],
            types: this.oldTypes ? this.oldTypes : [],
            hcp_specialities : [],
            specialities: this.oldSpecialities ? this.oldSpecialities : [],
            typesToggle: false,
            specialitiesToggle : false
        }
    },
    methods:{
        ToggleTypesSelect() {
            this.typesToggle = !this.typesToggle
            if(this.typesToggle == true){
                this.types = this.hcp_types;
            }else{
                this.types = [];
            }
        },
        ToggleSpecialitiesSelect() {
            this.specialitiesToggle = !this.specialitiesToggle
            if(this.specialitiesToggle == true){
                this.specialities = this.hcp_specialities;
            }else{
                this.specialities = [];
            }
        }
    },
    mounted () {
        axios.get('/dashboard/types')
            .then(function (response) {
                this.hcp_types = response.data.data;
            }.bind(this));
    },
    watch: {
        types: function(value) {
            const selected = this.types.map(type => type.id)
            axios.get('/dashboard/specialities?types=' + selected).then(response => {
                    this.hcp_specialities = response.data.data;
                    this.specialities = [];
                    //this.specialities = response.data.data;
                }
            )
        },
    }
}
</script>

<style scoped>

</style>
