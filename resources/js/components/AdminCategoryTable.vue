<template>
<div>
    <table class="col-md-12 text-center table-bordered table" id="categoty">
    <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Назва категорії</th>
    <th scope="col">фото</th>
    <th scope="col">Видалити</th>
  </tr>
  </thead>
  <tbody>

        <tr v-for="cat in category">
            <td>{{ cat.id }}</td>
            <td>{{ cat.name }}</td>
            <td><img :src="`/storage/${cat.image}`" width="100" height="100"/></td>
            <td>
                        <input type="hidden" name="delete_category" value="{{ cat.id }}">
                        <div class="text-right">
                            <button @click="deleteCategory(cat.id)" class="btn btn-denger" type="button">Видалити</button>
                        </div>

            </td>
        </tr>

    </tbody>
</table>
</div>
</template>

<script>
    export default {
        name: "AdminCategoryTable",
        data(){
            return{
                category: null
            }
        },
        mounted() {
                this.getCategory();
        },
        methods:{

            getCategory() {
                axios.get('/api/category')
                .then(result => {
                this.category = result.data;
            }).catch(error => {
                console.log(error);
            });
            },

            deleteCategory(id){
                let data = new FormData();
                data.append('delete_category', id);
                axios.post('/api/deleteCategory', data)
                .then(result => {
                    this.getCategory();

            }).catch(error => {
                console.log(error);
            });

            }
        }
    }
</script>

<style scoped>

</style>
