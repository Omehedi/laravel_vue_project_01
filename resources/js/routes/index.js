import dashboardComponent from "../views/dashboardComponent.vue";
import About from "../views/About.vue";
import categoryComponent from "../views/product/categoryComponent.vue";
import subCategoryComponent from "../views/product/subCategoryComponent.vue";

const route = [
    {
        path : '/admin/dashboard',
        name : 'home',
        component : dashboardComponent
    },
    {
        path : '/admin/about',
        name : 'about',
        component : About
    },
    {
        path : '/admin/product/category',
        name : 'about',
        component : categoryComponent,
        meta : {pageTitle : 'Category', dataUrl : 'api/categories'}
    },
    {
        path : '/admin/product/sub_category',
        name : 'about',
        component : subCategoryComponent,
        meta : {pageTitle : 'Sub-Category', dataUrl : 'api/sub_categories'}
    },
    {
        path : '/admin/product/product',
        name : 'about',
        component : About
    },
];
export default route;
