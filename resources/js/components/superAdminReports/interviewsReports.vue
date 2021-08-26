<template>
  <div>
      <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Interviews Report</h5>
                <div id="date">
                    <div>
                     
 <select class="select2 form-select shadow-none col-md-5"
                                            style="width: 20%; height:36px; position: absolute;
    left: 800px; " v-model="sellectedDate">
                       <option value="today">today</option>
                         <option value="yesterday">yesterday</option>
                           <option value="month">this month</option>
                           <option value="year" >this year</option>
                   </select>
                    </div>
                  
                    </div>

            </div>
            <table class="table">
                <thead>
                    <tr>
                     
                 <th>Date</th>
                 <th>Doctor</th>
                <th>Doctor Specialty</th>
                 <th>patient</th>
                 <th>patient Age</th>
                 <th>Account</th>                           
                 <th>Status</th>
             
                    </tr>
                </thead>
                <tbody>



                   
                    <tr v-for="interview in interviews" v-bind:key="interview.id">
                                      <td>{{interview.date}}</td>
                                    <td>{{interview.user_name}}</td>
                                    <td>{{interview.specalty_name}}</td>
                                    <td>{{interview.name}}</td>
                                    <td>{{interview.age}}</td>
                                    <td>{{interview.patient_name}}</td>
                                     <td>{{interview.state}}</td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
  </div>
      </div>
      </div>
</template>

<script>
export default {
   
  mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                interviews:[],
                sellectedDate:null
            }
        },
        created(){
this.getinterviews();
        },
        watch:{
            sellectedDate(){
      this.getinterviews()
            }
            
        },
        methods:{
            getinterviews(){
                axios.get("/ahmed",{params:{
                    date:this.sellectedDate
                }

                }
                ).then(res => {
                    this.interviews = res.data;
                }).catch(error => {
                    console.log(console.error);
                });
            }
        }
};
</script>

<style>


#date{
    position: relative;
    padding: 7px;
  
}
select{
    
    padding: 7px;
    width: 150px;
    border-block-color:#080;
    border-block-start-color: chartreuse;
    border-block-start-width: 2px;
}
option{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 15px;
}

</style>