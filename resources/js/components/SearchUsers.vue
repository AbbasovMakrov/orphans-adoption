<template>
    <div id="app">
        <input type="text" @keyup="getUsers" v-model="username" placeholder="Search a user" class="form-control">
        <div class="card" v-for="user in users">
            <div class="card-header">
                <a @click="redirectTo('/orphans/orphansFrom/'+user.id)">{{user.name}}</a>
            </div>
            <div class="card-body">
                <p class="card-text">Age is {{user.age}}</p>
                <p class="card-text">Location is {{user.location}}</p>
                <p class="card-text">Phone is {{user.phone}}</p>
                <p class="card-text">The Adoptions Count is {{user.adoption.length}}</p>
                <p class="card-text">The Orphans Count is {{user.orphan.length}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchUsers",
        data() {
            return {
                username : "",
                users : []
            }
        },
        methods :
            {
                getUsers()
                {
                    axios.get("/api/search/user/" + this.username).then(response => {
                        this.users = response.data.users;
                    });
                },
                redirectTo(link)
                {
                 return window.location.href = link;
                }
            }
    }
</script>

<style scoped>

</style>
