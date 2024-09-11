<template>
    <div class="card mb-4">
        <div class="card-header">
            <div class="datatable-top">
                <div class="datatable-dropdown">
                    <label>
                        <select class="datatable-selector">
                            <option value="5">5</option>
                            <option value="10" selected="">10</option>
                        </select> entries per page
                    </label>
                </div>
                <div class="datatable-search">
                    <input class="datatable-input" placeholder="Search..." type="search" title="Search within table" aria-controls="datatablesSimple">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="datatable-container">
                    <table id="datatablesSimple" class="datatable-table">
                        <thead>
                        <tr>
                            <template v-for="heading in tableHeading">
                                <th >{{ heading }}</th>
                            </template>
                        </tr>
                        </thead>
                        <tbody>
                            <slot></slot>
                        </tbody>
                    </table>
                </div>
                <div class="datatable-bottom">
                    <div class="datatable-info">Showing 1 to 10 of 57 entries</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "dataTable",
    props :{
        tableHeading : {
            type : [Array, Object],
            default (){
                return [];
            }
        }
    }
}
</script>

<style scoped>

</style>
