<template>
    <div id="app">
    <input type="text" @keyup="getOrphans" v-model="orphanInput" placeholder="Orphan Search...." :class="this.formControl">
        <div class="card" v-for="orphan in this.orphans">
            <div class="card-header">
                <h1>{{orphan.name}}</h1>
                <img :src="'/storage/' + orphan.image" class="card-img" :alt="orphan.name">
            </div>
            <div class="card-body">
                <p class="card-text">Age is {{orphan.age}}</p>
                <p class="card-text">Location is {{orphan.location}}</p>
                <p class="card-text">Contact Phone is {{orphan.user.phone}}</p>
                <p class="card-text">Publisher Name {{orphan.user.name}}</p>
                <p class="card-text">Details {{orphan.other_details}}</p>
                <p class="card-text">Published At {{orphan.created_at}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchOrphans",
        data() {
            const formC = "form-control";
            return {
                orphanInput : "",
                orphans : [],
                formControl : formC
            }
        },
        methods : {
            getOrphans() {
                axios.get("/api/search/orphan/" + this.orphanInput)
                    .then(res => {
                        this.orphans = res.data.orphans;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
