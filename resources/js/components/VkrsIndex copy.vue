<template>
    <div>
        <div class="d-flex justify-content-between align-content-center mb-2">
            <div class="d-flex">
                <div>
                    <div class="d-flex align-items-center ml-4">
                        <label for="paginate" class="text-nowrap mr-2 mb-0"
                            >Per Page</label
                        >
                        <select v-model="paginate" class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="d-flex align-items-center ml-4">
                        <label for="paginate" class="text-nowrap mr-2 mb-0"
                            >Cпециальности</label
                        >
                         <select v-model="selectedSpecialty" class="form-control form-control-sm">
                            <option value="">-- все --</option>
                            <option v-for="item in specialties" :key="item.id" :value="item.id">{{ item.code }}</option>
                        </select>
                    </div>
                </div>

                <div>
                    <div class="d-flex align-items-center ml-4">
                        <label for="paginate" class="text-nowrap mr-2 mb-0"
                            >Section</label
                        >
                        <select class="form-control form-control-sm">
                            <option value="">Select a Section</option>
                            <option value="1">Section A</option>
                        </select>
                    </div>
                </div>

              
            </div>
            <div class="col-md-4">
                <input
                    v-model.lazy="search"
                    type="search"
                    class="form-control"
                    placeholder="Введите название, год, технологии"
                />
                <div class="btn btn-success" @click="onClickButton">Click</div>
            </div>
        </div>

        <div class="col-md-10 mb-2">
            <div>
                You are currently selecting all
                <strong>10</strong> items.
            </div>
            <div>
                You have selected <strong>10</strong> items, Do you want to
                Select All <strong>25</strong>?
                <a href="" class="ml-2">Select All</a>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                      
                        <th>
                            №
                        </th>
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
                            Преподаватель
                        </th>
                        <th>
                            Теги
                        </th>
                      
                    </tr>

                    <tr v-for="vkr in vkrs.data" :key="vkr.id">
                       
                        <td>{{  }}</td>
                        <td>{{ vkr.title }}</td>
                        <td>{{ vkr.specialty }}</td>
                        <td>{{ vkr.year }}</td>
                        <td>{{ vkr.user }}</td>
                        <td>{{ vkr.tech }}</td>
                      
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
                <pagination :data="vkrs" @pagination-change-page="getVkrs"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            vkrs: {},
            paginate : 10,
            search : "",
            specialties : {},
            selectedSpecialty : '',
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