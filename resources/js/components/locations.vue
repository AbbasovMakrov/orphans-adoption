<template>
    <div id="app">
        <div class="alert alert-danger" v-show="this.locations.length === 0" > No locations</div>
        <select class="form-control" v-show="this.locations" name="location">
            <option :value="null">Choose A Location</option>
            <option :value="location.name" v-for="location in locations">{{location.name}}</option>
        </select>
    </div>

</template>

<script>
    export default {
        name: "locationsComponent",
        data() {
            return {
                locations:[]
            }
        },
        methods : {
            getLocations(){
                axios.get("/api/locations/get").then(response => {
                    this.locations = response.data.locations;
                }).catch(error => {
                   console.log(error.toString());
                });
            },

        },
        mounted() {
            this.getLocations();
        }
    }
</script>


