<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12" v-if="isLoading">
                <b-spinner variant="success"></b-spinner>
            </div>
            <div class="col-md-12" v-else>
                <form action="#" v-if="!isCreate">
                    <div class="form-group">
                        <label for="uid">Уникальный идентификатор формы</label>
                        <input disabled type="text" class="form-control" id="uid" v-model="this.uid">
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input disabled type="text" class="form-control" id="name" v-model="this.name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input disabled type="email" class="form-control" id="email" v-model="this.email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input disabled type="text" class="form-control" id="phone" v-model="this.phone">
                    </div>
                    <div class="form-group">
                        <button disabled v-on:click="saveForm" type="submit" class="btn btn-success">Отправить</button>
                    </div>
                </form>
                <form action="#" v-else>
                    <div class="form-group">
                        <label for="uid">Уникальный идентификатор формы</label>
                        <input  type="text" class="form-control" id="uid" v-model="this.uid">
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" id="phone" v-model="phone">
                    </div>
                    <div class="form-group">
                        <button v-on:click="saveForm" type="submit" class="btn btn-success">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Form",
        data: function () {
            return {
                uid: this.uuid,
                name: null,
                email:  null,
                phone:  null,
                isLoading: true,
                loadedForm: '',
            }
        },
        props: ['isCreate', 'url', 'form', 'id', 'uuid'],
        created() {
            this.getDataFromApi()
        },
        methods: {
            getDataFromApi: function () {
                if(this.isCreate){
                    this.isLoading = false;
                    return false;
                }
                axios.get(this.url + '/forms/' + this.id)
                .then(response => {
                    this.isLoading = false;
                    this.loadedForm = response.data;
                    this.uid = this.loadedForm.page_uid;
                    this.email = this.loadedForm.email;
                    this.phone = this.loadedForm.phone;
                    this.name = this.loadedForm.name;
                })
                .catch(error => {
                    this.isLoading = false;
                    console.log(error);
                });
            },
            saveForm: function () {
                const fd = new FormData();
                fd.append('page_uid', this.uid);
                fd.append('name', this.name);
                fd.append('email', this.email);
                fd.append('phone', this.phone);
                axios.post(this.url + '/forms', fd)
                .then(function (response) {
                    console.log('Форма успешно сохранена');
                    document.location = '/';
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>