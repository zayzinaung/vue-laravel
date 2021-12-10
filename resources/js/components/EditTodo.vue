<template>
    <div>
        <h3 class="text-center">Edit To-do</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateTodo">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="todo.title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" v-model="todo.description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update To-do</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                todo: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/todo/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.todo = response.data;
                });
        },
        methods: {
            updateTodo() {
                this.axios
                    .post(`http://localhost:8000/api/todo/update/${this.$route.params.id}`, this.todo)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>