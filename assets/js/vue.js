const vue = new Vue({
    data: () => {
        return {
            wines:[],
        }
    },
    mounted(){
        axios.get("libraries/controllers/getData.php")
        .then((res) => res.data)
        .then((res)=> {
            this.wines = res;
        });
    }
}).$mount("#vue-app");