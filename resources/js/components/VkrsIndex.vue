<template>
  <div>
    <div>
      <b-tabs content-class="mt-5" fill>
        <b-tab title="Архив тем ВКР" active>
          <div class="container-fluid">
            <div class="card shadow">
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
                        :value="user.id"
                      >
                        {{ user.name }}
                      </option>
                    </select>
                  </div>

                  <div class="col-md-4 col-xl-2 col-xs-1">
                    <label for="paginate" class="text-nowrap mr-2 mb-0"
                      >Год защиты</label
                    >
                    <select
                      class="form-control form-control-sm"
                      v-model="selectedYear"
                    >
                      <option value="">-- все --</option>
                      <option :value="i.year" v-for="i in yearsF" :key="i.year">
                        {{ i.year }}
                      </option>
                    </select>
                  </div>

                  <div class="col-md-3 col-xl-1 col-xs-1">
                    <label for="paginate" class="text-nowrap mr-2 mb-0"
                      >Оценка</label
                    >
                    <select
                      class="form-control form-control-sm"
                      v-model="selectedMark"
                    >
                      <option value="">-- все --</option>
                      <option
                        :value="item.mark"
                        v-for="item in marks"
                        :key="item.mark"
                      >
                        {{ item.mark }}
                      </option>
                    </select>
                  </div>

                  <div
                    class="col-md-3 col-xl-4 col-xs-1 d-flex align-items-end"
                  >
                    <input
                      v-model="search"
                      type="text"
                      placeholder="Введите название, год, технологии"
                      class="form-control form-control-sm mr-2"
                    />

                    <button
                      class="btn btn-success btn-sm"
                      @click="onClickButton"
                    >
                      Поиск
                    </button>

                    <button
                      @click="clear"
                      class="btn btn-outline-secondary btn-sm ml-2"
                    >
                      Сброс
                    </button>
                  </div>
                </div>
              </div>

              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>№</th>
                      <th>
                        <a href="#" @click.prevent="change_sort('title')"
                          >Название</a
                        >
                        <span
                          v-if="
                            sort_direction == 'desc' && sort_field == 'title'
                          "
                          >&uarr;</span
                        >
                        <span
                          v-if="
                            sort_direction == 'asc' && sort_field == 'title'
                          "
                          >&darr;</span
                        >
                      </th>
                      <th>Специальность</th>
                      <th>
                        <a href="#" @click.prevent="change_sort('year')">Год</a>
                        <span
                          v-if="
                            sort_direction == 'desc' && sort_field == 'year'
                          "
                          >&uarr;</span
                        >
                        <span
                          v-if="sort_direction == 'asc' && sort_field == 'year'"
                          >&darr;</span
                        >
                      </th>
                      <th>
                        <a href="#" @click.prevent="change_sort('mark')"
                          >Оценка</a
                        >
                        <span
                          v-if="
                            sort_direction == 'desc' && sort_field == 'mark'
                          "
                          >&uarr;</span
                        >
                        <span
                          v-if="sort_direction == 'asc' && sort_field == 'mark'"
                          >&darr;</span
                        >
                      </th>
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
          </div>
        </b-tab>
        <b-tab title="Свободные темы">
          <vkr-vacant />
        </b-tab>
        <b-tab title="Дорожная карта"
          ><p>I'm the tab with the very, very long title</p></b-tab
        >
        <b-tab title="Ответы на вопросы"
          ><div class="accordion" role="tablist">
            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-1 variant="info"
                  >Что такое ВКР?</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-1"
                visible
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text
                    >Выпускная квалификационная работа – выполненная обучающимся
                    (несколькими обучающимися совместно) работа, демонстрирующая
                    уровень подготовленности выпускника к самостоятельной
                    профессиональной деятельности.</b-card-text
                  >
                  <b-card-text
                    >Вид выпускной квалификационной работы, требования к ней,
                    порядок ее выполнения и критерии ее оценки устанавливаются
                    программой ГИА в соответствии с требованиями, установленными
                    стандартом. Обучающимся предоставляется возможность
                    подготовки и защиты ВКР в виде бизнес-проекта (стартапа) на
                    стадии готовности к привлечению инвестиций или уже
                    работающего бизнеса.
                  </b-card-text>
                </b-card-body>
              </b-collapse>
            </b-card>

            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-2 variant="info"
                  >Сроки</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-2"
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text
                    >Государственная итоговая аттестация проводится в
                    соответствии с требованиями ФГОС ВО в сроки, установленные
                    календарным учебным графиком. Для ознакомления с основнвми
                    этапами подготовки ВКР и общими сроками, перейдите на
                    вкладку "Дорожная карта". С календарным учебным графиком
                    можно ознакомиться по <a href="">ссылке</a> или в личном
                    кабинете Кампус. Со стандартами ФГОС можно ознакомиться по
                    <a href="">ссылке</a>.
                  </b-card-text>
                </b-card-body>
              </b-collapse>
            </b-card>

            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-3 variant="info"
                  >Допуск к ВКР</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-3"
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text
                    >К государственной итоговой аттестации допускается
                    обучающийся, не имеющий академической задолженности и в
                    полном объеме выполнивший учебный план или индивидуальный
                    учебный план по соответствующей образовательной программе
                    высшего образования.</b-card-text
                  >
                </b-card-body>
              </b-collapse>
            </b-card>
          </div>
        </b-tab>
      </b-tabs>
    </div>

    <div>
      <b-modal id="modal-1" title="Содержание реферата" size="xl">
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
          <div
            id="pagetop"
            class="fixed right-0 bottom-0"
            v-show="scY > 100"
            @click="toTop"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="48"
              height="48"
              viewBox="0 0 24 24"
              fill="none"
              stroke="#4a5568"
              stroke-width="1"
              stroke-linecap="square"
              stroke-linejoin="arcs"
            >
              <path d="M18 15l-6-6-6 6" />
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
import VkrVacant from "./VkrVacant.vue";
import Swal from "sweetalert2";

export default {
  components: {
    VkrSingle,
    VkrVacant,
  },

  data() {
    return {
      vkrs: {},
      titles: {},
      users: {},
      paginate: 10,
      search: "",
      specialties: {},
      marks: {},
      yearsF: {},
      selectedSpecialty: "",
      selectedUser: "",
      selectedYear: "",
      selectedMark: "",
      sort_direction: "desc",
      sort_field: "year",
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
        `,
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
    selectedMark: function (value) {
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
            this.selectedUser +
            "&selectedYear=" +
            this.selectedYear +
            "&selectedMark=" +
            this.selectedMark +
            "&sort_direction=" +
            this.sort_direction +
                "&sort_field=" +
                this.sort_field 
        )
        .then((response) => {
          this.vkrs = response.data;
        });
    },
    clear: function () {
      this.selectedSpecialty = "";
      this.selectedUser = "";
      this.selectedYear = "";
      this.selectedMark = "";
      this.search = "";
    },

    change_sort(field){
            if(this.sort_field == field){
                this.sort_direction = this.sort_direction == "asc" ? "desc" : "asc";
            }else{
                this.sort_field = field;
            }
            this.getVkrs();
        },

    onClickButton() {
      this.getVkrs();
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
        behavior: "smooth",
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
    axios.get("/api/years").then((response) => {
      console.log(response);
      this.yearsF = response.data.data;
    });
    axios.get("/api/marks").then((response) => {
      console.log(response);
      this.marks = response.data.data;
    });

    window.addEventListener("scroll", this.handleScroll);
    this.getVkrs();
  },
};
</script>