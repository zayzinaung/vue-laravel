<template>
    <div>
        <h3 class="text-center">Add To-do</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addTodo">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="todo.title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" v-model="todo.description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add To-do</button>
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
        methods: {
            addTodo() {
                this.axios
                    .post('http://localhost:8000/api/todo/add', this.todo)
                    .then(response => (
                        this.$router.push({name: 'home'})
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>