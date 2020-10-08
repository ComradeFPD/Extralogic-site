<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="/form/create" class="btn btn-info">Создать</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>UID</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Действия</th>
                    </tr>
                    <tbody v-if="isLoading">
                        <b-spinner variant="success" label="Spinning"></b-spinner>
                    </tbody>
                        <tbody v-else>
                    <tr v-for="form in forms">
                    <td> {{ form.id }}</td>
                    <td> {{ form.page_uid }}</td>
                    <td> {{ form.name }}</td>
                    <td> {{ form.phone }}</td>
                      <td>{{ form.email }}</td>
                        <td><a v-bind:href="'/form/show/' + form.id" class="btn btn-success">Посмотреть</a></td>
                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data: function () {
            return {
                forms: '',
                isLoading: true
            }
        },
        props: ['url'],
        created() {
           this.getData();
        },
        methods: {
            getData: function () {
                let forms = '';
                axios.get(this.url + '/forms')
                    .then(response => {
                        this.isLoading = false;
                        this.forms = response.data
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
                console.log(forms);
            }
        }
    }

</script>

<style scoped>

</style>