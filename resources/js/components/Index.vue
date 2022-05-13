<template>
    <div class="container">
      <div>
        <input type="text" v-model="filterByTitle">
        <div class="btn btn-success" @click="onClickButton">Click</div>
        <select v-model="sortedBy">
          <option disabled value="">Выберите один из вариантов</option>
          <option value="title">title</option>
          <option value="speciality">speciality</option>
          <option value="year">year</option>
        </select>
        {{sortedBy}}
      </div>
        <div v-for="el in  filteredItems" :key="el.title">
        <div>{{ el.title }}</div>
          <div>{{ el.laravel }}</div> 
        </div>
    </div>
</template>

<script>
  import _ from 'lodash';

    export default {
      name: "Index",  
      data () {
        return {
          items: [],
          filterBySpeciality: "",
          filterByTitle: "",
          sortedBy: "",
        }
      },
      computed: {
        filteredItems() {
            return _(this.items).filter(x => {
                return this.filterByTitle == "" || x.title.toLowerCase().includes(this.filterByTitle.toLowerCase());
            }).orderBy(x => x[this.sortedBy]).value();
        }
      },
      methods: {
        async fetchVkrs() {
          let r = await fetch("/vkrs");
          let data = await r.json();
          this.items = data;
        },
        onClickButton() {
            this.fetchVkrs();
        }
      },
      mounted() {
          this.fetchVkrs();
      }
    }
</script>
