import Vue from "vue"
import axios from "axios"
import VueAxios from "vue-axios";

const ApiService = {
    init(){
        Vue.use(VueAxios, axios);
    },
    get(resource, slug = "") {
        return Vue.axios.get(`${resource}/${slug}`).catch(error => {
            throw new Error(`[RWV] ApiService ${error}`);
        });
    },

    post(resource, params) {
        return Vue.axios.post(`${resource}`, params);
    }

};

export default ApiService;