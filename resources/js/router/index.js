import { createRouter, createWebHistory } from 'vue-router';

import EmployeesIndex from '../components/employees/Index.vue'
import EmployeesCreate from '../components/employees/Create.vue'
import EmployeesEdit from '../components/employees/Edit.vue'


const routes = [
    {
        path: '/employees',
        name: 'EmployeesIndex',
        component: EmployeesIndex
    },
    {
        path: '/employee/create',
        name: 'EmployeesCreate',
        component: EmployeesCreate
    },
    {
        path: '/employee/:id',
        name: 'EmployeesEdit',
        component: EmployeesEdit
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
