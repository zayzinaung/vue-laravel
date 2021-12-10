import AllTodos from './components/AllTodos.vue';
import AddTodo from './components/AddTodo.vue';
import EditTodo from './components/EditTodo.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllTodos
    },
    {
        name: 'add',
        path: '/add',
        component: AddTodo
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditTodo
    }
];