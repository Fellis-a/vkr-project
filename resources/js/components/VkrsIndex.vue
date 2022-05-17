<template>
    <div>
          <div class="card">
                            <div class="card-header">
                              
                                                         
        <div class="row">
                <div class="col-md-1 col-xl-2 col-xs-1">
                     
                        <label for="paginate" class="text-nowrap mr-2 mb-0"
                            > Количество записей</label
                        >
                        <select v-model="paginate" class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                
                </div>
               
                    <div class="col-md-4 col-xl-3 col-xs-1">
                        <label for="paginate" class="text-nowrap mr-2 mb-0"
                            >Cпециальности</label
                        >
                         <select v-model="selectedSpecialty" class="form-control form-control-sm">
                            <option value="">-- все --</option>
                            <option v-for="item in specialties" :key="item.id" :value="item.id">{{ item.code }}</option>
                        </select>
                    </div>
                

              
                    <div class="col-md-4 col-xl-3 col-xs-1 ">
                        <label for="paginate" class="text-nowrap mr-2 mb-0"
                            >Section</label
                        >
                        <select class="form-control form-control-sm">
                            <option value="">Select a Section</option>
                            <option value="1">Section A</option>
                        </select>
                    </div>
               

               <div class="col-md-4 col-xl-3 col-xs-1">
                    <input v-model="search" type="text" placeholder="Введите название, год, технологии" class="border px-2 rounded-lg" />
               
                     <button class="btn btn-success border px-2 rounded-sm" @click="onClickButton">Поиск</button>
                
            </div>
              
            

            </div>
           
          
         </div>
                        

        

        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                      
                        <th>
                            Название
                        </th>
                        <th>
                            Специальность
                        </th>
                        <th>
                            Год
                        </th>
                        <th>
                            Оценка
                        </th>
                        <th>
                            Преподаватель
                        </th>
                        <th>
                            Теги
                        </th>
                         <th>
                            Реферат
                        </th>
                      
                    </tr>

                    <tr v-for="vkr in vkrs.data" :key="vkr.id">
                       
                        <td>{{ vkr.title }}</td>
                        <td>{{ vkr.specialty }}</td>
                        <td>{{ vkr.year }}</td>
                        <td>{{ vkr.mark }}</td>
                        <td>{{ vkr.user }}</td>
                        <td>{{ vkr.tech }}</td>
                        <td><a href="#" data-id="vkr.id" @click="openEssay(vkr.essay)">
                            Текст реферата
                        </a></td>
                        
                      
                    </tr>
                    <vkr-single :id="vkr.id" />
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
                <pagination :data="vkrs" @pagination-change-page="getVkrs"></pagination>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import VkrSingle from './VkrSingle.vue';
import Swal from 'sweetalert2'

export default {
    components:{
        
        VkrSingle
        

    },
    
    data(){
        return {
            vkrs: {},
            paginate : 10,
            search : "",
            specialties : {},
            selectedSpecialty : '',
            vkr: {
                    id: '0'
                  }
          
        }
    },
    watch:{
        paginate: function(value){
            this.getVkrs();
        },
        search: function(value){
            this.getVkrs();
        },
        selectedSpecialty: function(value){
            this.getVkrs();
        },
       $route(to, from) {
           this.getVkrs();
           
        }
    },
    computed: {
        filteredItems() {
            return _(this.items).filter(x => {
                return this.search == "" || x.title.toLowerCase().includes(this.search.toLowerCase());
            }).orderBy(x => x[this.sortedBy]).value();
        }
      },
    methods: {
        getVkrs(page = 1){
            axios.get('/api/vkrs?page='+ page + '&paginate=' + this.paginate
            + '&q=' + this.search
            + '&selectedSpecialty=' + this.selectedSpecialty)
            .then(response => {
                this.vkrs = response.data;
            });
        },
         onClickButton() {
            this.getVkrs();
        },
        openEssay(essay){
             Swal.fire({
                title: 'Текст реферата',
                text: essay,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Закрыть',
                allowEnterKey: true,
                allowOutsideClick: true,
                html: 
                '<p align="left"> ' +essay +
                '</p>',
               
                })
            }
    },
    mounted(){
        axios.get('/api/specialties')
        .then(response => {
            console.log(response);
            this.specialties = response.data.data;
        });
        this.getVkrs();
    }
};
</script>