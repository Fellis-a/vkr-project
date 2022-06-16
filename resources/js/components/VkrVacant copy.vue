
<template>
  <div class=" mt-5">
    <div class="container-fluid">
      <div class="shadow mb-4">
        <b-button v-b-toggle.sidebar-border block variant="primary"
          >Информация о преподавателях</b-button
        >
      </div>
      <div v-for="(items, user) in vkrsGroupedByName" :key="user">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
            class="
              card-header
              py-3
              d-flex
              flex-row
              align-items-center
              justify-content-between
            "
          >
            <h3 class="m-0 font-weight-bold text-primary">{{ user }}</h3>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>№</th>
                  <th>Тема</th>
                  <th>Описание</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(i, n) in items" :key="i.id">
                  <td >{{ n+1 }}</td>
                  <td >{{ i.title }}</td>
                  <td class="pl-4">{{ i.description }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div>
      <b-sidebar
        id="sidebar-border"
        backdrop-variant="light"
        backdrop
        shadow
        sidebar-class="border-right border-danger"
        width="100%"
        
      >
         <template #default="{ hide }">
        <div class="px-3 py-2">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>ФИО</th>
                <th>Профиль</th>
                <th>Почта</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="u in users" :key="u.id">
                <td>{{ u.name }}</td>
                <td><a :href="u.link">Перейти на сайт ИРНИТУ</a></td>
                <td><a :href="`mailto:${u.email}`">Написать на почту</a></td>
              </tr>
            </tbody>
          </table>
           <b-button block variant="primary" @click="hide"
          >Закрыть</b-button
        >
        </div>
            </template>
      </b-sidebar>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
export default {
  data() {
    return {
      vkrs: [],
      users: [],
    };
  },
  mounted() {
    axios.get("/api/titles").then((response) => {
      console.log(response);
      this.vkrs = response.data.data;
    });

    axios.get("/api/users").then((response) => {
      console.log(response);
      this.users = response.data.data;
    });
  },
  computed: {
    vkrsGroupedByName() {
      return _(this.vkrs)
        .groupBy((x) => x.user)
        .value();
    },
  },
};
</script>