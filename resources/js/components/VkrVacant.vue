
<template>
  <div class="container mt-5">
    <div class="container-fluid" >
      <div v-for="(items, user) in vkrsGroupedByName" :key="user">
        
       <h2>{{user}}</h2> {{user.email}}
       <table>
         <tbody>
           <tr v-for="i in items" :key="i.id">
             <td>{{i.title}}</td>
             <td>{{i.description}}</td>
        
           </tr>
         </tbody>
      </table> 
      </div>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
export default {
  data(){
    return{
      vkrs:[],
    }
  },
  mounted() {
    axios.get("/api/titles").then((response) => {
      console.log(response);
      this.vkrs = response.data.data;
    });
    },
    computed: {
      vkrsGroupedByName(){
        return _(this.vkrs).groupBy(x => x.user).value()
      }
    }

};
</script>