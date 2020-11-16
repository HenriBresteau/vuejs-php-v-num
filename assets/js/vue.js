const vue = new Vue({
  data: () => {
    return {
      wines: [],
      searchKey: "",
      inputType: "",
      countryList: [],
      contryOption: [],
      countrySelected: "",
    };
  },
  computed: {
    search() {
      return this.wines.filter((wine) => {
        return ( 
            wine.name.toLowerCase().includes(this.searchKey.toLowerCase()) &&
            wine.country.toLowerCase().includes(this.countrySelected.toLowerCase()) 
        )
      });
    },
  },
  methods: {
    removeItem(id) {
      this.$delete(this.wines, id);
    },
    getImgUrl(pic) {
      return "assets/uploads/" + pic;
    },
    searchInput(param) {
      this.inputType = param;
    },
  },
  mounted() {
    axios
      .get("libraries/controllers/getData.php")
      .then((res) => res.data)
      .then((res) => {
        this.wines = res;
      })
      .then(() => {
        for (let i = 0; i < this.wines.length; i++) {
          if (!this.countryList.includes(this.wines[i].country)) {
            this.countryList.push(this.wines[i].country);
          }
        }
      });
    setTimeout(() => {
      let arr = this.countryList.sort();
      for (let index = 0; index < arr.length; index++) {
        this.contryOption.push({
          name: arr[index],
          id: arr[index],
        });
      }
    }, 500);
  },
}).$mount("#vue-app");
