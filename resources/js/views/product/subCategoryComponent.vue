<template>
    <div class="container-fluid px-4">
        <page-top></page-top>
        <data-table :tableHeading="tableHeading">
            <tr v-for="(data, index) in dataList">
                <td>{{ index+1 }}</td>
                <td>{{ data.name }}</td>
                <td>{{ data.category ? data.category.name : 'N/A' }}</td>
                <td>
                    <a @click="editInformation(data, data.id)" class="btn btn-outline-success">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a @click="deleteInformation(data.id, index)" class="btn btn-outline-danger">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        </data-table>
        <form-modal @submit="submitForm(formData)">
            <div class="row">
                <div class="col-md-12">
                    <label>Category</label>
                    <select v-validate="'required'" v-model="formData.category_id" name="name" class="form-control" type="text">
                        <option class="text-muted" value="">Select</option>
                        <template v-for="(item, index) in requiredData.category">
                            <option :value="item.id">{{ item.name }}</option>
                        </template>
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Name</label>
                    <input v-validate="'required'" v-model="formData.name" name="name" class="form-control" type="text">
                </div>
            </div>
        </form-modal>
    </div>
</template>

<script>
import PageTop from "../../components/pageTop.vue";
import DataTable from "../../components/dataTable.vue";
import axios from "axios";
import FormModal from "../../components/formModal.vue";

export default {
    name: "subCategoryComponent",
    components: {FormModal, DataTable, PageTop},
    data(){
        return {
            tableHeading : ['Sl', 'name', 'Category', 'Action'],
        }
    },
    mounted() {
        this.getDataList();
        this.getRequiredData(['category']);
        this.$set(this.formData, 'name', '');
    }
}
</script>

<style scoped>
.datatable-top {
    padding: 0 !important;
}
</style>
