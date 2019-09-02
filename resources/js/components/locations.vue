<template>
    <div id="app">
        <select class="form-control" name="location">
            <option>Choose A Location</option>
            <option :value="location.name" v-for="location in locations">{{location.name}}</option>
        </select>
    </div>

</template>

<script>
    export default {
        name: "locations",
        data ()
        {
            return {
                locations:[]
            }
        },
        methods : {
            getLocations(){
                axios.get("/api/locations/get").then(response => {
                    this.locations = response.data.locations;
                });
            }
        },
        mounted() {
            this.getLocations();
        }
    }
</script>

<style scoped>

</style>
