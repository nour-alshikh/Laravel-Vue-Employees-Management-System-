<template>
    <div class="w-100 mx-auto">
        <div class="w-50 mx-auto">
            <div v-if="showMessage" class="alert alert-success">
                {{ message }}
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center w-100 px-4">
            <h1>Employees</h1>
            <router-link :to="{ name:'EmployeesCreate' }" class="btn btn-primary">Create</router-link>
        </div>
        <div class="search w-100 my-5">
            <form class="row justify-content-between mx-auto w-25">
                <input class="form-control w-50 my-2" type="search" v-model="search" placeholder="Search by name...." />
                <button class="btn btn-primary my-2">
                    Search
                </button>
                <select class="form-control" aria-label="Default select example"
                    v-model="selectedDepartment">
                    <option v-for="department in departments" :key="department.id"
                    :value="department.id">{{ department.name }}</option>
                </select>
            </form>
        </div>
        <div class="px-5 w-100">
            <table class="table table-hover ">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Zip Code</th>
                    <th scope="col">Country</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="employee in employees" :key="employee.id">
                        <th scope="row">{{ employee.id }}</th>
                        <td>{{ employee.first_name }}</td>
                        <td>{{ employee.middle_name }}</td>
                        <td>{{ employee.last_name }}</td>
                        <td>{{ employee.address }}</td>
                        <td>{{ employee.zip_code }}</td>
                        <td>{{ employee.country.country_code }}</td>
                        <td>{{ employee.state.name }}</td>
                        <td>{{ employee.city.name }}</td>
                        <td>{{ employee.department.name }}</td>

                        <td class="d-flex">
                            <router-link class="btn btn-success mx-1" :to="{name:'EmployeesEdit' , params:{id:employee.id}}">Edit</router-link>
                            <button class="btn btn-danger" @click="deleteEmployee(employee.id)">
                                Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            employees :[],
            message :'',
            showMessage :false,
            search :null,
            departments :[],
            selectedDepartment :null
        }
    },
    created(){
        this.getEmployees();
        this.getDepartments();
    },
    watch :{
        search(){
            this.getEmployees()
        },
        selectedDepartment(){
            this.getEmployees()
        }
    },
    methods:{
        getEmployees(){
            axios.get('/api/employees' ,
             { params : {
                search :this.search,
                department_id : this.selectedDepartment
            }})
            .then((res)=>{
                this.employees = res.data.data
            })
            .catch((err)=>{
                console.log(err);
            })
        },
        deleteEmployee(id){
            console.log('test');
            axios.delete('api/employees/' + id)
            .then((res)=>{
                this.showMessage = true;
                this.message = res.data
                this.getEmployees();
            })
            .catch((err) =>{
                console.log(err);
            })
        },
        getDepartments() {
        axios.get("/api/employees/departments")
            .then((res) => {
                this.departments = res.data
            })
            .catch((err) => {
                console.log(err);
            })
        },
    }
}
</script>

<style>

</style>
