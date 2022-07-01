
<template>
  <div class="container mt-5">
    <div class="container-fluid">
      <div class="shadow mb-4">
        <b-button v-b-toggle.sidebar-border block variant="primary"
          >Информация о преподавателях</b-button
        >
      </div>
      <b-table :items="vkrs" :fields="fields" striped responsive="sm">
        <template #cell(show_details)="row">
          <b-button size="sm" @click="row.toggleDetails" class="mr-2">
            {{ row.detailsShowing ? "Закрыть" : "Посмотреть" }}
          </b-button>
        </template>

        <template #row-details="row">
          <b-card>
            <b-row class="mb-2">
              <b-col sm="3" class="text-sm-left"><b>Описание</b></b-col>
              <b-col>{{ row.item.description }}</b-col>
            </b-row>

            <b-button size="sm" @click="row.toggleDetails">Закрыть</b-button>
          </b-card>
        </template>
      </b-table>
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
            <b-button block variant="primary" @click="hide">Закрыть</b-button>
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
      fields: [
        { key: "title", label: "Название темы" },

        { key: "user", label: "Руководитель" },
        { key: "show_details", label: "Описание" },
      ],
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