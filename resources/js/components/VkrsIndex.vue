<template>
  <div>
    <div>
      
      <b-tabs content-class="mt-5" fill>
        <b-tab title="Архив тем ВКР" active>
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-1 col-xl-1 col-xs-1">
                  <label for="paginate" class="text-nowrap mr-2 mb-0"
                    > Записи</label
                  >
                  <select
                    v-model="paginate"
                    class="form-control form-control-sm"
                  >
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                  </select>
                </div>

                <div class="col-md-4 col-xl-2 col-xs-1">
                  <label for="paginate" class="text-nowrap mr-2 mb-0"
                    >Cпециальности</label
                  >
                  <select
                    v-model="selectedSpecialty"
                    class="form-control form-control-sm"
                  >
                    <option value="">-- все --</option>
                    <option
                      v-for="item in specialties"
                      :key="item.id"
                      :value="item.id"
                    >
                      {{ item.code }}
                    </option>
                  </select>
                </div>
                <div class="col-md-4 col-xl-2 col-xs-1">
                  <label for="paginate" class="text-nowrap mr-2 mb-0"
                    >Руководитель</label
                  >
                  <select
                    v-model="selectedUser"
                    class="form-control form-control-sm"
                  >
                    <option value="">-- все --</option>
                    <option
                      v-for="user in users"
                      :key="user.id"
                      :value="user.id" >
                      {{ user.name }}
                    </option>
                  </select>
                </div>

                <div class="col-md-4 col-xl-2 col-xs-1">
                  <label for="paginate" class="text-nowrap mr-2 mb-0"
                    >Год защиты</label
                  >
                  <select class="form-control form-control-sm"  v-model="selectedYear">
                    <option value="">-- все --</option>
                    <option :value="vkr.id" v-for="vkr in vkrs" :key="vkr.id">
                      {{ vkr.year }}
                    </option>
                  </select>
                </div>

                <div class="col-md-3 col-xl-4 col-xs-1 d-flex align-items-end">
                  <input
                    v-model="search"
                    type="text"
                    placeholder="Введите название, год, технологии"
                    class="form-control form-control-sm mr-2"
                  />

                  <button class="btn btn-success btn-sm" @click="onClickButton">
                    Поиск
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Специальность</th>
                    <th>Год</th>
                    <th>Оценка</th>
                    <th>Преподаватель</th>
                    <th>Теги</th>
                    <th>Реферат</th>
                  </tr>

                  <tr v-for="(vkr, i) in vkrs.data" :key="vkr.id">
                    <td>{{ i + 1 }}</td>
                    <td>{{ vkr.title }}</td>
                    <td>{{ vkr.specialty }}</td>
                    <td>{{ vkr.year }}</td>
                    <td>{{ vkr.mark }}</td>
                    <td>{{ vkr.user }}</td>
                    <td>{{ vkr.tech }}</td>
                    <td>
                      <a
                        href="#"
                        data-id="vkr.id"
                        v-b-modal.modal-1
                        @click="currentVkr = vkr"
                      >
                        Текст реферата
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              
            </div>
           
              
         
            <div class="row mt-4">
              <div class="col-sm-6 offset-5">
                <pagination
                  :data="vkrs"
                  @pagination-change-page="getVkrs"
                ></pagination>
                
              </div>
              
            </div>
          </div>
           
        </b-tab>
        <b-tab title="Свободные темы">
           
        </b-tab>
        <b-tab title="Дорожная карта"
          ><p>I'm the tab with the very, very long title</p></b-tab
        >
        <b-tab title="Ответы на вопросы"><div class="accordion" role="tablist">
    <b-card no-body class="mb-1">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button block v-b-toggle.accordion-1 variant="info">Accordion 1</b-button>
      </b-card-header>
      <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
        <b-card-body>
          <b-card-text>I start opened because <code>visible</code> is <code>true</code></b-card-text>
          <b-card-text>{{ text }}</b-card-text>
        </b-card-body>
      </b-collapse>
    </b-card>

    <b-card no-body class="mb-1">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button block v-b-toggle.accordion-2 variant="info">Accordion 2</b-button>
      </b-card-header>
      <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
        <b-card-body>
          <b-card-text>{{ text }}</b-card-text>
        </b-card-body>
      </b-collapse>
    </b-card>

    <b-card no-body class="mb-1">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button block v-b-toggle.accordion-3 variant="info">Accordion 3</b-button>
      </b-card-header>
      <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
        <b-card-body>
          <b-card-text>{{ text }}</b-card-text>
        </b-card-body>
      </b-collapse>
    </b-card>
  </div>
  </b-tab>
      </b-tabs>
    </div>

    <div>
      <b-modal id="modal-1" title="BootstrapVue" size="xl">
        <p class="my-4" v-if="currentVkr">
          123{{ currentVkr.essay }}{{ currentVkr.essay }}{{ currentVkr.essay
          }}{{ currentVkr.essay }}{{ currentVkr.essay }}{{ currentVkr.essay
          }}{{ currentVkr.essay }}{{ currentVkr.essay }}{{ currentVkr.essay
          }}{{ currentVkr.essay }}{{ currentVkr.essay }}{{ currentVkr.essay
          }}{{ currentVkr.essay }}
        </p>
      </b-modal>
    </div>


            <div class="row">
              <div class="col mt-4 mb-4 text-center">
   <transition name="fade">
                    <div id="pagetop" class="fixed right-0 bottom-0" v-show="scY > 100" @click="toTop">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="#4a5568"
                        stroke-width="1" stroke-linecap="square" stroke-linejoin="arcs">
                        <path d="M18 15l-6-6-6 6"/>
                    </svg>
                    <p>наверх</p>
                    </div>
                </transition>
              </div>
            </div>
  </div>
  
</template>

<script>
import VkrSingle from "./VkrSingle.vue";
import Swal from "sweetalert2";

export default {
  components: {
    VkrSingle,
  },

  data() {
    return {
      vkrs: {},
      paginate: 10,
      search: "",
      specialties: {},
      users: {},
      selectedSpecialty: "",
      selectedUser: "",
      selectedYear: "",
      currentVkr: null,
      scTimer: 0,
      scY: 0,
      vkr: {
        id: "0",
      },
       text: `
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
          richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
          brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
          tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
          assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
          wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
          vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
          synth nesciunt you probably haven't heard of them accusamus labore VHS.
        `
    };
  },
  watch: {
    paginate: function (value) {
      this.getVkrs();
    },
    search: function (value) {
      this.getVkrs();
    },
    selectedSpecialty: function (value) {
      this.getVkrs();
    },
    selectedUser: function (value) {
      this.getVkrs();
    },
    selectedYear: function (value) {
      this.getVkrs();
    },
    $route(to, from) {
      this.getVkrs();
    },
  },
  computed: {
    filteredItems() {
      return _(this.items)
        .filter((x) => {
          return (
            this.search == "" ||
            x.title.toLowerCase().includes(this.search.toLowerCase())
          );
        })
        .orderBy((x) => x[this.sortedBy])
        .value();
    },
    years() {
      return _(this.vkrs.data)
        .map((x) => x.year)
        .uniq()
        .value();
    },
  },
  methods: {
    getVkrs(page = 1) {
      axios
        .get(
          "/api/vkrs?page=" +
            page +
            "&paginate=" +
            this.paginate +
            "&q=" +
            this.search +
            "&selectedSpecialty=" +
            this.selectedSpecialty +
            "&selectedUser=" +
            this.selectedUser
             +
            "&selectedYear=" +
            this.selectedYear
        )
        .then((response) => {
          this.vkrs = response.data;
        });
    },
    onClickButton() {
      this.getVkrs();
    },
    openEssay(essay) {
      Swal.fire({
        title: "Текст реферата",
        text: essay,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Закрыть",
        allowEnterKey: true,
        allowOutsideClick: true,
        html: '<p align="left"> ' + essay + "</p>",
      });
    },
     handleScroll: function () {
        if (this.scTimer) return;
        this.scTimer = setTimeout(() => {
          this.scY = window.scrollY;
          clearTimeout(this.scTimer);
          this.scTimer = 0;
        }, 100);
      },
      toTop: function () {
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      },
    
  },
  mounted() {
    axios.get("/api/specialties").then((response) => {
      console.log(response);
      this.specialties = response.data.data;
    });
    
    axios.get("/api/users").then((response) => {
      console.log(response);
      this.users = response.data.data;
    });
    
     
   
     window.addEventListener('scroll', this.handleScroll);
     this.getVkrs();
   
  },
};
</script>