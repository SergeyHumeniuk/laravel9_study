<template>
    <div>
        <form @submit="formSubmit" enctype="multipart/form-data">
            <p>Добавити категорію</p>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_category">Назва категорії</span>
                    <input type="text" class="form-control" v-model="name_category" aria-label="Sizing example input" aria-describedby="name_category">
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Малюнок</span>
                <input type="file" class="form-control-file" id="Picture" @change="onFileChange" name="picture" multiple="">
            </div>
            <div class="text-right">
                <button @click.prevent="addCategory" class="btn btn-primary btn-block">Upload</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AdminCategoryAdd",
        data(){
            return{
                name_category: null,
                file: null
            }
        },
        methods:{

            onFileChange(event) {
                this.file = event.target.files[0];
            },
            addCategory() {
                let data = new FormData();
                data.append('picture', this.file);
                data.append('name_category', this.name_category);
                axios.post('/admin/categorys_add', data,{
                headers: {
                'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                //console.log(response);
                location.reload();

            }).catch(error => {
                console.log(error);
            });
            }
        }
    }
</script>
<style scoped>

</style>
