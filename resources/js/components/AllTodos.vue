<template>
    <div>
        <h3 class="text-center">All To-do Lists</h3><br/>
 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="todo in todos" :key="todo.id">
                    <td>{{ todo.id }}</td>
                    <td>{{ todo.title }}</td>
                    <td>{{ todo.description }}</td>
                    <td>{{ todo.created_at }}</td>
                    <td>{{ todo.updated_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: { id: todo.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteTodo(todo.id)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                todos: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/todos')
                .then(response => {
                    this.todos = response.data;
                });
        },
        methods: {
            deleteTodo(id) {
                this.axios
                    .delete(`http://localhost:8000/api/todo/delete/${id}`)
                    .then(response => {
                        let i = this.todos.map(item => item.id).indexOf(id);
                        this.todos.splice(i, 1)
                    });
            }
        }
    }
</script>