<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Employee
                            <router-link :to="{ name: 'EmployeesIndex' }"
                                class="btn btn-danger float-right">Back</router-link>
                        </div>
                        <form class="py-4" @submit.prevent="updateEmployee">

                            <div class="row mb-3 justify-content-between px-4">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" required autofocus
                                        v-model="form.first_name">
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between px-4">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-end">Middle Name</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control" required
                                        v-model="form.middle_name">
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between px-4">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" required
                                        v-model="form.last_name">
                                </div>
                            </div>


                            <div class="row mb-3 justify-content-between px-4">
                                <label for="country" class="col-md-4 col-form-label text-md-end">Country</label>

                                <div class="col-md-6">

                                    <select class="form-control" aria-label="Default select example"
                                        v-model="form.country_id" @change="getStates()">
                                        <option v-for="country in countries" :key="country.id" :value="country.id">{{
                                            country.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between px-4">
                                <label for="state" class="col-md-4 col-form-label text-md-end">State</label>

                                <div class="col-md-6">

                                    <select class="form-control" aria-label="Default select example" v-model="form.state_id"
                                        @change="getCities()">
                                        <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between px-4">
                                <label for="city" class="col-md-4 col-form-label text-md-end">City</label>

                                <div class="col-md-6">

                                    <select class="form-control" aria-label="Default select example" v-model="form.city_id">
                                        <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between px-4">
                                <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>

                                <div class="col-md-6">

                                    <select class="form-control" aria-label="Default select example"
                                        v-model="form.department_id">
                                        <option v-for="department in departments" :key="department.id"
                                            :value="department.id">{{ department.name }}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3 justify-content-between px-4">
                                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" required v-model="form.address">
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between px-4">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip Code</label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text" class="form-control" required v-model="form.zip_code">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Datepicker from 'vue3-datepicker';
import moment from 'moment';


export default {
    components: {
        Datepicker
    },
    data() {
        return {
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                first_name: '',
                middle_name: '',
                last_name: '',
                address: '',
                zip_code: '',
                country_id: '',
                state_id: '',
                city_id: '',
                department_id: '',
                birth_date: null,
                hired_date: null,
            }
        }
    },
    created() {
        this.getCountries();
        this.getDepartments();
        this.getEmployee();
    },
    methods: {
        getEmployee() {
            axios.get('/api/employees/' + this.$route.params.id)
                .then((res) => {
                    this.form = res.data.data
                    this.getStates();
                    this.getCities()
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        getCountries() {
            axios.get('/api/employees/countries')
                .then((res) => {
                    this.countries = res.data
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        getStates() {
            axios.get("/api/employees/" + this.form.country_id + "/states")
                .then((res) => {
                    this.states = res.data
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        getCities() {
            axios.get("/api/employees/" + this.form.state_id + "/cities")
                .then((res) => {
                    this.cities = res.data
                })
                .catch((err) => {
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
        updateEmployee() {
            axios.put("/api/employees/" + this.$route.params.id , {
                "first_name": this.form.first_name,
                "middle_name": this.form.middle_name,
                "last_name": this.form.last_name,
                "address": this.form.address,
                "zip_code": this.form.zip_code,
                "country_id": this.form.country_id,
                "state_id": this.form.state_id,
                "city_id": this.form.city_id,
                "department_id": this.form.department_id,
                "birth_date": this.formatDate(this.form.birth_date),
                "hired_date": this.formatDate(this.form.hired_date),
            })
                .then((res) => {
                    this.form = {
                        first_name: '',
                        middle_name: '',
                        last_name: '',
                        address: '',
                        zip_code: '',
                        country_id: '',
                        state_id: '',
                        city_id: '',
                        department_id: '',
                        birth_date: null,
                        hired_date: null,
                    }
                    this.$router.push({ name: 'EmployeesIndex' })
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        formatDate(value) {
            if (value) {
                return moment(String(value)).format('YYYYMMDD')
            }
        }
    }
}
</script>

<style scoped>
</style>
